<?php

declare(strict_types=1);

namespace App\Models\Institution;

final class ModelosModel
{
    public function kicker(): string
    {
        return 'PILARES DE NUESTRO SISTEMA';
    }

    public function title(): string
    {
        return 'Nuestros Modelos Institucionales';
    }

    /**
     * @return array<int, string>
     */
    public function introParagraphs(): array
    {
        return [
            'En el Instituto Superior Tecnológico Superarse, la excelencia se basa en nuestros modelos estratégicos y operativos que guían nuestra labor profesional.',
            'Cada modelo ha sido cuidadosamente diseñado para optimizar procesos y responder efectivamente a las necesidades del contexto tecnológico actual.',
            'Explore los documentos haciendo clic en los títulos a continuación para visualizar la normativa y fundamentación de cada uno.',
        ];
    }

    public function documentsHeading(): string
    {
        return 'Documentos Estratégicos';
    }

    public function documentsPrompt(): string
    {
        return 'Seleccione un modelo para ver el documento:';
    }

    /**
     * Modelos documentales presentados en el acordeón.
     *
     * @return array<int, array{title: string, filePath: string}>
     */
    public function models(): array
    {
        return [
            ['title' => 'Modelo Aseguramiento de Calidad y Planificación', 'filePath' => asset('assets/docs/institucion/modelos/MODELO_ASEGURAMIENTO_CALIDAD_Y_PLANIFICACION_2024.pdf')],
            ['title' => 'Módulo Educativo 2024 Tecnológico Superarse', 'filePath' => asset('assets/docs/institucion/modelos/MODELO_EDUCATIVO_2024_ISTS.pdf')],
            ['title' => 'Modelo Tecnológico Superarse 2024', 'filePath' => asset('assets/docs/institucion/modelos/MODELO_TECNOLOGICO_SUPERARSE_2024.pdf')],
            ['title' => 'Modelo Pedagógico', 'filePath' => asset('assets/docs/institucion/modeloPedagogico/MODELO_PEDAGOGICO.pdf')],
        ];
    }
}