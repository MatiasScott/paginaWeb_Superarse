<?php

declare(strict_types=1);

namespace App\Controllers\Institution;

use App\Models\Institution\CalidadPlanificacionModel;

final class CalidadPlanificacionController
{
    private CalidadPlanificacionModel $model;

    public function __construct(CalidadPlanificacionModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $kicker = $this->model->kicker();
        $titleLines = $this->model->titleLines();

        // sección arma cada tarjeta del contenido
        $sections = $this->model->sections();

        // card_resume: tarjeta de descarga del informe de autoevaluación
        $autoevaluacionCard = $this->model->autoevaluacionCard();

        $pediFrameUrl = $this->model->pediFrameUrl();

        require ROOT_PATH . '/app/Views/institution/calidad-planificacion.php';
    }
}