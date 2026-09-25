<?php

declare(strict_types=1);

namespace App\Models\Institution;

final class RendicionCuentasModel
{
    public function kicker(): string
    {
        return 'TRANSPARENCIA INSTITUCIONAL';
    }

    public function title(): string
    {
        return 'Rendición de Cuentas';
    }

    public function titleUppercase(): bool
    {
        return true;
    }

    public function heroIcon(): string
    {
        return 'fas fa-hand-holding-heart';
    }

    /**
     * @return array<int, string>
     */
    public function paragraphs(): array
    {
        return [
            'En el Instituto Superior Tecnológico Superarse, la rendición de cuentas es un pilar fundamental de nuestra gestión. Cada año, presentamos un informe detallado sobre nuestras actividades, logros, y el cumplimiento de nuestros objetivos estratégicos, así como la gestión transparente de los recursos.',
            'Este proceso busca informar a la comunidad estudiantil, docentes y stakeholders sobre el uso eficiente de los recursos y los avances en nuestra misión de ofrecer educación de calidad. Invitamos a todos a revisar este documento para conocer a fondo nuestra labor y compromiso con la excelencia.',
        ];
    }

    /**
     * @return array{heading: string, text: string, link: string, buttonText: string}
     */
    public function cta(): array
    {
        return [
            'heading' => 'Documento Completo de Rendición de Cuentas',
            'text' => 'Visualiza el informe oficial de rendición de cuentas de nuestra institución:',
            'link' => '/rendicionCuentas',
            'buttonText' => 'Ver PDF',
        ];
    }
}