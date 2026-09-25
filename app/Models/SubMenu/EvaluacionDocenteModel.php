<?php

declare(strict_types=1);

namespace App\Models\SubMenu;

final class EvaluacionDocenteModel
{
    public function kicker(): string
    {
        return 'DOCENTES';
    }

    public function title(): string
    {
        return 'Evaluación Docente';
    }

    /**
     * @return array<int, array{id: string, etiqueta: string, aria: string}>
     */
    public function tabs(): array
    {
        return [
            ['id' => 'trabaja',      'etiqueta' => 'Evaluación Docente',        'aria' => 'list-trabaja'],
            ['id' => 'concurso',     'etiqueta' => 'Reglamento de evaluación',  'aria' => 'list-concurso'],
            ['id' => 'convocatoria', 'etiqueta' => 'Procedimiento de evaluación', 'aria' => 'list-convocatoria'],
            ['id' => 'mejores',      'etiqueta' => 'Mejores Evaluados',         'aria' => 'list-mejores'],
        ];
    }

    /**
     * @return array<int, array{encabezado: string, items: array<int, array{label: string, pdfSrc: string, canvasId: string}>}>
     */
    public function pdfGruposReglamento(): array
    {
        return [
            [
                'encabezado' => 'Reglamento de Evaluación',
                'items' => [
                    [
                        'label'    => 'Reglamento',
                        'pdfSrc'   => asset('assets/docs/EvaluacionDocente/REGLAMENTO.pdf'),
                        'canvasId' => 'pdf-viewer-concurso',
                    ],
                ],
            ],
        ];
    }

    /**
     * @return array<int, array{encabezado: string, items: array<int, array{label: string, pdfSrc: string, canvasId: string}>}>
     */
    public function pdfGruposProcedimiento(): array
    {
        return [
            [
                'encabezado' => 'Procedimiento de evaluación',
                'items' => [
                    [
                        'label'    => 'Procedimiento de Evaluación<br>y actividades de docencia',
                        'pdfSrc'   => asset('assets/docs/EvaluacionDocente/PROCEDIMIENTO.pdf'),
                        'canvasId' => 'pdf-viewer-igualdad',
                    ],
                ],
            ],
        ];
    }

    /**
     * @return array<int, array{
     *   id: string,
     *   periodo: string,
     *   docentes: array<int, array{thumb: string, large: string, nombre: string, size: int}>
     * }>
     */
    public function periodos(): array
    {
        $base = asset('assets/img/bienestarEstudiantil/mejoresEvaluados/');

        return [
            [
                'id'      => 'content-mejores-evaluados',
                'periodo' => 'Periodo Noviembre 2023 - Abril 2024',
                'docentes' => [
                    [
                        'thumb'  => "{$base}PeriodoNoviembre2023-Abril2024/Mejor Evaluado Noviembre2023-Abril2024.jpg",
                        'large'  => "{$base}PeriodoNoviembre2023-Abril2024/Mejor Evaluado Noviembre2023-Abril2024.jpg",
                        'nombre' => 'SANTIAGO PUCHA',
                        'size'   => 150,
                    ],
                    [
                        'thumb'  => "{$base}PeriodoNoviembre2023-Abril2024/Mejor Evaluada Noviembre2023-Abril2024.jpg",
                        'large'  => "{$base}PeriodoNoviembre2023-Abril2024/Mejor Evaluada Noviembre2023-Abril2024.jpg",
                        'nombre' => 'SOFÍA ASTUDILLO',
                        'size'   => 150,
                    ],
                    [
                        'thumb'  => "{$base}PeriodoNoviembre2023-Abril2024/Mejor Evaluado N2023-A2024.jpg",
                        'large'  => "{$base}PeriodoNoviembre2023-Abril2024/Mejor Evaluado N2023-A2024.jpg",
                        'nombre' => 'LUIS TOSCANO',
                        'size'   => 150,
                    ],
                    [
                        'thumb'  => "{$base}PeriodoNoviembre2023-Abril2024/mejor Evaluada N2023-A2024.jpg",
                        'large'  => "{$base}PeriodoNoviembre2023-Abril2024/mejor Evaluada N2023-A2024.jpg",
                        'nombre' => 'KARLA NOVOA',
                        'size'   => 150,
                    ],
                ],
            ],
            [
                'id'      => 'content-mejores-evaluadosP',
                'periodo' => 'Periodo Mayo 2024 - Octubre 2024',
                'docentes' => [
                    [
                        'thumb'  => "{$base}ESTEBAN_TORRES.jpg",
                        'large'  => "{$base}ESTEBAN02.jpg",
                        'nombre' => 'ESTEBAN TORRES',
                        'size'   => 100,
                    ],
                    [
                        'thumb'  => "{$base}IVANYANEZ.jpg",
                        'large'  => "{$base}IVAN02.jpg",
                        'nombre' => 'IVÁN YÁNEZ',
                        'size'   => 100,
                    ],
                    [
                        'thumb'  => "{$base}KARINAFABARA.jpg",
                        'large'  => "{$base}KARINA02.jpg",
                        'nombre' => 'KARINA FABARA',
                        'size'   => 100,
                    ],
                    [
                        'thumb'  => "{$base}DENNYSENRIQUEZ.jpg",
                        'large'  => "{$base}Eriquez02.jpg",
                        'nombre' => 'DENNYS ENRIQUEZ',
                        'size'   => 100,
                    ],
                ],
            ],
            [
                'id'      => 'content-mejores-evaluadosX',
                'periodo' => 'Periodo Noviembre 2024 - Abril 2025',
                'docentes' => [
                    [
                        'thumb'  => "{$base}PeridosNoviembre2024-Abril2025/MejorEvaluado1.jpg",
                        'large'  => "{$base}PeridosNoviembre2024-Abril2025/MejorEvaluado1.jpg",
                        'nombre' => 'CRISTIAN LEÓN',
                        'size'   => 115,
                    ],
                    [
                        'thumb'  => "{$base}PeridosNoviembre2024-Abril2025/MejorEvaluado2.jpg",
                        'large'  => "{$base}PeridosNoviembre2024-Abril2025/MejorEvaluado2.jpg",
                        'nombre' => 'DAVID SERRANO',
                        'size'   => 115,
                    ],
                    [
                        'thumb'  => "{$base}PeridosNoviembre2024-Abril2025/MejorEvaluado3.jpg",
                        'large'  => "{$base}PeridosNoviembre2024-Abril2025/MejorEvaluado3.jpg",
                        'nombre' => 'VICTOR NAVARRO',
                        'size'   => 115,
                    ],
                    [
                        'thumb'  => "{$base}PeridosNoviembre2024-Abril2025/MejorEvaluado4.jpg",
                        'large'  => "{$base}PeridosNoviembre2024-Abril2025/MejorEvaluado4.jpg",
                        'nombre' => 'BELEN GUERRO',
                        'size'   => 115,
                    ],
                    [
                        'thumb'  => "{$base}PeridosNoviembre2024-Abril2025/MejorEvaluado5.jpg",
                        'large'  => "{$base}PeridosNoviembre2024-Abril2025/MejorEvaluado5.jpg",
                        'nombre' => 'DIEGO MARTINEZ',
                        'size'   => 115,
                    ],
                ],
            ],
        ];
    }
}