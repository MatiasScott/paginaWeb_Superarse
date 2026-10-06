<?php

declare(strict_types=1);

if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', dirname(__DIR__));
}

spl_autoload_register(function ($class) {
    $class = ltrim((string) $class, '\\');

    if (stripos($class, 'App\\') === 0) {
        $file = ROOT_PATH . '/app/' . str_replace('\\', '/', substr($class, 4)) . '.php';
        if (is_file($file)) {
            require_once $file;
            return;
        }
    }

    foreach (['Controllers', 'Models', 'Core'] as $dir) {
        $file = ROOT_PATH . "/app/{$dir}/{$class}.php";
        if (is_file($file)) {
            require_once $file;
            return;
        }
    }
});

\App\Core\Config::boot(ROOT_PATH);
require_once ROOT_PATH . '/app/Core/helpers.php';

$router = new \App\Core\Router(require ROOT_PATH . '/routes/web.php');
if ($router->dispatch($router->requestPath())) {
    return;
}

http_response_code(404);
$pageTitle = '404 - Página no encontrada';
require ROOT_PATH . '/app/Views/errors/404.php';
