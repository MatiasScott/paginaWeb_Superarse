<?php

declare(strict_types=1);

namespace App\Models\Institution;

final class PlanificacionPediModel
{
    public function kicker(): string
    {
        return 'GESTIÓN Y PROSPECTIVA';
    }

    public function title(): string
    {
        return 'Plan Estratégico de Desarrollo Institucional';
    }

    /**
     * @return array<int, string>
     */
    public function paragraphs(): array
    {
        return [
            'El Plan Estratégico de Desarrollo Institucional (PEDI) del Instituto Superior Tecnológico Superarse es el documento rector que define nuestra visión a largo plazo, los objetivos estratégicos y las líneas de acción que guiarán el crecimiento y la excelencia de nuestra institución. Este plan es el resultado de un análisis exhaustivo de nuestro entorno, nuestras fortalezas y las necesidades de la sociedad.',
            'El PEDI articula nuestra misión y visión con metas concretas en áreas clave como la calidad académica, la investigación, la vinculación con la sociedad, la gestión administrativa y el bienestar de nuestra comunidad. Sirve como una hoja de ruta para la toma de decisiones, la asignación de recursos y la evaluación de nuestro desempeño, asegurando que cada paso que damos esté alineado con nuestros propósitos fundamentales.',
            'Invitamos a toda nuestra comunidad y a los interesados a revisar este documento, que refleja nuestro compromiso con una educación superior de calidad y con el desarrollo integral de nuestros estudiantes y del país.',
        ];
    }

    /**
     * Pilares destacados del PEDI.
     *
     * @return array<int, array{icon: string, title: string, text: string}>
     */
    public function pillars(): array
    {
        return [
            ['icon' => 'fas fa-bullseye', 'title' => 'Propósito Rector', 'text' => 'Documento que define nuestra visión a largo plazo y la excelencia institucional.'],
            ['icon' => 'fas fa-microscope', 'title' => 'Áreas Clave', 'text' => 'Enfoque en calidad académica, investigación y vinculación con la sociedad.'],
            ['icon' => 'fas fa-users', 'title' => 'Comunidad', 'text' => 'Compromiso con el desarrollo integral de los estudiantes y el bienestar común.'],
        ];
    }

    /**
     * @return array{heading: string, text: string, link: string, buttonText: string, note: string}
     */
    public function cta(): array
    {
        return [
            'heading' => 'Plan Estratégico',
            'text' => 'Accede a nuestro Plan Estratégico de Desarrollo Institucional para conocer las bases de nuestro futuro.',
            'link' => '/PEDI',
            'buttonText' => 'Ver PEDI',
            'note' => 'Para visualizar este documento, necesitará un lector de archivos PDF.',
        ];
    }
}