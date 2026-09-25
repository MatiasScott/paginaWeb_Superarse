<?php

declare(strict_types=1);

namespace App\Models\Institution;

final class NormativaModel
{
    public function icon(): string
    {
        return 'fas fa-gavel';
    }

    public function kicker(): string
    {
        return 'Marco Regulatorio Integral';
    }

    public function title(): string
    {
        return 'Nuestras Normativas Generales';
    }

    /**
     * @return array<int, string>
     */
    public function paragraphs(): array
    {
        return [
            'Las normativas generales del Instituto Superior Tecnológico Superarse son el pilar que complementa nuestros reglamentos y códigos específicos. Establecen los lineamientos fundamentales para la gestión institucional y la interacción de toda la comunidad.',
            'Este documento es esencial para asegurar la coherencia en la aplicación de nuestras políticas, promover la transparencia y garantizar que todas las operaciones y actividades del Tecnológico Superarse se desarrollen dentro de un marco legal y ético sólido.',
            'Le invitamos a consultar este documento clave para entender el contexto regulatorio que sustenta nuestro compromiso con la calidad y la excelencia.',
        ];
    }

    public function documentsHeading(): string
    {
        return 'Documento Normativo';
    }

    public function pdfUrl(): string
    {
        return asset('assets/docs/institucion/normativa/NORMATIVA DE SELECCION DEL PERSONAL ACADEMICO_Superarse.pdf');
    }

    public function pdfPageLabel(): string
    {
        return 'Página: 1 de ...';
    }
}