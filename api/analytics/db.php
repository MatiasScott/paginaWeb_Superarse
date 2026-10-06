<?php

/**
 * Conexión PDO a MySQL - Analítica Superarse
 *
 * La configuración se lee del .env de la raíz del proyecto. Si el servidor no
 * tiene ese archivo, se usan los valores de respaldo de abajo para no romper
 * la instalación.
 */

declare(strict_types=1);

require_once __DIR__ . '/../../app/Core/Env.php';

\App\Core\Env::load(__DIR__ . '/../../.env');

/**
 * Valor de configuración: .env -> variable del servidor -> respaldo.
 */
function superarseSetting(string $clave, string $respaldo = ''): string
{
    $valor = \App\Core\Env::get($clave, $respaldo);

    return is_scalar($valor) ? (string) $valor : $respaldo;
}

$superarseDbHost = superarseSetting('SUPERARSE_DB_HOST', '127.0.0.1');
$superarseDbPort = (int) superarseSetting('SUPERARSE_DB_PORT', '3306');
$superarseDbName = superarseSetting('SUPERARSE_DB_NAME', 'superarse_db');
$superarseDbUser = superarseSetting('SUPERARSE_DB_USER', 'root');
$superarseDbPass = superarseSetting('SUPERARSE_DB_PASS', '');
$superarseDbTz   = superarseSetting('SUPERARSE_MYSQL_TZ', '-05:00');

// Zona horaria de Ecuador (tiempo continental, UTC-5 sin horario de verano)
date_default_timezone_set(superarseSetting('APP_TIMEZONE', 'America/Guayaquil'));

function superarseDb(): PDO
{
    static $pdo = null;

    if ($pdo instanceof PDO) {
        return $pdo;
    }

    $dsn = sprintf(
        'mysql:host=%s;port=%d;dbname=%s;charset=utf8mb4',
        $GLOBALS['superarseDbHost'],
        $GLOBALS['superarseDbPort'],
        $GLOBALS['superarseDbName']
    );

    $pdo = new PDO($dsn, $GLOBALS['superarseDbUser'], $GLOBALS['superarseDbPass'], [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
        // Fecha/hora de Ecuador en la sesión MySQL (TIMESTAMP se muestra en UTC-5)
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET time_zone = '" . $GLOBALS['superarseDbTz'] . "'",
    ]);

    return $pdo;
}
