<?php

declare(strict_types=1);

namespace App\Controllers\Institution;

use App\Models\Institution\NormativaModel;

final class NormativaController
{
    private NormativaModel $model;

    public function __construct(NormativaModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $icon = $this->model->icon();
        $kicker = $this->model->kicker();
        $title = $this->model->title();
        $paragraphs = $this->model->paragraphs();
        $documentsHeading = $this->model->documentsHeading();
        $pdfUrl = $this->model->pdfUrl();
        $pdfPageLabel = $this->model->pdfPageLabel();

        $extraScripts = [asset('js/app/modules/institution/codigoInstitucional.js')];

        require ROOT_PATH . '/app/Views/institution/normativa.php';
    }
}