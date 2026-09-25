<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Lector minimalista de archivos .env (sin dependencias externas).
 *
 * Soporta:
 *   CLAVE=valor
 *   CLAVE="valor con espacios"
 *   CLAVE='valor literal'
 *   export CLAVE=valor
 *   # comentario
 *
 * Los valores entre comillas se desenvuelven; los escapes \" \n \r \t \\ se
 * interpretan únicamente dentro de comillas dobles.
 */
final class Env
{
    /** @var array<string, string>|null */
    private static ?array $parsed = null;

    private static string $path = '';

    /**
     * Carga (una sola vez) el .env de la raíz del proyecto.
     */
    public static function load(string $filePath): void
    {
        if (self::$parsed !== null) {
            return;
        }

        self::$parsed = [];
        self::$path = $filePath;

        if (!is_file($filePath) || !is_readable($filePath)) {
            return;
        }

        $handle = fopen($filePath, 'rb');
        if ($handle === false) {
            return;
        }

        while (($line = fgets($handle)) !== false) {
            $line = trim($line);

            if ($line === '' || str_starts_with($line, '#')) {
                continue;
            }

            if (str_starts_with($line, 'export ')) {
                $line = trim(substr($line, 7));
            }

            $separator = strpos($line, '=');
            if ($separator === false) {
                continue;
            }

            $key = trim(substr($line, 0, $separator));
            if ($key === '' || !preg_match('/^[A-Za-z_][A-Za-z0-9_.]*$/', $key)) {
                continue;
            }

            self::$parsed[$key] = self::unquote(trim(substr($line, $separator + 1)));
        }

        fclose($handle);

        self::export();
    }

    /**
     * Publica lo leído en $_ENV / $_SERVER / getenv() para que el código
     * heredado que usa getenv('CLAVE') también obtenga los valores del .env.
     *
     * Nunca sobreescribe una variable que el servidor ya trae: si el hosting
     * define SUPERARSE_DB_PASS, ese valor gana sobre el del .env.
     */
    private static function export(): void
    {
        foreach (self::$parsed as $key => $value) {
            if (isset($_ENV[$key]) || isset($_SERVER[$key]) || getenv($key) !== false) {
                continue;
            }

            $_ENV[$key] = $value;
            $_SERVER[$key] = $value;
            putenv($key . '=' . $value);
        }
    }

    /**
     * Valor de una clave, o $default si no existe / está vacía.
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        $value = self::raw($key);

        if ($value === null || $value === '') {
            return $default;
        }

        return match (strtolower($value)) {
            'true', '(true)'   => true,
            'false', '(false)' => false,
            'null', '(null)'   => null,
            'empty', '(empty)' => '',
            default            => $value,
        };
    }

    /**
     * Valor crudo sin coerción de tipos.
     */
    public static function raw(string $key): ?string
    {
        // Las variables reales del servidor tienen prioridad sobre el .env
        $fromServer = $_ENV[$key] ?? $_SERVER[$key] ?? getenv($key);
        if (is_string($fromServer) && $fromServer !== '') {
            return $fromServer;
        }

        return self::$parsed[$key] ?? null;
    }

    public static function has(string $key): bool
    {
        $value = self::raw($key);

        return $value !== null && $value !== '';
    }

    public static function filePath(): string
    {
        return self::$path;
    }

    /**
     * @return array<string, string>
     */
    public static function all(): array
    {
        return self::$parsed ?? [];
    }

    private static function unquote(string $value): string
    {
        if (strlen($value) >= 2) {
            $first = $value[0];
            $last = $value[strlen($value) - 1];

            if ($first === $last && ($first === '"' || $first === "'")) {
                $inner = substr($value, 1, -1);

                return $first === '"'
                    ? strtr($inner, ['\\n' => "\n", '\\r' => "\r", '\\t' => "\t", '\\"' => '"', '\\\\' => '\\'])
                    : $inner;
            }
        }

        // Comentario al final de una línea sin comillas: CLAVE=valor # nota
        $hash = strpos($value, ' #');
        if ($hash !== false) {
            $value = rtrim(substr($value, 0, $hash));
        }

        return $value;
    }
}
