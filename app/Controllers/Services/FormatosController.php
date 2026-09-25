<?php

declare(strict_types=1);

namespace App\Controllers\Services;

use App\Models\Services\FormatosModel;

final class FormatosController
{
    private FormatosModel $model;

    public function __construct(FormatosModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $title = 'Solicitudes Estudiantiles';
        $formatos = $this->model->formatos();

        require ROOT_PATH . '/app/Views/services/formatos.php';
    }
}