<?php

declare(strict_types=1);

namespace App\Controllers\Institution;

use App\Models\Institution\PlanificacionPediModel;

final class PlanificacionPediController
{
    private PlanificacionPediModel $model;

    public function __construct(PlanificacionPediModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $kicker = $this->model->kicker();
        $title = $this->model->title();
        $paragraphs = $this->model->paragraphs();
        $pillars = $this->model->pillars();
        $cta = $this->model->cta();

        require ROOT_PATH . '/app/Views/institution/planificacion-pedi.php';
    }
}