<?php

declare(strict_types=1);

namespace App\Models\Institution;

final class EstadoFinancieroModel
{
    public function kicker(): string
    {
        return 'TRANSPARENCIA INSTITUCIONAL';
    }

    public function title(): string
    {
        return 'Estado Financiero Institucional';
    }

    public function heroIcon(): string
    {
        return 'fas fa-university';
    }

    /**
     * @return array<int, string>
     */
    public function paragraphs(): array
    {
        return [
            'En el Instituto Superior Tecnológico Superarse, nos comprometemos con la transparencia y la rendición de cuentas. Ponemos a disposición de nuestra comunidad y del público en general el estado financiero detallado de nuestra institución. Este documento refleja la gestión económica y administrativa, garantizando la claridad en el uso de los recursos y la solidez de nuestras operaciones.',
            'Creemos firmemente que una gestión financiera clara es esencial para construir confianza y para el desarrollo sostenible de nuestra misión educativa. Este informe es una muestra de nuestro compromiso con la buena gobernanza y la optimización de los fondos para el beneficio de nuestros estudiantes.',
        ];
    }

    /**
     * @return array{heading: string, text: string, link: string, buttonText: string}
     */
    public function cta(): array
    {
        return [
            'heading' => 'Documento Completo del Estado Financiero',
            'text' => 'Visualiza el informe financiero oficial de nuestra institución:',
            'link' => '/estadoFinanciero',
            'buttonText' => 'Ver PDF',
        ];
    }
}