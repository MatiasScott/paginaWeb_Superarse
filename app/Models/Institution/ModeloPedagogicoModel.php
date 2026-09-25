<?php

declare(strict_types=1);

namespace App\Models\Institution;

final class ModeloPedagogicoModel
{
    public function kicker(): string
    {
        return 'Nuestro Enfoque Educativo';
    }

    public function title(): string
    {
        return 'Modelo Pedagógico Tecnológico Superarse';
    }

    /**
     * @return array<int, string>
     */
    public function paragraphs(): array
    {
        return [
            'El Modelo Pedagógico del Instituto Superior Tecnológico Superarse es el pilar que guía nuestra enseñanza y aprendizaje. Alineado con nuestra visión educativa, integra la docencia de vanguardia, la investigación aplicada y la vinculación activa con la sociedad.',
            'Construido bajo la premisa de que el conocimiento es un proceso dinámico y en constante interacción, nuestro modelo considera los siguientes pilares clave para el éxito profesional:',
        ];
    }

    /**
     * @return array{heading: string, text: string, link: string, buttonText: string}
     */
    public function cta(): array
    {
        return [
            'heading' => 'Explora el Documento Completo',
            'text' => 'Para una comprensión más profunda de nuestra metodología y fundamentación teórica, descarga el documento oficial.',
            'link' => '/modeloPedagogico',
            'buttonText' => 'Ver Modelo Pedagógico (PDF)',
        ];
    }
}