<?php
/**
 * PROCESAR SOLICITUD CON DOS ARCHIVOS ADJUNTOS (PDF O IMAGEN)
 * ---------------------------------------------------
 * Archivo 1: archivo_solicitud (Obligatorio - Solo PDF)
 * Archivo 2: archivo_anexo (Obligatorio - PDF, JPG o PNG)
 */

// 0. Prevenir que errores menores ensucien la respuesta JSON
ob_start(); 
set_time_limit(120); 

header("Content-Type: application/json; charset=UTF-8");
header("X-Content-Type-Options: nosniff");

// Asegúrate de que la ruta a tu autoload.php sea correcta
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// ===============================================
// CONFIGURACIÓN SMTP (Limpiado de espacios raros)
// ===============================================
$smtp_host     = 'mail.superarse.ec';
$smtp_port     = 587;
$smtp_username = 'alexander.quinga@superarse.ec';
$smtp_password = 'Patoboris123';
$from_email    = 'alexander.quinga@superarse.ec';
$from_name     = 'Repositorio de Solicitudes';
// ===============================================

// SOLO POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    if (ob_get_length()) ob_end_clean();
    http_response_code(403);
    echo json_encode(["success" => false, "message" => "Acceso denegado."]);
    exit;
}

/**
 * FUNCIÓN PARA PROCESAR Y GUARDAR CADA ARCHIVO (MÉTODO SEGURO)
 */
function procesarArchivo($fileInputName, $obligatorio = false, $soloPdf = false) {
    if (!isset($_FILES[$fileInputName]) || $_FILES[$fileInputName]['error'] !== 0) {
        if ($obligatorio) {
            return ["error" => "El campo de '$fileInputName' es obligatorio o el archivo es muy pesado."];
        }
        return null;
    }

    $file = $_FILES[$fileInputName];

    // Mapeo de extensiones permitidas
    $allowedTypes = [
        'application/pdf' => 'pdf',
        'image/jpeg'      => 'jpg',
        'image/png'       => 'png'
    ];

    // Obtener MIME de forma segura (Plan B si finfo no está activo)
    if (function_exists('finfo_open')) {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime  = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);
    } else {
        // Alternativa si el hosting tiene deshabilitado Fileinfo
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $mimesPorExt = ['pdf' => 'application/pdf', 'jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg', 'png' => 'image/png'];
        $mime = $mimesPorExt[$ext] ?? 'unknown';
    }

    if (!array_key_exists($mime, $allowedTypes)) {
        return ["error" => "Formato no permitido en " . htmlspecialchars($file['name']) . ". Use PDF, JPG o PNG."];
    }

    if ($soloPdf && $mime !== 'application/pdf') {
        return ["error" => "La Solicitud (Archivo 1) debe ser estrictamente un PDF."];
    }

    $extension = $allowedTypes[$mime];

    // Tamaño máximo 5MB
    if ($file['size'] > 5 * 1024 * 1024) {
        return ["error" => "El archivo " . htmlspecialchars($file['name']) . " supera los 5MB permitidos."];
    }

    // Preparar directorio
    $directorio = __DIR__ . '/uploads/';
    if (!file_exists($directorio)) {
        if (!@mkdir($directorio, 0755, true)) {
            return ["error" => "Error interno: No se pueden crear directorios en el servidor. Revise permisos."];
        }
    }

    // Limpiar nombre de archivo
    $nombreLimpio = preg_replace('/[^A-Za-z0-9_\-]/', '_', pathinfo($file['name'], PATHINFO_FILENAME));
    $nombreArchivo = $nombreLimpio . '.' . $extension;
    $contador = 1;
    
    while (file_exists($directorio . $nombreArchivo)) {
        $nombreArchivo = $nombreLimpio . '_' . $contador . '.' . $extension;
        $contador++;
    }

    $rutaFinal = $directorio . $nombreArchivo;

    if (move_uploaded_file($file['tmp_name'], $rutaFinal)) {
        return [
            "ruta"     => $rutaFinal,
            "nombre"   => $nombreArchivo,
            "original" => $file['name']
        ];
    }

    return ["error" => "No se pudo guardar " . htmlspecialchars($file['name']) . " en el servidor por restricciones de escritura."];
}

// 1️⃣ PROCESAR ARCHIVOS
$resSolicitud = procesarArchivo('archivo_solicitud', true, true);
if (isset($resSolicitud['error'])) {
    if (ob_get_length()) ob_end_clean();
    http_response_code(400);
    echo json_encode(["success" => false, "message" => $resSolicitud['error']]);
    exit;
}

$resAnexo = procesarArchivo('archivo_anexo', true, false);
if (isset($resAnexo['error'])) {
    if (ob_get_length()) ob_end_clean();
    http_response_code(400);
    echo json_encode(["success" => false, "message" => $resAnexo['error']]);
    exit;
}

// 2️⃣ PREPARAR DATOS DEL CORREO
$tipo = filter_var(trim($_POST["tipo"] ?? "Solicitud Académica"), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$subject = "Nueva Solicitud Académica – " . $tipo;

$listaArchivos = "<li><strong>SOLICITUD:</strong> " . htmlspecialchars($resSolicitud['original']) . "</li>";
$listaArchivos .= "<li><strong>COMPROBANTE/BAUCHER:</strong> " . htmlspecialchars($resAnexo['original']) . "</li>";

$email_content = "
<body style='font-family:Arial, sans-serif; background-color:#f4f6f8; padding:20px;'>
    <div style='background-color:#ffffff; max-width:600px; margin:0 auto; border-radius:8px; border: 1px solid #e1e4e8; overflow:hidden;'>
        <div style='background-color:#198754; color:#ffffff; padding:20px; text-align:center;'>
            <h2 style='margin:0;'>Repositorio de Solicitudes</h2>
        </div>
        <div style='padding:30px;'>
            <p style='font-size:16px;'>Se ha recibido una nueva solicitud y su comprobante de pago:</p>
            <hr style='border:0; border-top:1px solid #eee;'>
            <p><strong>Tipo de Solicitud:</strong> $tipo</p>
            <p><strong>Documentos recibidos:</strong></p>
            <ul style='background-color:#f8f9fa; padding:15px 35px; border-radius:5px;'>
                $listaArchivos
            </ul>
            <p style='color:#666; font-size:12px; margin-top:30px;'>
                Enviado automáticamente el: " . date('d/m/Y H:i:s') . "
            </p>
        </div>
        <div style='background-color:#f1f3f5; padding:15px; text-align:center; font-size:12px; color:#999;'>
            © " . date("Y") . " Superarse - Sistema de Gestión de Solicitudes
        </div>
    </div>
</body>";

// 3️⃣ ENVÍO CON PHPMailer
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

    $mail->SMTPOptions = [
        'ssl' => [
            'verify_peer'       => false,
            'verify_peer_name'  => false,
            'allow_self_signed' => true
        ]
    ];

    $mail->setFrom($from_email, $from_name);
    $mail->addAddress('matriculassuperarse@gmail.com');
    $mail->addReplyTo($from_email);

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $email_content;

    // ADJUNTAR ARCHIVOS
    $mail->addAttachment($resSolicitud['ruta'], "Solicitud_" . $resSolicitud['nombre']);
    $mail->addAttachment($resAnexo['ruta'], "Comprobante_" . $resAnexo['nombre']);

    $mail->send();
    $mail->smtpClose();

    if (ob_get_length()) ob_end_clean();
    echo json_encode(["success" => true, "message" => "¡Solicitud y comprobante enviados correctamente!"]);

} catch (Exception $e) {
    if (ob_get_length()) ob_end_clean();
    http_response_code(500);
    echo json_encode(["success" => false, "message" => "Error al enviar el correo: " . $mail->ErrorInfo]);
}