<?php

declare(strict_types=1);

namespace App\Models\Page;

use App\Core\BasePageModel;

class InstitutionModel extends BasePageModel
{
    protected array $pages = [];

    public function documentPath(string $path): ?string
    {
        if ($path !== '/CalidadPlanificacion') {
            return null;
        }

        return $this->absolutePath('assets/docs/institucion/CalidadPlanificacion/Aval1.pdf');
    }
}

