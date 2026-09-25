<?php

declare(strict_types=1);

namespace App\Controllers\SubMenu;

use App\Models\SubMenu\EvaluacionDocenteModel;

final class EvaluacionDocenteController
{
    private EvaluacionDocenteModel $model;

    public function __construct(EvaluacionDocenteModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $kicker              = $this->model->kicker();
        $title               = $this->model->title();
        $tabs                = $this->model->tabs();
        $pdfGruposReglamento = $this->model->pdfGruposReglamento();
        $pdfGruposProcedimiento = $this->model->pdfGruposProcedimiento();
        $periodos            = $this->model->periodos();

        require ROOT_PATH . '/app/Views/submenu/evaluacion-docente.php';
    }
}