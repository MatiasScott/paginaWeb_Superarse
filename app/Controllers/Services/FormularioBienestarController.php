<?php
declare(strict_types=1);

namespace App\Controllers\Services;

use App\Core\InstitutionalMailer;
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
        require ROOT_PATH . '/app/Views/services/formulario-bienestar.php';
        $content = ob_get_clean();

        require ROOT_PATH . '/app/Views/layouts/standalone.php';
    }

    public function procesar(): void
    {
        header('Content-Type: text/plain; charset=UTF-8');
        header('X-Content-Type-Options: nosniff');

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
        require ROOT_PATH . '/app/Views/services/partials/solicitud_beca_pdf.php';
        $htmlContent = ob_get_clean();

        $this->generarYEnviarPdf($htmlContent, $datos);
    }

    private function generarYEnviarPdf(string $htmlContent, array $datos): void
    {
        try {
            $mail = InstitutionalMailer::create('Instituto Superarse');
            if (!class_exists(\Dompdf\Dompdf::class)) {
                throw new \RuntimeException('Falta Dompdf. Ejecute composer install.');
            }

            $options = new \Dompdf\Options();
            $options->setChroot(ROOT_PATH);
            $options->setDefaultFont('DejaVu Sans');
            $pdf = new \Dompdf\Dompdf($options);
            $pdf->setPaper('A4');
            $pdf->loadHtml($htmlContent, 'UTF-8');
            $pdf->render();
            $pdfOutput = $pdf->output();

            $mail->addAddress($this->model->datosInstitucionales()['emailDestino']);
            $mail->isHTML(true);
            $mail->Subject = 'Nueva Solicitud de Beca - ' . $datos['nombre'];
            $mail->Body    = 'Se adjunta la solicitud de beca firmada por ' . $datos['nombre'];
            $mail->AltBody = html_entity_decode($mail->Body, ENT_QUOTES, 'UTF-8');
            $mail->addStringAttachment($pdfOutput, 'Solicitud_Beca.pdf', 'base64', 'application/pdf');

            if ($mail->send()) {
                echo 'La solicitud ha sido enviada con éxito.';
            } else {
                throw new \RuntimeException('PHPMailer no confirmó el envío de la solicitud.');
            }
        } catch (\Throwable $e) {
            error_log('[FormularioBienestar] Error al generar o enviar la solicitud: ' . $e->getMessage());
            http_response_code(500);
            echo 'No se pudo enviar la solicitud de beca. Por favor, intente de nuevo o contacte a soporte.';
        }
    }
}