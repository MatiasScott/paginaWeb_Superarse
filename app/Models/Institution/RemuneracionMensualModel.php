<?php

declare(strict_types=1);

namespace App\Models\Institution;

final class RemuneracionMensualModel
{
    public function kicker(): string
    {
        return 'TRANSPARENCIA INSTITUCIONAL';
    }

    public function title(): string
    {
        return 'Remuneración Mensual';
    }

    public function heroIcon(): string
    {
        return 'fas fa-money-check-alt';
    }

    /**
     * @return array<int, string>
     */
    public function paragraphs(): array
    {
        return [
            'En áreas de la transparencia y el cumplimiento de la normativa vigente, el Instituto Superior Tecnológico Superarse pone a disposición pública la información detallada sobre la remuneración mensual de sus servidores y servidoras. Este informe refleja la estructura salarial de nuestra institución, garantizando la claridad y el acceso a esta información por parte de la ciudadanía.',
            'Este documento es un compromiso con la ética y la gestión responsable de los recursos humanos, ofreciendo una visión clara de cómo se administran los fondos destinados a las remuneraciones, en consonancia con las políticas institucionales y las leyes aplicables.',
        ];
    }

    /**
     * @return array<int, array{icon: string, title: string, text: string}>
     */
    public function pillars(): array
    {
        return [
            ['icon' => 'fas fa-file-invoice', 'title' => 'Normativa', 'text' => 'Cumplimiento de la normativa vigente y acceso a la información pública.'],
            ['icon' => 'fas fa-users-cog', 'title' => 'Gestión Ética', 'text' => 'Compromiso con la ética y la gestión responsable de los recursos humanos.'],
            ['icon' => 'fas fa-eye', 'title' => 'Claridad', 'text' => 'Garantizamos la claridad en la estructura salarial institucional.'],
        ];
    }

    /**
     * @return array{heading: string, text: string, link: string, buttonText: string}
     */
    public function cta(): array
    {
        return [
            'heading' => 'Informe de Remuneración Mensual',
            'text' => 'Visualiza el documento oficial con el detalle de remuneraciones:',
            'link' => '/remuneracionMensual',
            'buttonText' => 'Ver PDF Oficial',
        ];
    }
}