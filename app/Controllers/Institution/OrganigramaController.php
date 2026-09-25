<?php

declare(strict_types=1);

namespace App\Controllers\Institution;

use App\Models\Institution\OrganigramaModel;

final class OrganigramaController
{
    private OrganigramaModel $model;

    public function __construct(OrganigramaModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $kicker = $this->model->kicker();
        $title = $this->model->title();
        $introParagraphs = $this->model->introParagraphs();
        $pdfUrl = $this->model->pdfUrl();

        require ROOT_PATH . '/app/Views/institution/organigrama.php';
    }
}