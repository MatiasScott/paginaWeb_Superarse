<?php

declare(strict_types=1);

namespace App\Models\Institution;

final class BalanceGeneralModel
{
    public function kicker(): string
    {
        return 'INFORMACIÓN FINANCIERA';
    }

    public function title(): string
    {
        return 'Balances Generales';
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
            'El Instituto Superior Tecnológico Superarse se compromete con la transparencia financiera, poniendo a disposición pública sus Balances Generales anuales.',
            'Estos documentos ofrecen una visión detallada de la salud económica de nuestra institución, reflejando de manera clara nuestros activos, pasivos y patrimonio siguiendo las normativas contables vigentes.',
            'Explore y descargue los documentos correspondientes a los últimos periodos fiscales utilizando el panel de la derecha.',
        ];
    }

    public function documentsHeading(): string
    {
        return 'Documentos de Balances';
    }

    public function documentsPrompt(): string
    {
        return 'Seleccione el año del Balance General que desea consultar:';
    }

    /**
     * @return array<int, array{year: int, file: string}>
     */
    public function balances(): array
    {
        return [
            ['year' => 2023, 'file' => '#'],
            ['year' => 2022, 'file' => '#'],
            ['year' => 2021, 'file' => '#'],
            ['year' => 2020, 'file' => '#'],
            ['year' => 2019, 'file' => '#'],
        ];
    }
}