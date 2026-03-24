<?php
header("Content-Type: text/plain; charset=UTF-8");
header("X-Content-Type-Options: nosniff");

require(__DIR__ . '/../vendor/autoload.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// CONFIGURACIÓN SMTP (No cambiar)
// ===============================================
$smtp_host = 'mail.superarse.ec';
$smtp_port = 587;
$smtp_username = 'alexander.quinga@superarse.ec';
$smtp_password = 'Patoboris123';
$from_email = 'alexander.quinga@superarse.ec';
$from_name = 'Formulario de Admisión Web';
// ===============================================

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Sanitización y Validación de Inputs
    $nombre = filter_var(trim($_POST["nombre"]), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $celular = filter_var(trim($_POST["celular"]), FILTER_SANITIZE_STRING);
    $descripcion = filter_var(trim($_POST["description"]), FILTER_SANITIZE_STRING);

    // CORREOS INTERNOS DE DESTINO
    $admin_recipients = [
        "superarseadmisiones@gmail.com",
    ];

    $subject = "Nuevo requerimiento de admisión de: " . $nombre;

    // Validación de límites
    if (
        strlen($nombre) > 100 ||
        strlen($email) > 100 ||
        strlen($celular) > 20 ||
        strlen($descripcion) > 1000
    ) {
        http_response_code(400);
        echo "Los datos exceden el límite permitido. Por favor, revise la información.";
        exit;
    }

    // Validación de campos requeridos
    if (
        empty($nombre) ||
        empty($celular) ||
        empty($descripcion) ||
        !filter_var($email, FILTER_VALIDATE_EMAIL)
    ) {
        http_response_code(400);
        echo "Por favor, completa el formulario y asegúrate de que el correo electrónico sea válido.";
        exit;
    }

    // ===== SOLO SE AGREGA ESTO =====
    // Limpiar número
    $celular_limpio = preg_replace('/[^0-9]/', '', $celular);

    // Ecuador → 593
    if (substr($celular_limpio, 0, 1) === '0') {
        $celular_limpio = '593' . substr($celular_limpio, 1);
    }

    // Link WhatsApp
    $whatsapp_link = "https://wa.me/" . $celular_limpio;
    // ==============================

    // 2. Construcción del Contenido del Correo
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

                <!-- CONTENEDOR -->
                <table width='600' cellpadding='0' cellspacing='0' style='background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 4px 10px rgba(0,0,0,0.08);'>

                    <!-- HEADER -->
                    <tr>
                        <td style='background:#0d6efd; color:#ffffff; padding:20px 30px;'>
                            <h2 style='margin:0; font-size:20px;'>Solicitud Web</h2>
                            <p style='margin:5px 0 0; font-size:14px; opacity:0.9;'>
                                Nuevo requerimiento recibido
                            </p>
                        </td>
                    </tr>

                    <!-- CONTENIDO -->
                    <tr>
                        <td style='padding:30px;'>

                            <table width='100%' cellpadding='0' cellspacing='0'>

                                <tr>
                                    <td style='padding-bottom:15px;'>
                                        <strong style='color:#333;'>Nombre:</strong><br>
                                        <span style='color:#555;'>" . htmlspecialchars($nombre) . "</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td style='padding-bottom:15px;'>
                                        <strong style='color:#333;'>Correo electrónico:</strong><br>
                                        <span style='color:#555;'>" . htmlspecialchars($email) . "</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td style='padding-bottom:15px;'>
                                        <strong style='color:#333;'>Celular / WhatsApp:</strong><br>
                                        <a href='" . htmlspecialchars($whatsapp_link) . "' target='_blank'
                                           style='display:inline-block; margin-top:6px; padding:6px 12px; background:#e9f2ff; color:#0d6efd; border-radius:20px; font-size:13px; text-decoration:none;'>
                                            " . htmlspecialchars($celular) . "
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td style='padding-top:10px;'>
                                        <strong style='color:#333;'>Requerimiento:</strong>
                                        <div style='margin-top:10px; padding:15px; background:#f8f9fa; border-left:4px solid #0d6efd; border-radius:4px; color:#333; line-height:1.6;'>
                                            " . nl2br(htmlspecialchars($descripcion)) . "
                                        </div>
                                    </td>
                                </tr>

                            </table>

                        </td>
                    </tr>

                    <!-- FOOTER -->
                    <tr>
                        <td style='background:#f1f3f5; padding:15px 30px; font-size:12px; color:#666; text-align:center;'>
                            Este mensaje fue enviado desde el formulario web institucional.<br>
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

    // 3. Envío con PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuración del Servidor
        $mail->isSMTP();
        $mail->Host       = $smtp_host;
        $mail->SMTPAuth   = true;
        $mail->Username   = $smtp_username;
        $mail->Password   = $smtp_password;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = $smtp_port;
        $mail->CharSet    = 'UTF-8';

        // Remitentes
        $mail->setFrom($from_email, $from_name);

        // Destinatario principal
        $mail->addAddress($email, $nombre);

        // Copias administrativas
        foreach ($admin_recipients as $admin_email) {
            $mail->addBCC($admin_email);
        }

        // Reply
        $mail->addReplyTo($email, $nombre);

        // Contenido
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $email_content;
        $mail->AltBody = "Nombre: $nombre\nEmail: $email\nWhatsApp: $whatsapp_link\n\nRequerimiento:\n$descripcion";

        $mail->send();

        echo '¡Éxito! Su solicitud ha sido enviada. Pronto nos pondremos en contacto.';

    } catch (Exception $e) {
        http_response_code(500);
        error_log("PHPMailer Error: " . $mail->ErrorInfo);
        echo "Oops! Algo salió mal y no pudimos enviar tu mensaje.";
    }

} else {
    http_response_code(403);
    echo "Acceso Denegado. Hubo un problema con tu envío, por favor intenta de nuevo.";
}
?>
