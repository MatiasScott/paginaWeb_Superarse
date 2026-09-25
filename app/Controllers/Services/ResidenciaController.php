<?php

declare(strict_types=1);

namespace App\Controllers\Services;

use App\Models\Services\ResidenciaModel;

final class ResidenciaController
{
    private ResidenciaModel $model;

    public function __construct(ResidenciaModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $title = 'Residencia Estudiantil';
        $titulo = $this->model->titulo();
        $subtitulo = $this->model->subtitulo();
        $carrusel = $this->model->carrusel();
        $horarios = $this->model->horarios();
        $contacto = $this->model->contacto();
        $servicios = $this->model->servicios();
        $cierre = $this->model->cierre();

        require ROOT_PATH . '/app/Views/services/residencia.php';
    }
}