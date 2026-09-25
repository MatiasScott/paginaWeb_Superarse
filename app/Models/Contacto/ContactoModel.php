<?php
declare(strict_types=1);

namespace App\Models\Contacto;

class ContactoModel
{
    public function validar(string $nombre, string $email, string $celular, string $descripcion): ?string
    {
        if (strlen($nombre) > 100 || strlen($email) > 100 || strlen($celular) > 20 || strlen($descripcion) > 1000) {
            return 'Los datos exceden el límite permitido. Por favor, revise la información.';
        }

        if ($nombre === '' || $celular === '' || $descripcion === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return 'Por favor, completa el formulario y asegúrate de que el correo electrónico sea válido.';
        }

        return null;
    }

    public function whatsapp(string $celular): string
    {
        $limpio = preg_replace('/[^0-9]/', '', $celular) ?? '';

        if ($limpio === '') {
            return '';
        }

        if ($limpio[0] === '0') {
            $limpio = '593' . substr($limpio, 1);
        }

        return 'https://wa.me/' . $limpio;
    }

    public function destinatariosAdmin(): array
    {
        return [
            'superarseadmisiones@gmail.com',
        ];
    }

    public function asunto(string $nombre): string
    {
        return 'Nuevo requerimiento de admisión de: ' . $nombre;
    }

    public function cuerpoHtml(string $nombre, string $email, string $celular, string $whatsappLink, string $descripcion): string
    {
        $anio = date('Y');

        return <<<HTML
<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <title>{$this->asunto($nombre)}</title>
</head>
<body style='margin:0; padding:0; background-color:#f4f6f8; font-family:Arial, Helvetica, sans-serif;'>

    <table width='100%' cellpadding='0' cellspacing='0' style='background-color:#f4f6f8; padding:30px 0;'>
        <tr>
            <td align='center'>

                <table width='600' cellpadding='0' cellspacing='0' style='background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 4px 10px rgba(0,0,0,0.08);'>

                    <tr>
                        <td style='background:#0d6efd; color:#ffffff; padding:20px 30px;'>
                            <h2 style='margin:0; font-size:20px;'>Solicitud Web</h2>
                            <p style='margin:5px 0 0; font-size:14px; opacity:0.9;'>
                                Nuevo requerimiento recibido
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style='padding:30px;'>

                            <table width='100%' cellpadding='0' cellspacing='0'>

                                <tr>
                                    <td style='padding-bottom:15px;'>
                                        <strong style='color:#333;'>Nombre:</strong><br>
                                        <span style='color:#555;'>" . htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8') . "</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td style='padding-bottom:15px;'>
                                        <strong style='color:#333;'>Correo electrónico:</strong><br>
                                        <span style='color:#555;'>" . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td style='padding-bottom:15px;'>
                                        <strong style='color:#333;'>Celular / WhatsApp:</strong><br>
                                        <a href='" . htmlspecialchars($whatsappLink, ENT_QUOTES, 'UTF-8') . "' target='_blank'
                                           style='display:inline-block; margin-top:6px; padding:6px 12px; background:#e9f2ff; color:#0d6efd; border-radius:20px; font-size:13px; text-decoration:none;'>
                                            " . htmlspecialchars($celular, ENT_QUOTES, 'UTF-8') . "
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td style='padding-top:10px;'>
                                        <strong style='color:#333;'>Requerimiento:</strong>
                                        <div style='margin-top:10px; padding:15px; background:#f8f9fa; border-left:4px solid #0d6efd; border-radius:4px; color:#333; line-height:1.6;'>
                                            " . nl2br(htmlspecialchars($descripcion, ENT_QUOTES, 'UTF-8')) . "
                                        </div>
                                    </td>
                                </tr>

                            </table>

                        </td>
                    </tr>

                    <tr>
                        <td style='background:#f1f3f5; padding:15px 30px; font-size:12px; color:#666; text-align:center;'>
                            Este mensaje fue enviado desde el formulario web institucional.<br>
                            © {$anio} Superarse – Todos los derechos reservados.
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>
HTML;
    }

    public function cuerpoTexto(string $nombre, string $email, string $whatsappLink, string $descripcion): string
    {
        return "Nombre: {$nombre}\nEmail: {$email}\nWhatsApp: {$whatsappLink}\n\nRequerimiento:\n{$descripcion}";
    }

    public function enviar(string $nombre, string $email, string $celular, string $whatsappLink, string $descripcion): bool
    {
        $vendorAutoload = ROOT_PATH . '/vendor/autoload.php';
        if (is_file($vendorAutoload)) {
            require_once $vendorAutoload;
        }

        if (!class_exists(\PHPMailer\PHPMailer\PHPMailer::class)) {
            return false;
        }

        $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = getenv('SUPERARSE_SMTP_HOST') ?: 'smtp.office365.com';
            $mail->SMTPAuth   = true;
        $mail->Username   = getenv('SUPERARSE_SMTP_ALT_USERNAME') ?: 'alexander.quinga@superarse.edu.ec';
        $mail->Password   = getenv('SUPERARSE_SMTP_ALT_PASSWORD') ?: '';
            $mail->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;
            $mail->CharSet    = 'UTF-8';

            $mail->setFrom(getenv('SUPERARSE_SMTP_ALT_FROM') ?: 'alexander.quinga@superarse.edu.ec', 'Formulario de Admisión Web');
            $mail->addAddress($email, $nombre);

            foreach ($this->destinatariosAdmin() as $adminEmail) {
                $mail->addBCC($adminEmail);
            }

            $mail->addReplyTo($email, $nombre);

            $mail->isHTML(true);
            $mail->Subject = $this->asunto($nombre);
            $mail->Body    = $this->cuerpoHtml($nombre, $email, $celular, $whatsappLink, $descripcion);
            $mail->AltBody = $this->cuerpoTexto($nombre, $email, $whatsappLink, $descripcion);

            return $mail->send();
        } catch (\Exception $e) {
            error_log('PHPMailer Contacto Error: ' . $mail->ErrorInfo);
            return false;
        }
    }
}