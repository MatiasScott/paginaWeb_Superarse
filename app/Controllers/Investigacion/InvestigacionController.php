<?php

declare(strict_types=1);

namespace App\Controllers\Investigacion;

use App\Models\Investigacion\InvestigacionModel;

final class InvestigacionController
{
    private InvestigacionModel $model;

    public function __construct(InvestigacionModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $kicker = $this->model->kicker();
        $title  = $this->model->title();
        $items  = $this->model->items();

        require ROOT_PATH . '/app/Views/investigacion/investigacion.php';
    }
}