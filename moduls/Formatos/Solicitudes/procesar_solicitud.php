<?php
header("Content-Type: application/json; charset=UTF-8");
header("X-Content-Type-Options: nosniff");

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// ===============================================
// CONFIGURACIÓN SMTP (MISMA QUE ENVIAR_BUZON)
// ===============================================
$smtp_host = 'mail.superarse.ec';
$smtp_port = 587;
$smtp_username = 'alexander.quinga@superarse.ec';
$smtp_password = 'Patoboris123';
$from_email = 'alexander.quinga@superarse.ec';
$from_name = 'Repositorio de Solicitudes';
// ===============================================

// SOLO POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(403);
    echo json_encode([
        "success" => false,
        "message" => "Acceso denegado."
    ]);
    exit;
}

// 1️⃣ VALIDAR ARCHIVO
if (!isset($_FILES['archivo']) || $_FILES['archivo']['error'] !== 0) {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "message" => "No se recibió el archivo PDF."
    ]);
    exit;
}

$archivo = $_FILES['archivo'];

// Validar MIME
if (mime_content_type($archivo['tmp_name']) !== 'application/pdf') {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "message" => "Solo se permiten archivos PDF."
    ]);
    exit;
}

// Tamaño máximo 5MB
if ($archivo['size'] > 5 * 1024 * 1024) {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "message" => "El archivo supera los 5MB permitidos."
    ]);
    exit;
}

// 2️⃣ GUARDAR PDF
$nombreArchivo = 'solicitud_' . date('Ymd_His') . '.pdf';
$ruta = __DIR__ . '/uploads/' . $nombreArchivo;

if (!move_uploaded_file($archivo['tmp_name'], $ruta)) {
    http_response_code(500);
    echo json_encode([
        "success" => false,
        "message" => "No se pudo guardar el archivo."
    ]);
    exit;
}

// 3️⃣ DATOS DE LA SOLICITUD
$tipo = filter_var(trim($_POST["tipo"] ?? "Solicitud Académica"), FILTER_SANITIZE_STRING);

// 4️⃣ ASUNTO
$subject = "Nueva Solicitud Académica – " . $tipo;

// 5️⃣ CONTENIDO HTML (MISMO ESTILO QUE BUZÓN)
$email_content = "
<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <title>$subject</title>
</head>
<body style='margin:0; padding:0; background-color:#f4f6f8; font-family:Arial, Helvetica, sans-serif;'>

<table width='100%' cellpadding='0' cellspacing='0' style='background-color:#f4f6f8; padding:30px 0;'>
<tr>
<td align='center'>

<table width='600' cellpadding='0' cellspacing='0' style='background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 4px 10px rgba(0,0,0,0.08);'>

<tr>
<td style='background:#198754; color:#ffffff; padding:20px 30px;'>
<h2 style='margin:0; font-size:20px;'>Repositorio de Solicitudes</h2>
<p style='margin:5px 0 0; font-size:14px; opacity:0.9;'>Nueva solicitud académica</p>
</td>
</tr>

<tr>
<td style='padding:30px;'>
<p><strong>Tipo de solicitud:</strong></p>
<span style='display:inline-block; padding:6px 14px; background:#e9f7ef; color:#198754; border-radius:20px; font-size:13px;'>
$tipo
</span>

<p style='margin-top:20px;'>Se adjunta el documento PDF correspondiente a esta solicitud.</p>

<p style='margin-top:20px; font-size:13px; color:#666;'>
Fecha de envío: " . date('d/m/Y H:i') . "
</p>
</td>
</tr>

<tr>
<td style='background:#f1f3f5; padding:15px 30px; font-size:12px; color:#666; text-align:center;'>
Este correo fue generado automáticamente desde el sistema web.<br>
© " . date("Y") . " Superarse – Todos los derechos reservados.
</td>
</tr>

</table>

</td>
</tr>
</table>

</body>
</html>
";

// 6️⃣ ENVÍO (MISMO MÉTODO QUE BUZÓN)
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = $smtp_host;
    $mail->SMTPAuth   = true;
    $mail->Username   = $smtp_username;
    $mail->Password   = $smtp_password;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = $smtp_port;
    $mail->CharSet    = 'UTF-8';

    $mail->setFrom($from_email, $from_name);

    // DESTINATARIO
    $mail->addAddress('matriculassuperarse@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $email_content;
    $mail->AltBody = "Nueva solicitud académica. Se adjunta el PDF.";

    // 📎 ADJUNTO
    $mail->addAttachment($ruta);

    $mail->send();

    echo json_encode([
        "success" => true,
        "message" => "¡Solicitud enviada correctamente!"
    ]);

} catch (Exception $e) {
    http_response_code(500);
    error_log("PHPMailer Solicitud Error: " . $mail->ErrorInfo);
    echo json_encode([
        "success" => false,
        "message" => "No se pudo enviar la solicitud. Intente más tarde."
    ]);
}
