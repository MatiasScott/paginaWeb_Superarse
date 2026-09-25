<?php

declare(strict_types=1);

namespace App\Models\Services;

final class FormatosModel
{
    /**
     * @return array<int, array{titulo: string, descripcion: string, icono: string, llenar: array{texto: string, url: string}|null, generar: array{texto: string, url: string}|null, subir: array{texto: string, tipo: string, url: string}|null}>
     */
    public function formatos(): array
    {
        $subir = static fn (string $tipo) => [
            'texto' => 'Subir',
            'tipo'  => $tipo,
            'url'   => '/Solicitudes/subir?tipo=' . rawurlencode($tipo),
        ];

        return [
            [
                'titulo' => 'Contrato de inscripción y matrícula',
                'descripcion' => 'Documento oficial para formalizar el proceso de inscripción y matrícula en la institución.',
                'icono' => 'fas fa-file-signature',
                'llenar' => null,
                'generar' => [
                    'texto' => 'Generar Contrato',
                    'url' => '/Solicitudes/contrato',
                ],
                'subir' => $subir('Contrato de inscripción y matrícula'),
            ],
            [
                'titulo' => 'Solicitud de Reingreso',
                'descripcion' => 'Permite solicitar el reingreso a la institución luego de un periodo de inactividad.',
                'icono' => 'fas fa-arrow-rotate-left',
                'llenar' => [
                    'texto' => 'Llenar Solicitud',
                    'url' => '/Solicitudes/reingreso',
                ],
                'generar' => null,
                'subir' => $subir('Solicitud de Reingreso'),
            ],
            [
                'titulo' => 'Solicitud de Homologación',
                'descripcion' => 'Solicitud para el reconocimiento de asignaturas aprobadas en otra institución.',
                'icono' => 'fas fa-file-circle-check',
                'llenar' => [
                    'texto' => 'Llenar Solicitud',
                    'url' => '/Solicitudes/homologacion',
                ],
                'generar' => null,
                'subir' => $subir('Solicitud de Homologación'),
            ],
            [
                'titulo' => 'Solicitud cambio de malla',
                'descripcion' => 'Solicitud para el cambio de malla curricular según la normativa académica vigente.',
                'icono' => 'fas fa-diagram-project',
                'llenar' => [
                    'texto' => 'Llenar Solicitud',
                    'url' => '/Solicitudes/cambio-malla',
                ],
                'generar' => null,
                'subir' => $subir('Solicitud cambio de malla'),
            ],
            [
                'titulo' => 'Solicitud de Tercera Matrícula',
                'descripcion' => 'Trámite para autorizar la tercera matrícula en una asignatura reprobada.',
                'icono' => 'fas fa-triangle-exclamation',
                'llenar' => [
                    'texto' => 'Llenar Solicitud',
                    'url' => '/Solicitudes/tercera-matricula',
                ],
                'generar' => null,
                'subir' => $subir('Solicitud de Tercera Matrícula'),
            ],
            [
                'titulo' => 'Solicitud cambio de carrera',
                'descripcion' => 'Permite solicitar el cambio de carrera dentro de la institución.',
                'icono' => 'fas fa-graduation-cap',
                'llenar' => [
                    'texto' => 'Llenar Solicitud',
                    'url' => '/Solicitudes/cambio-carrera',
                ],
                'generar' => null,
                'subir' => $subir('Solicitud cambio de carrera'),
            ],
            [
                'titulo' => 'Retiro Voluntario de Asignaturas',
                'descripcion' => 'Solicitud para retirar una o más asignaturas dentro del plazo establecido.',
                'icono' => 'fas fa-door-open',
                'llenar' => [
                    'texto' => 'Llenar Solicitud',
                    'url' => '/Solicitudes/retiro-voluntario',
                ],
                'generar' => null,
                'subir' => $subir('Retiro Voluntario de Asignaturas'),
            ],
        ];
    }
}