<?php

declare(strict_types=1);

namespace App\Controllers\Institution;

use App\Models\Institution\CodigoEticaModel;

final class CodigoEticaController
{
    private CodigoEticaModel $model;

    public function __construct(CodigoEticaModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $kicker = $this->model->kicker();
        $title = $this->model->title();
        $youtubeId = $this->model->youtubeId();
        $normativesLabel = $this->model->normativesLabel();
        $introParagraphs = $this->model->introParagraphs();
        $documentHeading = $this->model->documentHeading();
        $pdfUrl = $this->model->pdfUrl();

        require ROOT_PATH . '/app/Views/institution/codigo-etica.php';
    }
}