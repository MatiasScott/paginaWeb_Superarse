<?php

declare(strict_types=1);

namespace App\Controllers\Document;

use App\Models\Document\DocumentModel;

class DocumentController
{
    private $documents;

    public function __construct(DocumentModel $documents)
    {
        $this->documents = $documents;
    }

    public function show(string $path): void
    {
        $relative = $this->documents->find($path);

        if ($relative === null) {
            http_response_code(404);
            echo 'Documento no encontrado';
            return;
        }

        $absolute = $this->documents->absolutePath($relative);

        if (!is_file($absolute)) {
            http_response_code(404);
            echo 'Archivo no encontrado';
            return;
        }

        $mime = $this->documents->mimeType($absolute);
        header('Content-Type: ' . $mime);
        header('Content-Length: ' . filesize($absolute));
        // Inline para pdf, attachment para docx/xlsx lo maneja el navegador
        if ($mime === 'application/pdf') {
            header('Content-Disposition: inline; filename="' . basename($absolute) . '"');
        }
        readfile($absolute);
    }
}

