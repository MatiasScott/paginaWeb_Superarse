<?php

declare(strict_types=1);

namespace App\Models\SubMenu;

final class ProcesosAcademicosModel
{
    public function kicker(): string
    {
        return 'PROCESOS DE ENSEÑANZA Y APRENDIZAJE';
    }

    public function title(): string
    {
        return 'Instituto Superarse';
    }

    /**
     * @return string URL del Genially con los procesos académicos.
     */
    public function geniallyUrl(): string
    {
        return 'https://view.genially.com/6894fb0739b91fc895bc5398';
    }

    /**
     * @return array<int, array{titulo: string, enlace: string}>
     */
    public function calendarios(): array
    {
        return [
            [
                'titulo' => 'CALENDARIO ACADÉMICO',
                'enlace' => '/CALENDARIO_ACADEMICO',
            ],
            [
                'titulo' => 'CALENDARIO DE TITULACIÓN',
                'enlace' => '/CALENDARIO_DE_TITULACION',
            ],
            [
                'titulo' => 'CALENDARIO DE INVESTIGACIÓN',
                'enlace' => '/CALENDARIO_INVESTIGACION',
            ],
            [
                'titulo' => 'CALENDARIO DE VINCULACIÓN',
                'enlace' => '/CALENDARIO_VINCULACION',
            ],
            [
                'titulo' => 'CALENDARIO DE PRÁCTICAS PREPROFESIONALES',
                'enlace' => '/CALENDARIO_PRACTICAS_PREPROFESIONALES',
            ],
        ];
    }
}