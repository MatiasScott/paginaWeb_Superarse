<?php

declare(strict_types=1);

namespace App\Controllers\Institution;

use App\Models\Institution\ReglamentosModel;

final class ReglamentosController
{
    private ReglamentosModel $model;

    public function __construct(ReglamentosModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $kicker = $this->model->kicker();
        $title = $this->model->title();
        $intro = $this->model->intro();
        $tip = $this->model->tip();

        // reglamentos por fila del acordeón
        $regulations = $this->model->regulations();

        require ROOT_PATH . '/app/Views/institution/reglamentos.php';
    }
}