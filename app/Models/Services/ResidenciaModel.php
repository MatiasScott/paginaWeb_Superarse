<?php

declare(strict_types=1);

namespace App\Models\Services;

final class ResidenciaModel
{
    public function titulo(): string
    {
        return 'Residencia Estudiantil';
    }

    public function subtitulo(): string
    {
        return 'Tu hogar mientras alcanzas tus metas';
    }

    /**
     * @return array<int, array{imagen: string, alt: string, titulo: string, descripcion: string}>
     */
    public function carrusel(): array
    {
        return [
            [
                'imagen' => asset('assets/img/Residencia/residencia1.jpg'),
                'alt' => 'Habitaciones confortables',
                'titulo' => 'Camas Confortables y Descanso Garantizado',
                'descripcion' => 'Espacios acogedores acondicionados para asegurar un descanso reparador durante tu estancia académica.',
            ],
            [
                'imagen' => asset('assets/img/Residencia/residencia2.jpg'),
                'alt' => 'Habitaciones espaciosas y luminosas',
                'titulo' => 'Habitaciones Espaciosas y Luminosas',
                'descripcion' => 'Disfruta de luz natural y espacios versátiles con literas de diseño robusto, colchones cómodos y vista al exterior.',
            ],
            [
                'imagen' => asset('assets/img/Residencia/residencia3.jpg'),
                'alt' => 'Closet y almacenamiento amplio',
                'titulo' => 'Amplios Closets y Almacenamiento Personal',
                'descripcion' => 'Organiza tus pertenencias con tranquilidad gracias a closets integrados de gran capacidad, cajones y repisas.',
            ],
            [
                'imagen' => asset('assets/img/Residencia/residencia4.jpg'),
                'alt' => 'Ducha e instalaciones privadas',
                'titulo' => 'Ducha e Instalaciones Privadas',
                'descripcion' => 'Área de baño independiente con ducha privada, acabados limpios y privacidad absoluta en tu espacio.',
            ],
            [
                'imagen' => asset('assets/img/Residencia/residencia5.jpg'),
                'alt' => 'Lavamanos e higiene personal',
                'titulo' => 'Servicios e Higiene en la Habitación',
                'descripcion' => 'Espacios modernos equipados con lavamanos, espejo y dispensadores para tu mayor comodidad diaria.',
            ],
        ];
    }

    /**
     * @return array{checkIn: string, checkOut: string}
     */
    public function horarios(): array
    {
        return [
            'checkIn' => '3:00 p. m.',
            'checkOut' => '11:00 a. m.',
        ];
    }

    /**
     * @return array{email: string, info: string}
     */
    public function contacto(): array
    {
        return [
            'email' => 'matriculas@superarse.edu.ec',
            'info' => 'Consulta disponibilidad en recepción o administración del campus.',
        ];
    }

    /**
     * @return array<int, array{icono: string, titulo: string, descripcion: string}>
     */
    public function servicios(): array
    {
        return [
            [
                'icono' => 'fas fa-bath',
                'titulo' => 'Baño Privado',
                'descripcion' => 'Comodidad y privacidad garantizada en cada habitación.',
            ],
            [
                'icono' => 'fas fa-wifi',
                'titulo' => 'WiFi de Alta Velocidad',
                'descripcion' => 'Conexión rápida para tus clases, proyectos y entretenimiento.',
            ],
            [
                'icono' => 'fas fa-bed',
                'titulo' => 'Camas Confortables',
                'descripcion' => 'Espacios adecuados para asegurar tu descanso óptimo.',
            ],
            [
                'icono' => 'fas fa-shield-alt',
                'titulo' => 'Áreas Seguras y Monitoreadas',
                'descripcion' => 'Seguridad permanente para una estancia tranquila y confiable.',
            ],
            [
                'icono' => 'fas fa-laptop-house',
                'titulo' => 'Espacio de Coworking',
                'descripcion' => 'Área ideal para estudiar, realizar tareas, desarrollar proyectos o prepararte para el día siguiente.',
            ],
        ];
    }

    /**
     * @return array{titulo: string, texto: string}
     */
    public function cierre(): array
    {
        return [
            'titulo' => 'Comprometidos con tu Bienestar',
            'texto' => 'En Superarse entendemos que un buen descanso es fundamental para el aprendizaje. Por eso, hemos creado un entorno moderno y acogedor donde nuestros estudiantes pueden concentrarse en sus objetivos académicos mientras disfrutan de una experiencia de alojamiento cómoda y confiable.',
        ];
    }
}