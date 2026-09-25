<?php

declare(strict_types=1);

namespace App\Controllers\SubMenu;

use App\Models\SubMenu\ProcesosAcademicosModel;

final class ProcesosAcademicosController
{
    private ProcesosAcademicosModel $model;

    public function __construct(ProcesosAcademicosModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $kicker    = $this->model->kicker();
        $title     = $this->model->title();
        $genially  = $this->model->geniallyUrl();
        $calendarios = $this->model->calendarios();

        require ROOT_PATH . '/app/Views/submenu/procesos-academicos.php';
    }
}