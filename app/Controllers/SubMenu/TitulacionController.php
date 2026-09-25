<?php

declare(strict_types=1);

namespace App\Controllers\SubMenu;

use App\Models\SubMenu\TitulacionModel;

final class TitulacionController
{
    private TitulacionModel $model;

    public function __construct(TitulacionModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $kicker     = $this->model->kicker();
        $title      = $this->model->title();
        $graduados  = $this->model->graduados();
        $secciones  = $this->model->secciones();

        require ROOT_PATH . '/app/Views/submenu/titulacion.php';
    }
}