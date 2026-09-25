<?php

declare(strict_types=1);

namespace App\Models\VinculacionConLaSociedad;

final class PresenciaComunidadModel
{
    public function kicker(): string
    {
        return 'COMUNIDAD';
    }

    public function title(): string
    {
        return 'Presencia en la Comunidad';
    }

    /**
     * @return array<int, array{imagen: string, titulo: string, descripcion: string}>
     */
    public function carrusel(): array
    {
        return [
            [
                'imagen'      => asset('assets/img/PresenciaComunidad/PERROTON 4.jpg'),
                'titulo'      => 'Perrotón',
                'descripcion' => 'Hoy, jueves 12 de septiembre, Paula Granda, concejala del Municipio de Rumiñahui, visitó el Tecnológico Superarse para ultimar los detalles del evento Segunda Edición Perrotón Sangolquí 2024.',
            ],
            [
                'imagen'      => asset('assets/img/PresenciaComunidad/Feria del Maiz.png'),
                'titulo'      => 'Desfile del Maíz y el Turismo en Rumiñahui',
                'descripcion' => 'El sábado 23 de agosto del 2025 fuimos parte del espectacular Desfile del Maíz y el Turismo en Rumiñahui donde nuestros estudiantes demostraron su alegría y orgullo por nuestras raíces.',
            ],
            [
                'imagen'      => asset('assets/img/PresenciaComunidad/Reinado LLano Chico 2.jpeg'),
                'titulo'      => 'Elección de la Reina de Llano Chico 2025',
                'descripcion' => 'Estuvimos presentes en la Elección de la Reina de Llano Chico 2025, un evento organizado por el GAD parroquial.',
            ],
            [
                'imagen'      => asset('assets/img/PresenciaComunidad/SUMMER CAMP 2025 2.png'),
                'titulo'      => 'Summer Camp',
                'descripcion' => '¡Descubre, aprende y crece este verano con el Summer Camp del Instituto Superarse!',
            ],
            [
                'imagen'      => asset('assets/img/PresenciaComunidad/HOLSTEIN 1.jpg'),
                'titulo'      => 'Feria Holstein',
                'descripcion' => 'La Feria de Holstein fue un espacio lleno de aprendizaje, innovación y conexión entre la academia y el sector productivo.',
            ],
        ];
    }
}