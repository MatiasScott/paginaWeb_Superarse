<?php

declare(strict_types=1);

namespace App\Controllers\Institution;

use App\Models\Institution\ModelosModel;

final class ModelosController
{
    private ModelosModel $model;

    public function __construct(ModelosModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $kicker = $this->model->kicker();
        $title = $this->model->title();
        $introParagraphs = $this->model->introParagraphs();
        $documentsHeading = $this->model->documentsHeading();
        $documentsPrompt = $this->model->documentsPrompt();

        // modelo_es URL de cada documento del acordeón
        $modelos = $this->model->models();

        require ROOT_PATH . '/app/Views/institution/modelos.php';
    }
}