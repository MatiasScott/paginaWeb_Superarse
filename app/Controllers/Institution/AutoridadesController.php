<?php

declare(strict_types=1);

namespace App\Controllers\Institution;

use App\Models\Institution\AutoridadesModel;

final class AutoridadesController
{
    private AutoridadesModel $model;

    public function __construct(AutoridadesModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $kicker = $this->model->kicker();
        $title = $this->model->title();
        $introParagraphs = $this->model->introParagraphs();
        $defaultImage = $this->model->defaultImage();

        // Clasificación para colaboradores sin foto (fallback del navegador)
        $auths = $this->model->authoritiesById();

        require ROOT_PATH . '/app/Views/institution/autoridades.php';
    }
}