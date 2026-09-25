<?php

declare(strict_types=1);

namespace App\Controllers\Institution;

use App\Models\Institution\MensajeRectoraModel;

final class MensajeRectoraController
{
    private MensajeRectoraModel $model;

    public function __construct(MensajeRectoraModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $kicker = $this->model->kicker();
        $title = $this->model->title();
        $greeting = $this->model->greeting();
        $introParagraphs = $this->model->introParagraphs();
        $photo = $this->model->photo();
        $photoAlt = $this->model->photoAlt();
        $closingParagraphs = $this->model->closingParagraphs();
        $finalPhrase = $this->model->finalPhrase();
        $signatureName = $this->model->signatureName();
        $signatureRole = $this->model->signatureRole();

        require ROOT_PATH . '/app/Views/institution/mensaje-rectora.php';
    }
}