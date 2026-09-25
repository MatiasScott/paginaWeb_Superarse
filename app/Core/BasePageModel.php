<?php

declare(strict_types=1);

namespace App\Core;

abstract class BasePageModel
{
    protected string $basePath;
    protected array $pages = [];

    public function __construct(string $basePath)
    {
        $this->basePath = $basePath;
    }

    public function find(string $path): mixed
    {
        return $this->pages[$path] ?? null;
    }

    public function absolutePath(string $relativePath): string
    {
        return $this->basePath . DIRECTORY_SEPARATOR . ltrim($relativePath, '/\\');
    }
}
