<?php

declare(strict_types=1);

namespace App\Controllers\OfertaAcademica;

use App\Models\OfertaAcademica\EcsosModel;

final class EcsosController
{
    private EcsosModel $model;

    public function __construct(EcsosModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $kicker = $this->model->kicker();
        $title = $this->model->title();
        $schoolBadge = $this->model->schoolBadge();
        $schoolIcon = $this->model->schoolIcon();
        $logo = $this->model->logo();
        $careers = $this->model->careers();
        $schoolUrl = $this->model->schoolUrl();
        $contact = $this->model->contact();

        require ROOT_PATH . '/app/Views/oferta-academica/ecsos.php';
    }

    public function showCareer(string $slug): void
    {
        $career = $this->model->findCareer($slug);

        if ($career === null) {
            http_response_code(404);
            echo 'Carrera no encontrada';
            return;
        }

        require ROOT_PATH . '/app/Views/academic/career.php';
    }
}