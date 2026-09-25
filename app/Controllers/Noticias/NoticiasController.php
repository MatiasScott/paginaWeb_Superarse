<?php

declare(strict_types=1);

namespace App\Controllers\Noticias;

use App\Models\Noticias\NoticiasModel;

final class NoticiasController
{
    private NoticiasModel $model;

    public function __construct(NoticiasModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $kicker   = $this->model->kicker();
        $title    = $this->model->title();
        $noticias = $this->model->noticias();

        require ROOT_PATH . '/app/Views/noticias/noticias.php';
    }
}