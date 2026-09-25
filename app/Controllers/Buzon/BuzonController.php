<?php
declare(strict_types=1);

namespace App\Controllers\Buzon;

use App\Models\Buzon\BuzonModel;

class BuzonController
{
    private BuzonModel $model;

    public function __construct(BuzonModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $title = 'Buzón de Cumplidos, Sugerencias y Quejas - Instituto Superarse';
        $standaloneStyles = [
            'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
            asset('css/buzon.css'),
        ];
        $extraScripts = '<script src="' . asset('js/Buzon/buzon.js') . '"></script>';

        $model = $this->model;
        ob_start();
        require ROOT_PATH . '/app/Views/buzon/index.php';
        $content = ob_get_clean();

        require ROOT_PATH . '/app/Views/layouts/standalone.php';
    }

    public function mostrarQr(): void
    {
        $title = 'Generar Código QR - Buzón Institucional';
        $standaloneStyles = [
            asset('css/qr.css'),
        ];
        $extraScripts = '
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script src="' . asset('js/Buzon/qr.js') . '"></script>';

        ob_start();
        require ROOT_PATH . '/app/Views/buzon/qr.php';
        $content = ob_get_clean();

        require ROOT_PATH . '/app/Views/layouts/standalone.php';
    }

    public function enviar(): void
    {
        header('Content-Type: application/json; charset=UTF-8');
        header('X-Content-Type-Options: nosniff');

        if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
            http_response_code(403);
            echo json_encode(['success' => false, 'message' => 'Acceso denegado.']);
            return;
        }

        $tipo = strtolower(trim((string) ($_POST['tipo'] ?? '')));
        $mensaje = trim((string) ($_POST['mensaje'] ?? ''));

        $error = $this->model->validar($tipo, $mensaje);
        if ($error !== null) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => $error]);
            return;
        }

        if (!$this->model->enviar($tipo, $mensaje)) {
            http_response_code(500);
            echo json_encode([
                'success' => false,
                'message' => 'No se pudo enviar el mensaje. Intenta más tarde.',
            ]);
            return;
        }

        echo json_encode([
            'success' => true,
            'message' => '¡Gracias! Tu mensaje fue enviado correctamente.',
        ]);
    }
}