<?php

declare(strict_types=1);

namespace App\Controllers\Institution;

use App\Models\Institution\ProtocolosModel;

final class ProtocolosController
{
    private ProtocolosModel $model;

    public function __construct(ProtocolosModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $kicker = $this->model->kicker();
        $title = $this->model->title();
        $buttonLabel = $this->model->buttonLabel();

        // protocolos con selector de toggle por índice (protocolo1-rest, protocolo2-rest...)
        $protocols = $this->model->protocols();

        $extraScripts = [asset('js/app/modules/institution/protocolos.js')];

        require ROOT_PATH . '/app/Views/institution/protocolos.php';
    }
}