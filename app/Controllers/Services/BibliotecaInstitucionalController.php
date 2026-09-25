<?php

declare(strict_types=1);

namespace App\Controllers\Services;

use App\Models\Services\BibliotecaInstitucionalModel;

final class BibliotecaInstitucionalController
{
    private BibliotecaInstitucionalModel $model;

    public function __construct(BibliotecaInstitucionalModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $title = 'Biblioteca Institucional';
        $hero = $this->model->hero();
        $servicios = $this->model->servicios();
        $basesDeDatos = $this->model->basesDeDatos();
        $horarios = $this->model->horarios();
        $contacto = $this->model->contacto();
        $reglamento = $this->model->reglamento();

        require ROOT_PATH . '/app/Views/services/biblioteca-institucional.php';
    }
}