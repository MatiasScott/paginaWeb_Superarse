<?php

declare(strict_types=1);

namespace App\Models\Institution;

final class OrganigramaModel
{
    public function kicker(): string
    {
        return 'ESTRUCTURA INTERNA';
    }

    public function title(): string
    {
        return 'Nuestro Organigrama Institucional';
    }

    /**
     * @return array<int, string>
     */
    public function introParagraphs(): array
    {
        return [
            'El organigrama del Instituto Superior Tecnológico Superarse ilustra nuestra estructura organizativa, delineando jerarquías, roles y responsabilidades. Este diagrama visual facilita la comprensión de cómo interactúan nuestros departamentos para asegurar una operación eficiente y coordinada.',
            'Diseñado para fomentar la transparencia y la comunicación, nuestro organigrama refleja la visión del Instituto Superarse de una gestión ágil y colaborativa. Cada componente está estratégicamente ubicado para optimizar la toma de decisiones y alinear esfuerzos con nuestros objetivos académicos.',
            'Te invitamos a explorar nuestro organigrama a continuación para conocer la distribución de nuestras funciones y cómo trabajamos juntos para ofrecer una educación de excelencia.',
        ];
    }

    public function pdfUrl(): string
    {
        return asset('assets/docs/institucion/organigrama/Organigrama_Superarse.pdf#toolbar=0&navpanes=0&scrollbar=0&view=FitH');
    }
}