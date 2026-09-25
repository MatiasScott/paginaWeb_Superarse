<?php

declare(strict_types=1);

namespace App\Controllers\Services;

use App\Models\Services\SolicitudesModel;

final class SolicitudesController
{
    private SolicitudesModel $model;

    public function __construct(SolicitudesModel $model)
    {
        $this->model = $model;
    }

    public function show(string $slug): void
    {
        $tipos = $this->model->tipos();
        if (!isset($tipos[$slug])) {
            http_response_code(404);
            $pageTitle = '404 - Solicitud no encontrada';
            require ROOT_PATH . '/app/Views/errors/404.php';
            return;
        }

        require ROOT_PATH . '/app/Views/solicitudes/' . $tipos[$slug];
    }

    public function subir(): void
    {
        $tipo = trim((string) ($_GET['tipo'] ?? 'Solicitud Académica'));
        $tipo = htmlspecialchars($tipo, ENT_QUOTES, 'UTF-8');

        require ROOT_PATH . '/app/Views/solicitudes/subir.php';
    }

    public function procesar(): void
    {
        header('Content-Type: application/json; charset=UTF-8');
        header('X-Content-Type-Options: nosniff');
        set_time_limit(120);

        if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
            http_response_code(403);
            echo json_encode(['success' => false, 'message' => 'Acceso denegado.']);
            return;
        }

        $resSolicitud = $this->guardarArchivo('archivo_solicitud', true, true);
        if (isset($resSolicitud['error'])) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => $resSolicitud['error']]);
            return;
        }

        $resAnexo = $this->guardarArchivo('archivo_anexo', true, false);
        if (isset($resAnexo['error'])) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => $resAnexo['error']]);
            return;
        }

        $tipo = htmlspecialchars(trim((string) ($_POST['tipo'] ?? 'Solicitud Académica')), ENT_QUOTES, 'UTF-8');
        $subject = $tipo;

        $emailEstudiante = filter_var(trim((string) ($_POST['from_email'] ?? '')), FILTER_VALIDATE_EMAIL) ?: '';
        $remitenteInstitucional = getenv('SUPERARSE_SMTP_ALT_FROM') ?: 'alexander.quinga@superarse.edu.ec';
        $esInstitucional = $emailEstudiante !== '' && str_ends_with(strtolower($emailEstudiante), '@superarse.edu.ec');
        $emisor = $esInstitucional ? $emailEstudiante : $remitenteInstitucional;
        $replyEstudiante = $emailEstudiante !== '' ? $emailEstudiante : $remitenteInstitucional;

        $listaArchivos = '<li><strong>SOLICITUD:</strong> ' . htmlspecialchars((string) $resSolicitud['original']) . '</li>';
        $listaArchivos .= '<li><strong>COMPROBANTE/BAUCHER:</strong> ' . htmlspecialchars((string) $resAnexo['original']) . '</li>';

        $infoAdicional = '';
        if ($emailEstudiante !== '') {
            $infoAdicional .= '<p><strong>Correo del estudiante:</strong> ' . htmlspecialchars($emailEstudiante) . '</p>';
        }

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
            </ul>$infoAdicional
            <p style='color:#666; font-size:12px; margin-top:30px;'>
                Enviado automáticamente el: " . date('d/m/Y H:i:s') . "
            </p>
        </div>
        <div style='background-color:#f1f3f5; padding:15px; text-align:center; font-size:12px; color:#999;'>
            © " . date('Y') . " Superarse - Sistema de Gestión de Solicitudes
        </div>
    </div>
</body>";

        if (!is_file($this->model->autoloadPath())) {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Faltan las librerías de correo. Ejecuta «composer install» en la raíz del proyecto.']);
            return;
        }

        require_once $this->model->autoloadPath();

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
            $mail->SMTPOptions = [
                'ssl' => [
                    'verify_peer'       => false,
                    'verify_peer_name'  => false,
                    'allow_self_signed' => true,
                ],
            ];
            $mail->setFrom($emisor, 'Repositorio de Solicitudes');
            $mail->addAddress($this->model->emailDestino());
            $mail->addReplyTo($replyEstudiante);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $email_content;
            $mail->addAttachment($resSolicitud['ruta'], 'Solicitud_' . $resSolicitud['nombre']);
            $mail->addAttachment($resAnexo['ruta'], 'Comprobante_' . $resAnexo['nombre']);

            $mail->send();
            $mail->smtpClose();

            echo json_encode(['success' => true, 'message' => '¡Solicitud y comprobante enviados correctamente!']);
        } catch (\Throwable $e) {
            $detalle = ($mail->ErrorInfo ?? '') !== '' ? $mail->ErrorInfo : $e->getMessage();
            error_log('[Solicitudes] Error SMTP: ' . $detalle);
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Error al enviar el correo: ' . $detalle]);
        }
    }

    /**
     * @return array{ruta: string, nombre: string, original: string}|array{error: string}|null
     */
    private function guardarArchivo(string $campo, bool $obligatorio, bool $soloPdf): ?array
    {
        if (!isset($_FILES[$campo]) || ($_FILES[$campo]['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
            return $obligatorio
                ? ['error' => "El campo de '$campo' es obligatorio o el archivo es muy pesado."]
                : null;
        }

        $archivo = $_FILES[$campo];

        $tiposPermitidos = [
            'application/pdf' => 'pdf',
            'image/jpeg'      => 'jpg',
            'image/png'       => 'png',
        ];

        if (function_exists('finfo_open')) {
            $fi   = new \finfo(FILEINFO_MIME_TYPE);
            $mime = $fi->file((string) $archivo['tmp_name']) ?: 'unknown';
        } else {
            $ext = strtolower((string) pathinfo((string) $archivo['name'], PATHINFO_EXTENSION));
            $mimesPorExt = ['pdf' => 'application/pdf', 'jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg', 'png' => 'image/png'];
            $mime = $mimesPorExt[$ext] ?? 'unknown';
        }

        if (!isset($tiposPermitidos[$mime])) {
            return ['error' => 'Formato no permitido en ' . htmlspecialchars((string) $archivo['name']) . '. Use PDF, JPG o PNG.'];
        }

        if ($soloPdf && $mime !== 'application/pdf') {
            return ['error' => 'La Solicitud (Archivo 1) debe ser estrictamente un PDF.'];
        }

        if ((int) $archivo['size'] > SolicitudesModel::MAX_SIZE) {
            return ['error' => 'El archivo ' . htmlspecialchars((string) $archivo['name']) . ' supera los 5MB permitidos.'];
        }

        $directorio = $this->model->uploadDir();
        if (!is_dir($directorio) && !@mkdir($directorio, 0755, true)) {
            return ['error' => 'Error interno: No se pueden crear directorios en el servidor. Revise permisos.'];
        }

        $nombreLimpio = (string) preg_replace('/[^A-Za-z0-9_\-]/', '_', (string) pathinfo((string) $archivo['name'], PATHINFO_FILENAME));
        $nombreArchivo = $nombreLimpio . '.' . $tiposPermitidos[$mime];
        $contador = 1;

        while (file_exists($directorio . $nombreArchivo)) {
            $nombreArchivo = $nombreLimpio . '_' . $contador . '.' . $tiposPermitidos[$mime];
            $contador++;
        }

        $rutaFinal = $directorio . $nombreArchivo;

        if (move_uploaded_file((string) $archivo['tmp_name'], $rutaFinal)) {
            return [
                'ruta'     => $rutaFinal,
                'nombre'   => $nombreArchivo,
                'original' => $archivo['name'],
            ];
        }

        return ['error' => 'No se pudo guardar ' . htmlspecialchars((string) $archivo['name']) . ' en el servidor por restricciones de escritura.'];
    }
}