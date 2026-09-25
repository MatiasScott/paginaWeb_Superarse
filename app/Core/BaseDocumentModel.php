<?php

declare(strict_types=1);

namespace App\Core;

abstract class BaseDocumentModel
{
    protected string $basePath;
    protected array $documents = [];

    public function __construct(string $basePath)
    {
        $this->basePath = $basePath;
    }

    public function find(string $path): ?string
    {
        return $this->documents[$path] ?? null;
    }

    public function absolutePath(string $relativePath): string
    {
        return $this->basePath . DIRECTORY_SEPARATOR . ltrim($relativePath, '/\\');
    }

    public function mimeType(string $filePath): string
    {
        $ext = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
        return match ($ext) {
            'pdf' => 'application/pdf',
            'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            default => 'application/octet-stream',
        };
    }
}
