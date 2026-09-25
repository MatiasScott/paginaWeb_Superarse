<?php

declare(strict_types=1);

namespace App\Models\Institution;

final class MensajeRectoraModel
{
    public function kicker(): string
    {
        return 'Un mensaje de Bienvenida';
    }

    public function title(): string
    {
        return 'Mensaje de Nuestra Rectora';
    }

    public function greeting(): string
    {
        return 'Querida comunidad SUPERARSE,';
    }

    /**
     * Párrafos de introducción de la tarjeta izquierda.
     *
     * @return array<int, string>
     */
    public function introParagraphs(): array
    {
        return [
            'Es un honor darles la más cordial bienvenida al Instituto Superior Tecnológico Superarse, un espacio donde el aprendizaje, la innovación y el compromiso con el conocimiento se combinan para forjar el futuro de nuestra sociedad.',
            'Reafirmamos nuestro compromiso con la excelencia en la docencia, la investigación y la vinculación con la sociedad.',
        ];
    }

    public function photo(): string
    {
        return asset('assets/img/institucion/mensajeRectora/mensajeRectora.jpg');
    }

    public function photoAlt(): string
    {
        return 'Msc. Verónica Tamayo';
    }

    /**
     * Párrafos de cierre de la tarjeta derecha.
     *
     * @return array<int, string>
     */
    public function closingParagraphs(): array
    {
        return [
            'Juntos, construiremos un entorno inclusivo y dinámico donde las ideas se cristalizan y se conviertan en acciones transformadoras. Con responsabilidad y creatividad, seguiremos superando los retos del mañana.',
            'Les doy nuevamente la bienvenida a esta gran comunidad, deseándoles un año lleno de aprendizajes, logros y satisfacciones profesionales.',
        ];
    }

    public function finalPhrase(): string
    {
        return 'Recuerda que siempre es tiempo de SUPERARSE.';
    }

    public function signatureName(): string
    {
        return 'Msc. Verónica Tamayo';
    }

    public function signatureRole(): string
    {
        return 'Rectora del Instituto Superarse';
    }
}