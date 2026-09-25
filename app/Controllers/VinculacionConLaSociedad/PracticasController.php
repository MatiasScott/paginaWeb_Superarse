<?php

declare(strict_types=1);

namespace App\Controllers\VinculacionConLaSociedad;

use App\Models\VinculacionConLaSociedad\PracticasModel;

final class PracticasController
{
    private PracticasModel $model;

    public function __construct(PracticasModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $kicker      = $this->model->kicker();
        $title       = $this->model->title();
        $carrusel    = $this->model->carrusel();
        $modalidades = $this->model->modalidades();

        require ROOT_PATH . '/app/Views/vinculacion-con-la-sociedad/practicas.php';
    }
}