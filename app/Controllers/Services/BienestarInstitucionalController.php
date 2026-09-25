<?php

declare(strict_types=1);

namespace App\Controllers\Services;

use App\Models\Services\BienestarInstitucionalModel;

final class BienestarInstitucionalController
{
    private BienestarInstitucionalModel $model;

    public function __construct(BienestarInstitucionalModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $title = 'Bienestar Estudiantil';
        $heroImagenes = $this->model->heroImagenes();
        $heroContacto = $this->model->heroContacto();
        $whatsapp = $this->model->whatsapp();
        $carruseles = $this->model->carruseles();

        require ROOT_PATH . '/app/Views/services/bienestar-institucional.php';
    }
}