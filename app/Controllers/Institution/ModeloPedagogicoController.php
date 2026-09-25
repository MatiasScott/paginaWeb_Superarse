<?php

declare(strict_types=1);

namespace App\Controllers\Institution;

use App\Models\Institution\ModeloPedagogicoModel;

final class ModeloPedagogicoController
{
    private ModeloPedagogicoModel $model;

    public function __construct(ModeloPedagogicoModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $kicker = $this->model->kicker();
        $title = $this->model->title();
        $paragraphs = $this->model->paragraphs();
        $cta = $this->model->cta();

        require ROOT_PATH . '/app/Views/institution/modelo-pedagogico.php';
    }
}