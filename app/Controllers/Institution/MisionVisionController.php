<?php

declare(strict_types=1);

namespace App\Controllers\Institution;

use App\Models\Institution\MisionVisionModel;

final class MisionVisionController
{
    private MisionVisionModel $model;

    public function __construct(MisionVisionModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $title = 'Misión, Visión y Valores';
        $mission = $this->model->mission();
        $vision = $this->model->vision();
        $video = $this->model->video();
        $valores = $this->model->values();

        require ROOT_PATH . '/app/Views/institution/mision-vision.php';
    }
}