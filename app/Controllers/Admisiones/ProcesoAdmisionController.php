<?php

declare(strict_types=1);

namespace App\Controllers\Admisiones;

use App\Models\Admisiones\ProcesoAdmisionModel;

final class ProcesoAdmisionController
{
    private ProcesoAdmisionModel $model;

    public function __construct(ProcesoAdmisionModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $title = $this->model->titulo();
        $cta = $this->model->cta();
        $pasos = $this->model->pasos();

        require ROOT_PATH . '/app/Views/admisiones/proceso-admision.php';
    }
}