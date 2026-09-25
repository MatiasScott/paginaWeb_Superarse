<?php

declare(strict_types=1);

namespace App\Controllers\Services;

use App\Models\Services\EquipoConectadosModel;

final class EquipoConectadosController
{
    private EquipoConectadosModel $model;

    public function __construct(EquipoConectadosModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $title = 'Equipo Conectados';
        $miembros = $this->model->miembros();

        require ROOT_PATH . '/app/Views/services/equipo-conectados.php';
    }
}