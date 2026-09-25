<?php

declare(strict_types=1);

namespace App\Controllers\Institution;

use App\Models\Institution\ArancelesModel;

final class ArancelesController
{
    private ArancelesModel $model;

    public function __construct(ArancelesModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $kicker = $this->model->kicker();
        $title = $this->model->title();

        // arancel_url por tarjeta
        $aranceles = $this->model->aranceles();

        require ROOT_PATH . '/app/Views/institution/aranceles.php';
    }
}