<?php

declare(strict_types=1);

namespace App\Models\Institution;

final class CodigoEticaModel
{
    public function kicker(): string
    {
        return 'Nuestra Esencia';
    }

    public function title(): string
    {
        return 'Código de Ética';
    }

    public function youtubeId(): string
    {
        return '332fLkCX0-I';
    }

    public function normativesLabel(): string
    {
        return 'Nuestras Normativas';
    }

    /**
     * @return array<int, string>
     */
    public function introParagraphs(): array
    {
        return [
            'El Código Institucional del Instituto Superior Tecnológico Superarse es un compendio de principios y normas que regulan el comportamiento ético de nuestra comunidad académica.',
            'Este documento es fundamental para fomentar un ambiente de respeto, integridad y responsabilidad, asegurando que todas nuestras actividades se enmarquen dentro de los más altos estándares morales.',
            'Le invitamos a familiarizarse con este código, ya que su aplicación es esencial para el buen funcionamiento y la reputación de nuestra institución.',
        ];
    }

    public function documentHeading(): string
    {
        return 'Documento Normativo';
    }

    public function pdfUrl(): string
    {
        return asset('assets/docs/institucion/codigoEtica/codigoEtica_Superarse.pdf');
    }
}