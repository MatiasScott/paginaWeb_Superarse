<?php

declare(strict_types=1);

namespace App\Controllers\Institution;

use App\Models\Institution\RendicionCuentasModel;

final class RendicionCuentasController
{
    private RendicionCuentasModel $model;

    public function __construct(RendicionCuentasModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $heroIcon = $this->model->heroIcon();
        $heroKicker = $this->model->kicker();
        $heroTitle = $this->model->title();
        $heroTitleUppercase = $this->model->titleUppercase();
        $heroParagraphs = $this->model->paragraphs();
        $cta = $this->model->cta();

        require ROOT_PATH . '/app/Views/institution/rendicion-cuentas.php';
    }
}