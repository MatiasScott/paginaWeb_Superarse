<?php

declare(strict_types=1);

namespace App\Controllers\Institution;

use App\Models\Institution\RemuneracionMensualModel;

final class RemuneracionMensualController
{
    private RemuneracionMensualModel $model;

    public function __construct(RemuneracionMensualModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $heroIcon = $this->model->heroIcon();
        $heroKicker = $this->model->kicker();
        $heroTitle = $this->model->title();
        $heroParagraphs = $this->model->paragraphs();
        $pillars = $this->model->pillars();
        $cta = $this->model->cta();

        require ROOT_PATH . '/app/Views/institution/remuneracion-mensual.php';
    }
}