<?php

declare(strict_types=1);

namespace App\Models\Catalogos;

use App\Core\Database;
use Throwable;

/**
 * Periodos y programas (carreras) desde las tablas periodos_academicos y
 * programas_academicos (ver database/catalogos_academicos.sql).
 */
final class CatalogoAcademicoModel
{
    /**
     * Carreras activas para los formularios. Los programas que comparten
     * nombre_web (misma carrera en otra sede) aparecen una sola vez.
     *
     * @return list<string>
     */
    public function programas(): array
    {
        return $this->columna(
            "SELECT DISTINCT COALESCE(NULLIF(nombre_web, ''), nombre) AS nombre_mostrado
             FROM programas_academicos
             WHERE estado = 'Activo' AND visible_formularios = 1
             ORDER BY nombre_mostrado"
        );
    }

    /**
     * Nombres de los periodos activos habilitados para formularios (más reciente primero).
     *
     * @return list<string>
     */
    public function periodos(): array
    {
        return $this->columna(
            "SELECT nombre FROM periodos_academicos
             WHERE estado = 'Activo' AND visible_formularios = 1
             ORDER BY ordenamiento DESC"
        );
    }

    public function periodoActual(): ?string
    {
        $periodo = $this->columna(
            "SELECT nombre FROM periodos_academicos
             WHERE estado = 'Activo' AND es_actual = 1
             ORDER BY ordenamiento DESC
             LIMIT 1"
        );

        return $periodo[0] ?? null;
    }

    /**
     * @return list<string>
     */
    private function columna(string $sql): array
    {
        try {
            return array_map('strval', Database::connection()->query($sql)->fetchAll(\PDO::FETCH_COLUMN));
        } catch (Throwable $e) {
            error_log('[CatalogoAcademicoModel] ' . $e->getMessage());
            return [];
        }
    }
}
