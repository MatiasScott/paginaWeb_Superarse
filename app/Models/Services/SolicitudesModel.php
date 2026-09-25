<?php

declare(strict_types=1);

namespace App\Models\Services;

final class SolicitudesModel
{
    public const EMAIL_DESTINO = 'matriculas@superarse.edu.ec';

    public const MAX_SIZE = 5 * 1024 * 1024;

    /**
     * @return array<string, string> slug => vista dentro de app/Views/solicitudes/
     */
    public function tipos(): array
    {
        return [
            'contrato'           => 'contrato.php',
            'reingreso'          => 'reingreso.php',
            'homologacion'       => 'homologacion.php',
            'cambio-malla'       => 'cambio-malla.php',
            'tercera-matricula'  => 'tercera-matricula.php',
            'cambio-carrera'     => 'cambio-carrera.php',
            'retiro-voluntario'  => 'retiro-voluntario.php',
        ];
    }

    public function emailDestino(): string
    {
        return self::EMAIL_DESTINO;
    }

    public function uploadDir(): string
    {
        return ROOT_PATH . '/uploads/solicitudes/';
    }

    public function autoloadPath(): string
    {
        return ROOT_PATH . '/vendor/autoload.php';
    }
}