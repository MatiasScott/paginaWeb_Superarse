<?php

declare(strict_types=1);

namespace App\Controllers\Admisiones;

use App\Models\Admisiones\FirmaContratoModel;

final class FirmaContratoController
{
    private FirmaContratoModel $model;

    public function __construct(FirmaContratoModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $title = $this->model->titulo();
        $carreras = $this->model->carreras();
        $asesores = $this->model->asesores();
        $clausulas = $this->model->clausulas();
        $codigoDocumento = $this->model->codigoDocumento();
        $logoWebUrl = $this->model->logoWebUrl();

        require ROOT_PATH . '/app/Views/admisiones/firma-contrato.php';
    }

    public function procesar(): void
    {
        if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
            http_response_code(405);
            echo 'Método no permitido.';
            return;
        }

        if (!is_file($this->model->autoloadPath())) {
            http_response_code(500);
            echo 'Dependencias no instaladas. Ejecute "composer require mpdf/mpdf phpmailer/phpmailer" en la raíz del proyecto.';
            return;
        }

        require $this->model->autoloadPath();

        if (!class_exists(\Mpdf\Mpdf::class) || !class_exists(\PHPMailer\PHPMailer\PHPMailer::class)) {
            http_response_code(500);
            echo 'Dependencias incompletas. Ejecute "composer require mpdf/mpdf phpmailer/phpmailer" en la raíz del proyecto.';
            return;
        }

        ob_start();

        $nombre = (string) ($_POST['nombre'] ?? '');
        $cedula = (string) ($_POST['cedula'] ?? '');
        $carrera = (string) ($_POST['carrera'] ?? '');
        $inicioPeriodo = (string) ($_POST['inicio_periodo'] ?? '');
        $finPeriodo = (string) ($_POST['fin_periodo'] ?? '');
        $firmaData = (string) ($_POST['firma_data'] ?? '');
        $firmaCc = (string) ($_POST['firma_cc'] ?? '');
        $asesor = (string) ($_POST['asesor'] ?? '');
        $action = (string) ($_POST['action'] ?? '');
        $logoPath = $this->model->logoPdfPath();

        $clausulasLi = '';
        foreach ($this->model->clausulas() as $clausula) {
            $clausulasLi .= '<li>' . $clausula . '</li>';
        }

        $htmlContent = '
        <html>
        <head>
            <meta charset="UTF-8">
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.8; color: #4a5568; }
                p { margin: 0 0 1rem 0; text-align: justify; }
                ul { list-style: none; padding-left: 1rem; text-align: justify; }
                ul li { position: relative; padding-left: 1.5rem; margin-bottom: 1rem; }
                ul li::before { content: "\2022"; color: #4a5568; font-weight: bold; display: inline-block; width: 1em; margin-left: -1em; }
                .signature-section { text-align: center; margin-top: 2rem; }
                .signature-section img { max-width: 400px; margin: 0 auto; }
            </style>
        </head>
        <body>
            <p>Yo, <strong>' . htmlspecialchars($nombre) . '</strong>, portador/a de la cédula de ciudadanía/pasaporte N° <strong>' . htmlspecialchars($cedula) . '</strong>, por medio del presente Contrato de Inscripción y Matrícula declaro que me he matriculado en el <strong>Instituto Superior Tecnológico Superarse</strong>, en la carrera de <strong>' . htmlspecialchars($carrera) . '</strong>, correspondiente al período académico <strong>' . htmlspecialchars($inicioPeriodo) . '</strong> a <strong>' . htmlspecialchars($finPeriodo) . '</strong>. Me comprometo a lo siguiente:</p>

            <ul>
                ' . $clausulasLi . '
            </ul>

            <div class="signature-section">
                <p><strong>FIRMA DEL ESTUDIANTE</strong></p>
                <img src="' . htmlspecialchars($firmaData) . '" alt="Firma del estudiante">
                <p>C.C. <strong>' . htmlspecialchars($firmaCc) . '</strong></p>
                <p>Asesor: <strong>' . htmlspecialchars($asesor) . '</strong></p>
            </div>
        </body>
        </html>';

        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 60,
            'margin_bottom' => 50,
        ]);

        $headerHtml = '
        <div style="width: 100%; height: 100px; background: linear-gradient(to right, #005a9c, #0088cc, #4299e1); color: white; padding: 1rem 2rem; display: flex; align-items: center;">
            <img src="' . $logoPath . '" alt="Logo Superarse" style="height: 70px; width: auto; margin-right: 20px;">
            <h1 style="font-size: 1.5rem;">CONTRATO DE INSCRIPCIÓN Y MATRÍCULA</h1>
        </div>';

        $footerHtml = '
        <div style="width: 100%; height: 50px; background: linear-gradient(to right, #005a9c, #0088cc, #4299e1); color: white; padding: 0.5rem 1rem;">
            <table width="100%">
                <tr>
                    <td style="text-align: left;">Página {PAGENO} de {nbpg}</td>
                    <td style="text-align: right;">ISTS-GD-02-001</td>
                </tr>
            </table>
        </div>';

        $mpdf->SetHTMLHeader($headerHtml);
        $mpdf->SetHTMLFooter($footerHtml);
        $mpdf->WriteHTML($htmlContent);

        $pdfOutput = $mpdf->Output('contrato.pdf', 'S');

        if ($action === 'send_and_download') {
            $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host       = getenv('SUPERARSE_SMTP_HOST') ?: 'smtp.office365.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = getenv('SUPERARSE_SMTP_ALT_USERNAME') ?: 'alexander.quinga@superarse.edu.ec';
                $mail->Password   = getenv('SUPERARSE_SMTP_ALT_PASSWORD') ?: '';

                $mail->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;

                $mail->SMTPOptions = [
                    'ssl' => [
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true,
                    ],
                ];

                $mail->setFrom('alexander.quinga@superarse.edu.ec', 'Instituto Superarse (Sistema)');

                $mail->addAddress('superarseadmisiones@gmail.com', 'Admisiones Superarse');

                $mail->Subject = 'CONTRATO DE MATRICULA ' . $nombre;
                $mail->isHTML(true);

                $mail->Body = '
                    <p>Estimados,</p>
                    <p>Adjuntamos el contrato de matrícula correspondiente al estudiante <strong>' . htmlspecialchars($nombre) . '</strong> (Cédula: ' . htmlspecialchars($cedula) . ').</p>
                    <p>Saludos cordiales,<br><strong>Instituto Superior Tecnológico Superarse</strong></p>
                ';

                $filename = 'contrato_' . str_replace(' ', '_', $nombre) . '.pdf';
                $mail->addStringAttachment($pdfOutput, $filename, 'base64', 'application/pdf');

                $mail->send();
                error_log('Correo enviado correctamente via SMTP al enviar el contrato de ' . $nombre);
            } catch (\Exception $e) {
                error_log('Error al enviar el correo: ' . $mail->ErrorInfo);
                echo "<script>alert('Error de conexión SMTP: El correo no se pudo enviar. Causa: " . str_replace("'", "\'", $mail->ErrorInfo) . "');</script>";
            }
        }

        ob_end_clean();
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="contrato_' . str_replace(' ', '_', $nombre) . '.pdf"');
        echo $pdfOutput;
    }
}