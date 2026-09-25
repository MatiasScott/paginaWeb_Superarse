<?php

declare(strict_types=1);

namespace App\Models\Plataformas;

final class PlataformasModel
{
    public function kicker(): string
    {
        return 'TODAS NUESTRAS';
    }

    public function title(): string
    {
        return 'Plataformas Instituto Superarse';
    }

    /**
     * @return array<int, array{enlace: string, imagen: string, alt: string}>
     */
    public function plataformas(): array
    {
        return [
            [
                'enlace' => 'https://site2.q10.com/login?ReturnUrl=%2F&aplentId=610f5afd-3e65-4c60-9932-bff02c235882',
                'imagen' => asset('assets/img/Plataformas/LogoQ10.png'),
                'alt'    => 'Q10',
            ],
            [
                'enlace' => 'https://teams.microsoft.com/v2/',
                'imagen' => asset('assets/img/Plataformas/Teams.jpg'),
                'alt'    => 'Teams',
            ],
            [
                'enlace' => 'https://outlook.office.com/mail/',
                'imagen' => asset('assets/img/Plataformas/OUTLOOK.png'),
                'alt'    => 'Outlook',
            ],
            [
                'enlace' => 'https://aulasists.superarse.edu.ec/',
                'imagen' => asset('assets/img/Plataformas/moodle.png'),
                'alt'    => 'Moodle',
            ],
            [
                'enlace' => 'https://m365.cloud.microsoft/?auth=2',
                'imagen' => asset('assets/img/Plataformas/office-365.png'),
                'alt'    => 'Office 365',
            ],
            [
                'enlace' => 'https://conectados.superarse.edu.ec',
                'imagen' => asset('assets/img/Plataformas/LogoConectadosConIconosDescriptores.jpg'),
                'alt'    => 'Superarse Conectados',
            ],
            [
                'enlace' => 'https://biblioteca.superarse.edu.ec',
                'imagen' => asset('assets/img/Plataformas/bibioteca-virtual.jpg'),
                'alt'    => 'Biblioteca',
            ],
        ];
    }
}