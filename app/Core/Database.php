<?php

declare(strict_types=1);

namespace App\Core;

use PDO;

/**
 * Conexión PDO compartida a superarse_db (credenciales SUPERARSE_DB_* del .env).
 */
final class Database
{
    private static ?PDO $pdo = null;

    public static function connection(): PDO
    {
        if (self::$pdo instanceof PDO) {
            return self::$pdo;
        }

        if (defined('ROOT_PATH')) {
            Env::load(ROOT_PATH . '/.env');
        }

        $dsn = sprintf(
            'mysql:host=%s;port=%d;dbname=%s;charset=utf8mb4',
            (string) Env::get('SUPERARSE_DB_HOST', '127.0.0.1'),
            (int) Env::get('SUPERARSE_DB_PORT', '3306'),
            (string) Env::get('SUPERARSE_DB_NAME', 'superarse_db')
        );

        self::$pdo = new PDO(
            $dsn,
            (string) Env::get('SUPERARSE_DB_USER', 'root'),
            (string) Env::get('SUPERARSE_DB_PASS', ''),
            [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET time_zone = '" . (string) Env::get('SUPERARSE_MYSQL_TZ', '-05:00') . "'",
            ]
        );

        return self::$pdo;
    }
}
