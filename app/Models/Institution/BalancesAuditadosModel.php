<?php

declare(strict_types=1);

namespace App\Models\Institution;

final class BalancesAuditadosModel
{
    public function kicker(): string
    {
        return 'Información Económica';
    }

    public function title(): string
    {
        return 'Nuestros Balances Auditados';
    }

    public function heroIcon(): string
    {
        return 'fas fa-file-invoice-dollar';
    }

    /**
     * @return array<int, string>
     */
    public function paragraphs(): array
    {
        return [
            'En el Instituto Superior Tecnológico Superarse, la transparencia y la rendición de cuentas son pilares fundamentales de nuestra gestión. Ponemos a disposición de la comunidad nuestros Balances Auditados.',
            'Estos balances son elaborados siguiendo estrictas normativas contables y son verificados por auditores externos, garantizando la fiabilidad e integridad de la información presentada sobre el manejo de los recursos.',
            'A continuación, puede consultar y descargar los balances auditados correspondientes a los años recientes utilizando el panel de la derecha.',
        ];
    }

    public function reportsHeading(): string
    {
        return 'Reportes Externos';
    }

    public function reportsPrompt(): string
    {
        return 'Haz clic en cada título para visualizar el balance auditado correspondiente:';
    }

    /**
     * @return array<int, array{year: int, file: string}>
     */
    public function balances(): array
    {
        return [
            ['year' => 2024, 'file' => '/bancesAuditados'],
            ['year' => 2023, 'file' => '#'],
            ['year' => 2022, 'file' => '#'],
            ['year' => 2021, 'file' => '#'],
            ['year' => 2020, 'file' => '#'],
            ['year' => 2019, 'file' => '#'],
        ];
    }

    public function note(): string
    {
        return 'Requiere un lector de archivos PDF para su visualización.';
    }
}