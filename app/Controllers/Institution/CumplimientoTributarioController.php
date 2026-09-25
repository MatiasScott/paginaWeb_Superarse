<?php

declare(strict_types=1);

namespace App\Controllers\Institution;

use App\Models\Institution\CumplimientoTributarioModel;

final class CumplimientoTributarioController
{
    private CumplimientoTributarioModel $model;

    public function __construct(CumplimientoTributarioModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $heroIcon = $this->model->heroIcon();
        $heroKicker = $this->model->kicker();
        $heroTitle = $this->model->title();
        $heroParagraphs = $this->model->paragraphs();
        $stampText = $this->model->stampText();
        $documentsHeading = $this->model->documentsHeading();
        $documentsPrompt = $this->model->documentsPrompt();
        $documents = $this->model->documents();
        $note = $this->model->note();

        require ROOT_PATH . '/app/Views/institution/cumplimiento-tributario.php';
    }
}