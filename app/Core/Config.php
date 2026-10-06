<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Fuente única de verdad de la configuración del sitio.
 *
 * Para desplegar en producción basta con editar el archivo .env de la raíz
 * y poner la URL allí. Si APP_URL / APP_BASE_PATH no están definidos (o se
 * dejan como "auto"), la ruta se detecta sola comparando ROOT_PATH contra
 * DOCUMENT_ROOT, de modo que el proyecto funciona sin configurar nada.
 *
 * Uso típico dentro de las vistas y modelos:
 *     asset('img/logo.png')        -> /PaginaWebMVC/img/logo.png
 *     route('ECSOS')                -> /PaginaWebMVC/ECSOS
 *     url('assets/docs/x.pdf')      -> /PaginaWebMVC/assets/docs/x.pdf
 *     absolute('ECSOS')             -> https://superarse.edu.ec/PaginaWebMVC/ECSOS
 *
 * Los valores que ya son URL externas (http://, https://, mailto:, wa.me),
 * anclas (#) o query strings (?text=...) se devuelven intactos.
 */
final class Config
{
    private static bool $booted = false;

    private static string $basePath = '';

    private static string $origin = '';

    private static string $env = 'production';

    /**
     * Inicializa la configuración. Es idempotente: solo la primera llamada tiene efecto.
     */
    public static function boot(?string $rootPath = null): void
    {
        if (self::$booted) {
            return;
        }

        self::$booted = true;

        if (!defined('ROOT_PATH')) {
            define('ROOT_PATH', $rootPath ?? dirname(__DIR__, 2));
        }

        Env::load(ROOT_PATH . '/.env');

        self::$env = (string) (Env::get('APP_ENV', 'production'));

        [$configuredBase, $configuredOrigin] = self::readAppUrl();

        $explicitBase = Env::raw('APP_BASE_PATH');
        if ($explicitBase !== null && strtolower(trim($explicitBase)) !== 'auto') {
            self::$basePath = self::normalizeBasePath($explicitBase);
        } elseif ($configuredBase !== null) {
            self::$basePath = $configuredBase;
        } else {
            self::$basePath = self::detectBasePath();
        }

        self::$origin = $configuredOrigin ?? self::detectOrigin();
    }

    // ── Lectura de configuración ───────────────────────────────────────

    public static function get(string $key, mixed $default = null): mixed
    {
        self::boot();

        return Env::get($key, $default);
    }

    public static function env(): string
    {
        self::boot();

        return self::$env;
    }

    public static function isDebug(): bool
    {
        return (bool) self::get('APP_DEBUG', false);
    }

    // ── Rutas y URLs ───────────────────────────────────────────────────

    /**
     * Prefijo de la aplicación: '' en la raíz del dominio, '/PaginaWebMVC' en una subcarpeta.
     */
    public static function basePath(): string
    {
        self::boot();

        return self::$basePath;
    }

    /**
     * Esquema + host, sin barra final. Ej: https://superarse.edu.ec
     */
    public static function origin(): string
    {
        self::boot();

        return self::$origin;
    }

    /**
     * Ruta absoluta dentro del sitio (con prefijo). Acepta y preserva URLs externas.
     */
    public static function url(string $path = ''): string
    {
        self::boot();

        if ($path === '') {
            return self::$basePath === '' ? '/' : self::$basePath . '/';
        }

        if (self::isExternal($path)) {
            return $path;
        }

        // Evita duplicar el prefijo si el valor ya lo incluye
        if (self::$basePath !== '' && ($path === self::$basePath || str_starts_with($path, self::$basePath . '/'))) {
            return $path;
        }

        return self::$basePath . '/' . ltrim($path, '/');
    }

    /**
     * Alias de url() para recursos estáticos (mismo comportamiento).
     */
    public static function asset(string $path = ''): string
    {
        return self::url($path);
    }

    /**
     * Alias de url() para rutas de navegación.
     */
    public static function route(string $path = ''): string
    {
        return self::url($path);
    }

    /**
     * URL completa con esquema y host. Útil para PDFs, correos y og:url.
     */
    public static function absolute(string $path = ''): string
    {
        if (self::isExternal($path)) {
            return $path;
        }

        return self::origin() . self::url($path);
    }

    /**
     * Configuración serializable para exponerla a JavaScript.
     *
     * @return array<string, string>
     */
    public static function toJsArray(): array
    {
        return [
            'env' => self::env(),
            'base' => self::basePath(),
            'origin' => self::origin(),
            'siteName' => (string) self::get('APP_NAME', 'Instituto Superarse'),
        ];
    }

    // ── Interno ────────────────────────────────────────────────────────

    /**
     * @return array{0: ?string, 1: ?string} [basePath, origin]
     */
    private static function readAppUrl(): array
    {
        $raw = Env::raw('APP_URL');
        if ($raw === null || trim($raw) === '' || strtolower(trim($raw)) === 'auto') {
            return [null, null];
        }

        $raw = rtrim(trim($raw), '/');

        // Solo la ruta: APP_URL=/PaginaWebMVC
        if (str_starts_with($raw, '/')) {
            return [self::normalizeBasePath($raw), null];
        }

        $parts = parse_url($raw);
        if ($parts === false || !isset($parts['host'])) {
            return [null, null];
        }

        $scheme = $parts['scheme'] ?? 'https';
        $origin = $scheme . '://' . $parts['host'];
        if (isset($parts['port'])) {
            $origin .= ':' . $parts['port'];
        }

        $base = self::normalizeBasePath($parts['path'] ?? '');

        return [$base, $origin];
    }

    private static function normalizeBasePath(string $base): string
    {
        $base = trim(str_replace('\\', '/', $base), '/ ');

        return $base === '' ? '' : '/' . $base;
    }

    /**
     * Detecta el prefijo comparando la raíz real del proyecto contra DOCUMENT_ROOT.
     */
    private static function detectBasePath(): string
    {
        $documentRoot = $_SERVER['DOCUMENT_ROOT'] ?? '';
        $root = realpath(ROOT_PATH);
        $documentRoot = is_string($documentRoot) && $documentRoot !== '' ? realpath($documentRoot) : false;

        if ($documentRoot !== false && $root !== false) {
            $root = str_replace('\\', '/', $root);
            $documentRoot = rtrim(str_replace('\\', '/', $documentRoot), '/');
            $comparisonRoot = DIRECTORY_SEPARATOR === '\\' ? strtolower($root) : $root;
            $comparisonDocumentRoot = DIRECTORY_SEPARATOR === '\\' ? strtolower($documentRoot) : $documentRoot;

            if ($comparisonRoot === $comparisonDocumentRoot) {
                return '';
            }

            if (str_starts_with($comparisonRoot . '/', $comparisonDocumentRoot . '/')) {
                return self::normalizeBasePath(substr($root, strlen($documentRoot)));
            }
        }

        // Respaldo: derivarlo de SCRIPT_NAME (/PaginaWebMVC/public/index.php)
        $scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
        if (is_string($scriptName) && $scriptName !== '') {
            $scriptName = str_replace('\\', '/', $scriptName);
            $scriptName = preg_replace('#/public/index\.php$#', '', $scriptName) ?? $scriptName;
            $scriptName = preg_replace('#/index\.php$#', '', $scriptName) ?? $scriptName;

            if (is_string($scriptName)) {
                return self::normalizeBasePath($scriptName);
            }
        }

        return '';
    }

    private static function detectOrigin(): string
    {
        $https = $_SERVER['HTTPS'] ?? '';
        $isHttps = $https !== '' && strtolower((string) $https) !== 'off';

        $forwardedProto = $_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '';
        if (is_string($forwardedProto) && $forwardedProto !== '') {
            $isHttps = strtolower(explode(',', $forwardedProto)[0]) === 'https';
        }

        $scheme = $isHttps ? 'https' : 'http';

        $host = $_SERVER['HTTP_X_FORWARDED_HOST'] ?? $_SERVER['HTTP_HOST'] ?? $_SERVER['SERVER_NAME'] ?? 'localhost';
        if (is_string($host) && $host !== '') {
            $host = trim(explode(',', $host)[0]);
        }

        return $scheme . '://' . $host;
    }

    /**
     * true si el valor ya es una URL absoluta, un ancla o un query string.
     */
    private static function isExternal(string $path): bool
    {
        if ($path === '') {
            return false;
        }

        if ($path[0] === '#' || $path[0] === '?') {
            return true;
        }

        // http://, https://, //cdn..., mailto:, tel:, data:, wa.me no relativo, etc.
        return (bool) preg_match('#^([a-z][a-z0-9+.\-]*:|//)#i', $path);
    }
}
