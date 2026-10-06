<?php

declare(strict_types=1);

namespace App\Models\Document;

use App\Core\BaseDocumentModel;

class DocumentModel extends BaseDocumentModel
{
    public function __construct(string $basePath)
    {
        parent::__construct($basePath);
        $this->documents = require $basePath . '/routes/documents.php';
    }
}
