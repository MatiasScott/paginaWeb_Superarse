<?php

declare(strict_types=1);

namespace App\Controllers\Page;

use App\Core\BasePageController;
use App\Models\Page\InstitutionModel;

class InstitutionController extends BasePageController
{
    private $institution;

    public function __construct(InstitutionModel $institution)
    {
        $this->institution = $institution;
        parent::__construct($institution);
        $this->notFoundMessage = 'Página institucional no encontrada';
        $this->viewNotFoundMessage = 'Vista institucional no encontrada';
    }

    public function show(string $path): void
    {
        parent::show($path);
    }

    public function document(string $path): void
    {
        $documentPath = $this->institution->documentPath($path);

        if ($documentPath === null || !is_file($documentPath)) {
            http_response_code(404);
            echo 'Documento institucional no encontrado';
            return;
        }

        header('Content-Type: application/pdf');
        readfile($documentPath);
    }
}

