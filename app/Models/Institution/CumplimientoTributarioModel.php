<?php

declare(strict_types=1);

namespace App\Models\Institution;

final class CumplimientoTributarioModel
{
    public function kicker(): string
    {
        return 'MARCO NORMATIVO Y LEGAL';
    }

    public function title(): string
    {
        return 'Cumplimiento Tributario';
    }

    public function heroIcon(): string
    {
        return 'fas fa-balance-scale';
    }

    /**
     * @return array<int, string>
     */
    public function paragraphs(): array
    {
        return [
            'En el Instituto Superior Tecnológico Superarse, mantenemos un firme compromiso con la legalidad y la transparencia en todas nuestras operaciones, incluyendo el estricto cumplimiento de nuestras obligaciones tributarias y de seguridad social.',
            'Esta sección provee acceso a la documentación que certifica nuestro apego a las normativas del Servicio de Rentas Internas (SRI) y del Instituto Ecuatoriano de Seguridad Social (IESS).',
            'Publicamos estos documentos para asegurar que nuestra comunidad y el público en general puedan verificar la gestión responsable de nuestros compromisos fiscales y laborales.',
        ];
    }

    public function stampText(): string
    {
        return 'Entidad al día en obligaciones';
    }

    public function documentsHeading(): string
    {
        return 'Certificados Vigentes';
    }

    public function documentsPrompt(): string
    {
        return 'Haz clic en cada título para visualizar el documento correspondiente:';
    }

    /**
     * @return array<int, array{title: string, file: string}>
     */
    public function documents(): array
    {
        return [
            ['title' => 'CUMPLIMIENTO IESS', 'file' => '/IESS'],
            ['title' => 'CUMPLIMIENTO TRIBUTARIO', 'file' => '/CumplimientoTributario'],
        ];
    }

    public function note(): string
    {
        return 'Requiere un lector de archivos PDF para su visualización.';
    }
}