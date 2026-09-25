<?php

declare(strict_types=1);

namespace App\Controllers\Plataformas;

use App\Models\Plataformas\PlataformasModel;

final class PlataformasController
{
    private PlataformasModel $model;

    public function __construct(PlataformasModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $kicker      = $this->model->kicker();
        $title       = $this->model->title();
        $plataformas = $this->model->plataformas();

        require ROOT_PATH . '/app/Views/plataformas/plataformas.php';
    }
}