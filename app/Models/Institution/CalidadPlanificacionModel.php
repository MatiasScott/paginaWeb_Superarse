<?php

declare(strict_types=1);

namespace App\Models\Institution;

final class CalidadPlanificacionModel
{
    public function kicker(): string
    {
        return 'NUESTRO COMPROMISO';
    }

    /**
     * Título en líneas (se une con <br> en la vista).
     *
     * @return array<int, string>
     */
    public function titleLines(): array
    {
        return ['De', 'Aseguramiento de la Calidad y Planificación'];
    }

    /**
     * Tarjetas del contenido.
     *
     * @return array<int, array{
     *     icon: string,
     *     heading: string,
     *     paragraphs: array<int, string>,
     *     list: array<int, string>|null,
     *     media: array{type: string, src: string, alt: string, caption: string}
     * }>
     */
    public function sections(): array
    {
        return [
            [
                'icon' => 'fas fa-chart-line',
                'heading' => 'Modelo de Calidad y Planificación Estratégica',
                'paragraphs' => [
                    'El Modelo de Aseguramiento de la Calidad y Planificación Estratégica del Instituto Superarse se basa en la gestión por procesos, garantizando la mejora continua en todas las áreas. El PEDI (Plan Estratégico de Desarrollo Institucional) es el eje central que integra todas las iniciativas de desarrollo y mejora.',
                ],
                'list' => null,
                'media' => [
                    'type' => 'image',
                    'src' => asset('assets/img/institucion/calidadPlanificacion/pedi.jpg'),
                    'alt' => 'Diagrama del Modelo PEDI',
                    'caption' => 'Diagrama del Modelo PEDI',
                ],
            ],
            [
                'icon' => 'fas fa-project-diagram',
                'heading' => 'Gestión por Procesos Institucionales',
                'paragraphs' => [
                    'En el Tecnológico Superarse utilizamos la <strong>gestión por procesos</strong> a través de un sistema integral interrelacionado que incluye tres tipos de procesos:',
                ],
                'list' => [
                    '<strong>Procesos Gobernantes:</strong> Gestión Estratégica y de Calidad. Dirigen y supervisan el funcionamiento institucional asegurando la alineación con los objetivos estratégicos.',
                    '<strong>Procesos Sustantivos:</strong> Gestión de Docencia, Investigación, Desarrollo, Innovación y Vinculación con la Sociedad.',
                    '<strong>Procesos Adjetivos:</strong> Subprocesos que proveen apoyo logístico y operativo facilitando el funcionamiento eficiente de los demás procesos.',
                ],
                'media' => [
                    'type' => 'image',
                    'src' => asset('assets/img/institucion/calidadPlanificacion/mapaProcesos.jpg'),
                    'alt' => 'Mapa de Procesos Institucionales',
                    'caption' => 'Mapa de Procesos Institucionales',
                ],
            ],
            [
                'icon' => 'fas fa-sync-alt',
                'heading' => 'Proceso de Autoevaluación Continua',
                'paragraphs' => [
                    'En cumplimiento del Artículo 94 de la <strong>LOES</strong>, el Tecnológico Superarse desarrolla procesos de <strong>autoevaluación continua</strong> con la participación activa de toda la comunidad educativa.',
                    'Todos nuestros procesos internos cumplen con el <strong>ciclo PHVA (Planificar, Hacer, Verificar, Actuar)</strong>, reflejando nuestro compromiso constante con la mejora continua y la excelencia académica.',
                ],
                'list' => null,
                'media' => [
                    'type' => 'video',
                    'src' => asset('assets/videos/AUTOEVUACION_SUPERARSE_2024.mp4'),
                    'alt' => 'Video del Proceso de Autoevaluación',
                    'caption' => 'Video del Proceso de Autoevaluación',
                ],
            ],
        ];
    }

    /**
     * @return array{link: string, icon: string, title: string, text: string, buttonText: string}
     */
    public function autoevaluacionCard(): array
    {
        return [
            'link' => '/Autoevaluacion',
            'icon' => 'fas fa-file-pdf',
            'title' => 'Informe de Autoevaluación 2024',
            'text' => 'Consulta el documento oficial del proceso de autoevaluación institucional correspondiente al año 2024.',
            'buttonText' => 'Ver Documento',
        ];
    }

    public function pediFrameUrl(): string
    {
        return asset('assets/docs/institucion/CalidadPlanificacion/Aval1.pdf#toolbar=0&navpanes=0&view=FitW');
    }
}