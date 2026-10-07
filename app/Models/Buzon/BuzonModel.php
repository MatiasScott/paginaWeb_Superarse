<?php
declare(strict_types=1);

namespace App\Models\Buzon;

use App\Core\InstitutionalMailer;

class BuzonModel
{
    public function tipos(): array
    {
        return [
            'cumplido'   => 'Cumplido',
            'sugerencia' => 'Sugerencia',
            'queja'      => 'Queja',
        ];
    }

    public function validar(string $tipo, string $mensaje): ?string
    {
        if (!isset($this->tipos()[$tipo])) {
            return 'Tipo de mensaje no válido.';
        }

        $mensaje = trim($mensaje);
        if ($mensaje === '') {
            return 'Todos los campos son obligatorios.';
        }

        $longitud = function_exists('mb_strlen') ? mb_strlen($mensaje) : strlen($mensaje);
        if ($longitud < 10) {
            return 'El mensaje debe tener al menos 10 caracteres.';
        }
        if ($longitud > 1500) {
            return 'El mensaje es demasiado largo (máximo 1500 caracteres).';
        }

        return null;
    }

    public function destinatarios(): array
    {
        return [
            'informacion@superarse.edu.ec',
        ];
    }

    public function asunto(string $tipo): string
    {
        return 'Nuevo mensaje del Buzón Web (' . ($this->tipos()[$tipo] ?? ucfirst($tipo)) . ')';
    }

    public function cuerpoHtml(string $tipo, string $mensaje): string
    {
        $etiqueta = $this->tipos()[$tipo] ?? ucfirst($tipo);
        $mensajeHtml = nl2br(htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8'));
        $anio = date('Y');

        return <<<HTML
<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <title>Buzón Institucional</title>
</head>
<body style='margin:0; padding:0; background-color:#f4f6f8; font-family:Arial, Helvetica, sans-serif;'>

    <table width='100%' cellpadding='0' cellspacing='0' style='background-color:#f4f6f8; padding:30px 0;'>
        <tr>
            <td align='center'>

                <table width='600' cellpadding='0' cellspacing='0' style='background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 4px 10px rgba(0,0,0,0.08);'>

                    <tr>
                        <td style='background:#0d6efd; color:#ffffff; padding:20px 30px;'>
                            <h2 style='margin:0; font-size:20px;'>Buzón Institucional Web</h2>
                            <p style='margin:5px 0 0; font-size:14px; opacity:0.9;'>
                                Cumplidos, sugerencias y quejas
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style='padding:30px;'>

                            <table width='100%' cellpadding='0' cellspacing='0'>
                                <tr>
                                    <td style='padding-bottom:15px;'>
                                        <strong style='color:#333;'>Tipo de mensaje:</strong><br>
                                        <span style='display:inline-block; margin-top:6px; padding:6px 12px; background:#e9f2ff; color:#0d6efd; border-radius:20px; font-size:13px;'>
                                            {$etiqueta}
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td style='padding-top:10px;'>
                                        <strong style='color:#333;'>Mensaje recibido:</strong>
                                        <div style='margin-top:10px; padding:15px; background:#f8f9fa; border-left:4px solid #0d6efd; border-radius:4px; color:#333; line-height:1.6;'>
                                            {$mensajeHtml}
                                        </div>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                    <tr>
                        <td style='background:#f1f3f5; padding:15px 30px; font-size:12px; color:#666; text-align:center;'>
                            Este mensaje fue enviado de forma <strong>anónima</strong> desde el sitio web institucional.<br>
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

    public function cuerpoTexto(string $tipo, string $mensaje): string
    {
        return 'Tipo: ' . ($this->tipos()[$tipo] ?? ucfirst($tipo)) . "\n\nMensaje:\n" . trim($mensaje);
    }

    public function enviar(string $tipo, string $mensaje): bool
    {
        try {
            $mail = InstitutionalMailer::create('Buzón Web Institucional');

            foreach ($this->destinatarios() as $email) {
                $mail->addAddress($email);
            }

            $mail->isHTML(true);
            $mail->Subject = $this->asunto($tipo);
            $mail->Body    = $this->cuerpoHtml($tipo, $mensaje);
            $mail->AltBody = $this->cuerpoTexto($tipo, $mensaje);

            return $mail->send();
        } catch (\Throwable $e) {
            error_log('PHPMailer Buzón Error: ' . $e->getMessage());
            return false;
        }
    }
}