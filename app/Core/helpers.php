<?php

declare(strict_types=1);

/**
 * Funciones globales de configuración.
 *
 * Se cargan automáticamente desde public/index.php, index.php raíz y los
 * scripts auxiliares, de modo que cualquier vista o modelo puede usarlas
 * sin imports.
 *
 *   base()                 -> '' o '/PaginaWebMVC'
 *   asset('img/logo.png')  -> '/PaginaWebMVC/img/logo.png'
 *   url('ECSOS')           -> '/PaginaWebMVC/ECSOS'
 *   route('ECSOS')         -> '/PaginaWebMVC/ECSOS'
 *   absolute('ECSOS')      -> 'https://superarse.edu.ec/PaginaWebMVC/ECSOS'
 *   env('APP_NAME')        -> valor del .env
 *   config('APP_NAME')     -> alias de env()
 */

// ── Arranque autónomo ────────────────────────────────────────────────
// Permite usar asset()/url() incluso si este archivo se carga sin pasar
// por public/index.php (vistas renderizadas directo, scripts auxiliares).
if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', dirname(__DIR__, 2));
}

if (!class_exists(App\Core\Config::class, false)) {
    require_once __DIR__ . '/Env.php';
    require_once __DIR__ . '/Config.php';
}

App\Core\Config::boot(ROOT_PATH);

if (!function_exists('base')) {
    function base(): string
    {
        return App\Core\Config::basePath();
    }
}

if (!function_exists('asset')) {
    function asset(string $path = ''): string
    {
        return App\Core\Config::asset($path);
    }
}

if (!function_exists('url')) {
    function url(string $path = ''): string
    {
        return App\Core\Config::url($path);
    }
}

if (!function_exists('route')) {
    function route(string $path = ''): string
    {
        return App\Core\Config::route($path);
    }
}

if (!function_exists('absolute')) {
    function absolute(string $path = ''): string
    {
        return App\Core\Config::absolute($path);
    }
}

if (!function_exists('origin')) {
    function origin(): string
    {
        return App\Core\Config::origin();
    }
}

if (!function_exists('env')) {
    function env(string $key, mixed $default = null): mixed
    {
        return App\Core\Config::get($key, $default);
    }
}

if (!function_exists('config')) {
    function config(string $key, mixed $default = null): mixed
    {
        return App\Core\Config::get($key, $default);
    }
}

if (!function_exists('app_config_script')) {
    /**
     * Inyecta la configuración en JavaScript. Colócalo antes de js/common/config.js.
     *
     * Produce: <script>window.SUPERARSE_CONFIG={...};</script>
     */
    function app_config_script(): string
    {
        $json = json_encode(
            App\Core\Config::toJsArray(),
            JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT
        );

        return '<script>window.SUPERARSE_CONFIG=' . ($json === false ? '{}' : $json) . ';</script>';
    }
}

