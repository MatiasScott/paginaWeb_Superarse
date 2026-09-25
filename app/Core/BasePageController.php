<?php

declare(strict_types=1);

namespace App\Core;

abstract class BasePageController
{
    protected $model;
    protected string $notFoundMessage = 'Página no encontrada';
    protected string $viewNotFoundMessage = 'Vista no encontrada';

    public function __construct($model, string $viewFolder = '')
    {
        $this->model = $model;
    }

    public function show(string $path): void
    {
        $page = $this->model->find($path);

        if ($page === null) {
            http_response_code(404);
            echo $this->notFoundMessage;
            return;
        }

        // Soporta formato nuevo 'moduls/...' y legacy ['file'=>..., 'view'=>...]
        if (is_string($page)) {
            $file = $page;
        } elseif (is_array($page)) {
            $file = $page['file'] ?? '';
        } else {
            $file = '';
        }
        $legacyViewPath = $this->model->absolutePath($file);

        if (!is_file($legacyViewPath)) {
            http_response_code(404);
            echo $this->viewNotFoundMessage;
            return;
        }

        require dirname(__DIR__) . '/Views/pages/generic.php';
    }
}
