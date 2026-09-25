<?php

declare(strict_types=1);

namespace App\Models\Institution;

final class MisionVisionModel
{
    private const MISSION = 'Somos un Instituto Tecnológico comprometido con la calidad en docencia, investigación y vinculación, enfocado en el desarrollo integral de nuestros estudiantes, mediante una educación de excelencia, experiencias formativas prácticas y el fortalecimiento de las habilidades blandas, las cuales desarrollan profesionales líderes emprendedores e innovadores, con sólidos principios y valores, preparados para enfrentar los desafíos del mundo laboral y contribuir positivamente a la sociedad y al desarrollo sostenible.';

    private const VISION = 'Para el 2028, el Instituto Superior Tecnológico Superarse será una institución de educación superior consolidada, reconocida a nivel nacional e internacional, referente en la formación de profesionales en el ámbito técnico, tecnológico y tecnológico universitario, con procesos innovadores en la docencia, investigación y vinculación, con infraestructura física y tecnológica de vanguardia, que aporte a la sociedad y al desarrollo sostenible del país.';

    public function mission(): string
    {
        return self::MISSION;
    }

    public function vision(): string
    {
        return self::VISION;
    }

    public function video(): string
    {
        return asset('assets/videos/Mision, Vision y Valores Institucionales-VersionLigera.mp4');
    }

    /**
     * Valores institucionales.
     *
     * @return array<int, array{nombre: string, texto: string, icono: string}>
     */
    public function values(): array
    {
        return [
            [
                'nombre' => 'Proactividad',
                'texto' => 'Valoramos la capacidad de anticiparse a las necesidades, problemas y oportunidades, tomando la iniciativa para mejorar continuamente la organización e investigación.',
                'icono' => 'fas fa-bolt',
            ],
            [
                'nombre' => 'Ética y Compromiso',
                'texto' => 'Nos guiamos por principios éticos sólidos y un profundo compromiso con la excelencia educativa, fomentando integridad, honestidad y respeto.',
                'icono' => 'fas fa-handshake',
            ],
            [
                'nombre' => 'Calidad',
                'texto' => 'Nos comprometemos a ofrecer una educación de alta calidad que cumpla con los más altos estándares académicos y profesionales.',
                'icono' => 'fas fa-award',
            ],
            [
                'nombre' => 'Equidad e Inclusión',
                'texto' => 'Promovemos un entorno donde todos tienen igualdad de oportunidades para aprender y desarrollarse, valorando la diversidad de nuestra comunidad.',
                'icono' => 'fas fa-users',
            ],
            [
                'nombre' => 'Sostenibilidad',
                'texto' => 'Integramos prácticas que promuevan el equilibrio entre el crecimiento académico, la responsabilidad social y la protección del medio ambiente.',
                'icono' => 'fas fa-leaf',
            ],
        ];
    }
}