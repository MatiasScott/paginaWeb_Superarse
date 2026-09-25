<?php
declare(strict_types=1);

namespace App\Controllers\Services;

use App\Models\Services\FormularioBienestarModel;

class FormularioBienestarController
{
    private FormularioBienestarModel $model;

    public function __construct(FormularioBienestarModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $title = 'Solicitud de Beca - Instituto Superarse';
        $standaloneStyles = [
            asset('css/formulario-bienestar.css'),
        ];
        $extraScripts = '
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.0/dist/signature_pad.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="' . asset('js/app/modules/services/formulario-bienestar.js') . '"></script>';

        $model = $this->model;
        ob_start();
        require ROOT_PATH . '/app/Views/Services/formulario-bienestar.php';
        $content = ob_get_clean();

        require ROOT_PATH . '/app/Views/layouts/standalone.php';
    }

    public function procesar(): void
    {
        if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
            http_response_code(405);
            echo 'Método de solicitud no válido.';
            return;
        }

        $datos = [
            'nombre'        => htmlspecialchars((string) ($_POST['nombre'] ?? ''), ENT_QUOTES, 'UTF-8'),
            'identificacion'=> htmlspecialchars((string) ($_POST['identificacion'] ?? ''), ENT_QUOTES, 'UTF-8'),
            'periodo'       => htmlspecialchars((string) ($_POST['periodo'] ?? ''), ENT_QUOTES, 'UTF-8'),
            'carrera'       => htmlspecialchars((string) ($_POST['carrera'] ?? ''), ENT_QUOTES, 'UTF-8'),
            'nivel'         => htmlspecialchars((string) ($_POST['nivel'] ?? ''), ENT_QUOTES, 'UTF-8'),
            'tipo_beca'     => htmlspecialchars((string) ($_POST['tipo_beca'] ?? ''), ENT_QUOTES, 'UTF-8'),
            'telefono'      => htmlspecialchars((string) ($_POST['telefono'] ?? ''), ENT_QUOTES, 'UTF-8'),
            'firma_data_base64' => (string) ($_POST['firma_data_base64'] ?? ''),
        ];

        if ($datos['nombre'] === '' || $datos['identificacion'] === '' || $datos['firma_data_base64'] === '') {
            http_response_code(400);
            echo 'Error: Por favor, complete todos los campos obligatorios y firme el documento.';
            return;
        }

        $tiposBeca = $this->model->tiposBeca();
        $institucional = $this->model->datosInstitucionales();
        $logoPath = $this->model->logoPath();

        ob_start();
        require ROOT_PATH . '/app/Views/Services/partials/solicitud_beca_pdf.php';
        $htmlContent = ob_get_clean();

$vendorAutoload = ROOT_PATH . '/vendor/autoload.php';
if (is_file($vendorAutoload)) {
    require_once $vendorAutoload;
}

if (!class_exists(\Mpdf\Mpdf::class) || !class_exists(\PHPMailer\PHPMailer\PHPMailer::class)) {
    echo 'La solicitud ha sido recibida (entorno de desarrollo: faltan librerías vendor; ejecute "composer require mpdf/mpdf phpmailer/phpmailer" en la raíz para activar el envío).';
    return;
}

$this->generarYEnviarPdf($htmlContent, $datos);
    }

    private function generarYEnviarPdf(string $htmlContent, array $datos): void
    {
        try {
            $mpdf = new \Mpdf\Mpdf([
                'mode' => 'utf-8',
                'format' => 'A4',
                'margin_left' => 10,
                'margin_right' => 10,
                'margin_top' => 10,
                'margin_bottom' => 10,
                'shrink_tables_to_fit' => 1,
            ]);
            $mpdf->SetDisplayMode('fullpage');
            $mpdf->WriteHTML($htmlContent);
            $pdfOutput = $mpdf->Output('', 'S');
        } catch (\Mpdf\MpdfException $e) {
            exit('Error PDF: ' . $e->getMessage());
        }

        $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = getenv('SUPERARSE_SMTP_HOST') ?: 'smtp.office365.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = getenv('SUPERARSE_SMTP_USERNAME') ?: 'informacion@superarse.edu.ec';
            $mail->Password   = getenv('SUPERARSE_SMTP_PASSWORD') ?: '';
            $mail->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;
            $mail->CharSet    = 'UTF-8';
            $mail->setFrom(getenv('SUPERARSE_SMTP_FROM') ?: 'informacion@superarse.edu.ec', 'Instituto Superarse');
            $mail->addAddress($this->model->datosInstitucionales()['emailDestino']);
            $mail->isHTML(true);
            $mail->Subject = 'Nueva Solicitud de Beca - ' . $datos['nombre'];
            $mail->Body    = 'Se adjunta la solicitud de beca firmada por ' . $datos['nombre'];
            $mail->addStringAttachment($pdfOutput, 'Solicitud_Beca.pdf', 'base64', 'application/pdf');

            if ($mail->send()) {
                echo 'La solicitud ha sido enviada con éxito.';
            }
        } catch (\Exception $e) {
            echo "Error al enviar el correo: {$mail->ErrorInfo}";
        }
    }
}