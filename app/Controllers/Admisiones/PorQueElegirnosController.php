<?php

declare(strict_types=1);

namespace App\Controllers\Admisiones;

use App\Models\Admisiones\PorQueElegirnosModel;

final class PorQueElegirnosController
{
    private PorQueElegirnosModel $model;

    public function __construct(PorQueElegirnosModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $title = $this->model->titulo();
        $intro = $this->model->intro();
        $frases = $this->model->frases();
        $secciones = $this->model->secciones();

        require ROOT_PATH . '/app/Views/admisiones/por-que-elegirnos.php';
    }
}