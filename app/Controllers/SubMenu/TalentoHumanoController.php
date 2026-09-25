<?php

declare(strict_types=1);

namespace App\Controllers\SubMenu;

use App\Models\SubMenu\TalentoHumanoModel;

final class TalentoHumanoController
{
    private TalentoHumanoModel $model;

    public function __construct(TalentoHumanoModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $kicker           = $this->model->kicker();
        $title            = $this->model->title();
        $tabs             = $this->model->tabs();
        $procesoSeleccion = $this->model->procesoSeleccion();
        $vacantesSlides   = $this->model->vacantesSlides();
        $entornoSlides    = $this->model->entornoLaboralSlides();
        $concursoGrupos   = $this->model->concursoGrupos();
        $convocatoriaGrupos = $this->model->convocatoriaGrupos();
        $mejoresEvaluados = $this->model->mejoresEvaluados();
        $docentes         = $this->model->docentes();
        $infraestructura  = $this->model->infraestructura();
        $ssoBotones       = $this->model->ssoBotones();
        $ssoPausas        = $this->model->ssoPausasActivas();
        $ssoSimulacros    = $this->model->ssoSimulacros();

        require ROOT_PATH . '/app/Views/submenu/talento-humano.php';
    }
}