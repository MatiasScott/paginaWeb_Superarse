<?php

declare(strict_types=1);

namespace App\Controllers\VinculacionConLaSociedad;

use App\Models\VinculacionConLaSociedad\PresenciaComunidadModel;

final class PresenciaComunidadController
{
    private PresenciaComunidadModel $model;

    public function __construct(PresenciaComunidadModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $kicker   = $this->model->kicker();
        $title    = $this->model->title();
        $carrusel = $this->model->carrusel();

        require ROOT_PATH . '/app/Views/vinculacion-con-la-sociedad/presencia-comunidad.php';
    }
}