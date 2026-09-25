<?php

declare(strict_types=1);

namespace App\Controllers\Services;

use App\Models\Services\GraduadosModel;

final class GraduadosController
{
    private GraduadosModel $model;

    public function __construct(GraduadosModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $title = 'Graduados';
        $beneficios = $this->model->beneficios();
        $servicios = $this->model->servicios();
        $formulario = $this->model->formulario();
        $contacto = $this->model->contacto();
        $estadisticasCarreras = $this->model->estadisticasCarreras();
        $ofertasLaboralesImagenes = $this->model->ofertasLaboralesImagenes();

        require ROOT_PATH . '/app/Views/services/graduados.php';
    }
}