<?php

declare(strict_types=1);

namespace App\Models\Institution;

final class EstatutoModel
{
    public function icon(): string
    {
        return 'fas fa-cubes';
    }

    public function kicker(): string
    {
        return 'MARCO LEGAL Y NORMATIVO';
    }

    public function title(): string
    {
        return 'Nuestros Estatutos Institucionales';
    }

    /**
     * @return array<int, string>
     */
    public function paragraphs(): array
    {
        return [
            'El Estatuto del Instituto Superior Tecnológico Superarse es el documento fundamental que rige nuestra vida institucional. En él se establecen los principios, objetivos, estructura organizativa, funciones, derechos y deberes de toda nuestra comunidad.',
            'Este estatuto es la base legal que asegura la coherencia, transparencia, equidad y buen gobierno en todas nuestras operaciones académicas y administrativas. Su cumplimiento garantiza nuestra misión de ofrecer una educación de calidad.',
            'Te invitamos a revisar nuestro Estatuto Institucional directamente a continuación para comprender el marco normativo que nos define y orienta.',
        ];
    }

    public function documentsHeading(): string
    {
        return 'Documento Oficial';
    }

    public function pdfUrl(): string
    {
        return asset('assets/docs/institucion/estatuto/Estatuto Institucional.pdf');
    }

    public function pdfPageLabel(): string
    {
        return 'Cargando...';
    }
}