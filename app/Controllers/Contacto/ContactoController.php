<?php
declare(strict_types=1);

namespace App\Controllers\Contacto;

use App\Models\Contacto\ContactoModel;

final class ContactoController
{
    private ContactoModel $model;

    public function __construct(ContactoModel $model)
    {
        $this->model = $model;
    }

    public function enviar(): void
    {
        header('Content-Type: text/plain; charset=UTF-8');
        header('X-Content-Type-Options: nosniff');

        if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
            http_response_code(403);
            echo 'Acceso Denegado. Hubo un problema con tu envío, por favor intenta de nuevo.';
            return;
        }

        $nombre = trim((string) ($_POST['nombre'] ?? ''));
        $email = trim((string) ($_POST['email'] ?? ''));
        $celular = trim((string) ($_POST['celular'] ?? ''));
        $descripcion = trim((string) ($_POST['description'] ?? ''));

        $error = $this->model->validar($nombre, $email, $celular, $descripcion);
        if ($error !== null) {
            http_response_code(400);
            echo $error;
            return;
        }

        $whatsappLink = $this->model->whatsapp($celular);

        if (!$this->model->enviar($nombre, $email, $celular, $whatsappLink, $descripcion)) {
            http_response_code(500);
            echo 'Oops! Algo salió mal y no pudimos enviar tu mensaje.';
            return;
        }

        echo '¡Éxito! Su solicitud ha sido enviada. Pronto nos pondremos en contacto.';
    }
}