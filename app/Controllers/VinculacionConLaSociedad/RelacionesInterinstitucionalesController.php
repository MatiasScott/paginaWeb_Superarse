<?php

declare(strict_types=1);

namespace App\Controllers\VinculacionConLaSociedad;

use App\Models\VinculacionConLaSociedad\RelacionesInterinstitucionalesModel;

final class RelacionesInterinstitucionalesController
{
    private RelacionesInterinstitucionalesModel $model;

    public function __construct(RelacionesInterinstitucionalesModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $kicker      = $this->model->kicker();
        $title       = $this->model->title();
        $carrusel    = $this->model->carrusel();
        $conveniosInstituciones = $this->model->conveniosInstituciones();
        $conveniosEmpresas      = $this->model->conveniosEmpresas();
        $conveniosRedes         = $this->model->conveniosRedes();

        require ROOT_PATH . '/app/Views/vinculacion-con-la-sociedad/relaciones-interinstitucionales.php';
    }
}