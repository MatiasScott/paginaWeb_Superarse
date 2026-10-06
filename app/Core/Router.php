<?php

declare(strict_types=1);

namespace App\Core;

use App\Controllers\Document\DocumentController;
use App\Models\Document\DocumentModel;

final class Router
{
    private array $definitions;

    public function __construct(array $definitions)
    {
        $this->definitions = $definitions;
    }

    public function requestPath(): string
    {
        $path = rawurldecode(explode('?', (string) ($_SERVER['REQUEST_URI'] ?? '/'), 2)[0]);
        $base = Config::basePath();
        if ($base !== '' && ($path === $base || str_starts_with($path, $base . '/'))) {
            $path = substr($path, strlen($base));
        }

        $path = trim($path, '/');
        // Compatibilidad con los enlaces antiguos al front controller.
        if (in_array($path, ['index.php', 'public/index.php'], true)) {
            return trim((string) ($_GET['url'] ?? ''), '/');
        }

        return $path;
    }

    public function dispatch(string $path): bool
    {
        if ($path === '') {
            readfile(ROOT_PATH . '/index.html');
            return true;
        }

        $definition = $this->definitions['routes'][$path] ?? null;
        if ($definition === null && preg_match('#^(ECSOS|ECAVET|ECSET)/([a-zA-Z0-9][a-zA-Z0-9-]*)$#i', $path, $matches)) {
            $definition = $this->definitions['careers'][strtoupper($matches[1])];
            $definition['action'] = 'showCareer';
            $definition['arguments'] = [$matches[2]];
        }
        if ($definition === null && preg_match('#^Solicitudes/(contrato|reingreso|homologacion|cambio-malla|tercera-matricula|cambio-carrera|retiro-voluntario)$#i', $path, $matches)) {
            $definition = $this->definitions['routes']['Solicitudes/' . strtolower($matches[1])];
        }

        if ($definition !== null) {
            $controller = $definition['controller'];
            $model = $definition['model'];
            $action = $definition['action'];
            (new $controller(new $model()))->$action(...$definition['arguments']);
            return true;
        }

        $documents = new DocumentModel(ROOT_PATH);
        if ($documents->find('/' . $path) !== null) {
            (new DocumentController($documents))->show('/' . $path);
            return true;
        }

        return false;
    }
}
