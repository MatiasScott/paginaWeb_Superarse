<?php

declare(strict_types=1);

namespace App\Controllers\VinculacionConLaSociedad;

use App\Models\VinculacionConLaSociedad\VinculacionModel;

final class VinculacionController
{
    private VinculacionModel $model;

    public function __construct(VinculacionModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $kicker = $this->model->kicker();
        $title = $this->model->title();

        // Lista de áreas de vinculación
        $areas = $this->model->areas();

       // Cambia esto en la línea 26 de VinculacionController.php:
       require ROOT_PATH . '/app/Views/vinculacion-con-la-sociedad/vinculacion.php';
    }
}