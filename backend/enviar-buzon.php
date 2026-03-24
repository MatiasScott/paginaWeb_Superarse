<?php
header("Content-Type: application/json; charset=UTF-8");
header("X-Content-Type-Options: nosniff");

require(__DIR__ . '/../vendor/autoload.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// ===============================================
// CONFIGURACIÓN SMTP (MISMA QUE YA USAS)
// ===============================================
$smtp_host = 'mail.superarse.ec';
$smtp_port = 587;
$smtp_username = 'alexander.quinga@superarse.ec';
$smtp_password = 'Patoboris123';
$from_email = 'alexander.quinga@superarse.ec';
$from_name = 'Buzón Web Institucional';
// ===============================================

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(403);
    echo json_encode([
        "success" => false,
        "message" => "Acceso denegado."
    ]);
    exit;
}

// 1. Sanitizar datos
$tipo = filter_var(trim($_POST["tipo"] ?? ""), FILTER_SANITIZE_STRING);
$mensaje = filter_var(trim($_POST["mensaje"] ?? ""), FILTER_SANITIZE_STRING);

// 2. Validaciones
if (empty($tipo) || empty($mensaje)) {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "message" => "Todos los campos son obligatorios."
    ]);
    exit;
}

if (strlen($mensaje) > 1500) {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "message" => "El mensaje es demasiado largo."
    ]);
    exit;
}

// 3. Asunto dinámico
$subject = "Nuevo mensaje del Buzón Web (" . ucfirst($tipo) . ")";

// 4. Correos administrativos
$admin_recipients = [
    "bienestarinstitucional45@gmail.com"
];

// 5. Contenido del correo
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

                <!-- Contenedor principal -->
                <table width='600' cellpadding='0' cellspacing='0' style='background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 4px 10px rgba(0,0,0,0.08);'>

                    <!-- Encabezado -->
                    <tr>
                        <td style='background:#0d6efd; color:#ffffff; padding:20px 30px;'>
                            <h2 style='margin:0; font-size:20px;'>Buzón Institucional Web</h2>
                            <p style='margin:5px 0 0; font-size:14px; opacity:0.9;'>
                                Cumplidos, sugerencias y quejas
                            </p>
                        </td>
                    </tr>

                    <!-- Contenido -->
                    <tr>
                        <td style='padding:30px;'>

                            <table width='100%' cellpadding='0' cellspacing='0'>
                                <tr>
                                    <td style='padding-bottom:15px;'>
                                        <strong style='color:#333;'>Tipo de mensaje:</strong><br>
                                        <span style='display:inline-block; margin-top:6px; padding:6px 12px; background:#e9f2ff; color:#0d6efd; border-radius:20px; font-size:13px;'>
                                            " . ucfirst($tipo) . "
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td style='padding-top:10px;'>
                                        <strong style='color:#333;'>Mensaje recibido:</strong>
                                        <div style='margin-top:10px; padding:15px; background:#f8f9fa; border-left:4px solid #0d6efd; border-radius:4px; color:#333; line-height:1.6;'>
                                            " . nl2br(htmlspecialchars($mensaje)) . "
                                        </div>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style='background:#f1f3f5; padding:15px 30px; font-size:12px; color:#666; text-align:center;'>
                            Este mensaje fue enviado de forma <strong>anónima</strong> desde el sitio web institucional.<br>
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


// 6. Envío con PHPMailer
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

    // Remitente
    $mail->setFrom($from_email, $from_name);

    // Destinatarios internos
    foreach ($admin_recipients as $admin_email) {
        $mail->addAddress($admin_email);
    }

    // Contenido
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $email_content;
    $mail->AltBody = "Tipo: $tipo\n\nMensaje:\n$mensaje";

    $mail->send();

    echo json_encode([
        "success" => true,
        "message" => "¡Gracias! Tu mensaje fue enviado correctamente."
    ]);

} catch (Exception $e) {
    http_response_code(500);
    error_log("PHPMailer Buzón Error: " . $mail->ErrorInfo);
    echo json_encode([
        "success" => false,
        "message" => "No se pudo enviar el mensaje. Intenta más tarde."
    ]);
}

