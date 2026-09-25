<?php

declare(strict_types=1);

namespace App\Controllers\Institution;

use App\Models\Institution\EstadoFinancieroModel;

final class EstadoFinancieroController
{
    private EstadoFinancieroModel $model;

    public function __construct(EstadoFinancieroModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $heroIcon = $this->model->heroIcon();
        $heroKicker = $this->model->kicker();
        $heroTitle = $this->model->title();
        $heroParagraphs = $this->model->paragraphs();
        $cta = $this->model->cta();

        require ROOT_PATH . '/app/Views/institution/estado-financiero.php';
    }
}