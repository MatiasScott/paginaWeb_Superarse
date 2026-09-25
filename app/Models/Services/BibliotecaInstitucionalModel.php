<?php

declare(strict_types=1);

namespace App\Models\Services;

final class BibliotecaInstitucionalModel
{
    /**
     * @return array{titulo: string, subtitulo: string, descripcion: string, imagen: string}
     */
    public function hero(): array
    {
        return [
            'titulo' => 'Biblioteca Institucional',
            'subtitulo' => 'Centro de Recursos para el Aprendizaje y la Investigación',
            'descripcion' => 'Accede a miles de recursos académicos, bases de datos internacionales y un equipo comprometido con tu formación.',
            'imagen' => asset('assets/img/content/biblioteca/hero-biblioteca.jpg'),
        ];
    }

    /**
     * @return array<int, array{icono: string, titulo: string, descripcion: string, color: string}>
     */
    public function servicios(): array
    {
        return [
            [
                'icono' => 'fas fa-book',
                'titulo' => 'Préstamo de Libros',
                'descripcion' => 'Solicita libros en sala de lectura o en préstamo externo con tu carné institucional.',
                'color' => '#0B77BD',
            ],
            [
                'icono' => 'fas fa-undo-alt',
                'titulo' => 'Devolución de Material',
                'descripcion' => 'Devuelve los libros prestados a tiempo para evitar suspensiones y mantener tu cuenta activa.',
                'color' => '#8bdf31',
            ],
            [
                'icono' => 'fas fa-search',
                'titulo' => 'Catálogo en Línea',
                'descripcion' => 'Consulta el catálogo bibliográfico y reserva materiales desde cualquier dispositivo.',
                'color' => '#fabd2e',
            ],
            [
                'icono' => 'fas fa-database',
                'titulo' => 'Bases de Datos',
                'descripcion' => 'Accede a plataformas académicas con miles de artículos, revistas y libros electrónicos.',
                'color' => '#17a2b8',
            ],
            [
                'icono' => 'fas fa-laptop',
                'titulo' => 'Sala de Lectura Virtual',
                'descripcion' => 'Encuentra un espacio tranquilo y equipado para estudiar, ya sea presencial o a través de nuestros recursos digitales.',
                'color' => '#ef7a15',
            ],
            [
                'icono' => 'fas fa-graduation-cap',
                'titulo' => 'Repositorio Institucional',
                'descripcion' => 'Consulta tesis, proyectos de titulación e investigaciones de la comunidad académica.',
                'color' => '#00394f',
            ],
            [
                'icono' => 'fas fa-print',
                'titulo' => 'Servicio de Impresión',
                'descripcion' => 'Imprime y escanea documentos académicos necesarios para tus actividades con costos accesibles.',
                'color' => '#0B77BD',
            ],
            [
                'icono' => 'fas fa-chalkboard-teacher',
                'titulo' => 'Orientación Bibliográfica',
                'descripcion' => 'Nuestro personal especializado te orienta en la búsqueda de fuentes académicas y elaboración de citas.',
                'color' => '#8bdf31',
            ],
        ];
    }

    /**
     * @return array<int, array{nombre: string, descripcion: string, url: string, icono: string, color: string}>
     */
    public function basesDeDatos(): array
    {
        return [
            [
                'nombre' => 'Biblioteca Dra. Mery Navas',
                'descripcion' => 'Biblioteca Física del Instituto Superarse.',
                'url' => 'https://biblioteca.superarse.ec/',
                'icono' => 'fas fa-book-open',
                'color' => '#003087',
            ],
        ];
    }

    /**
     * @return array<int, array{dia: string, horario: string}>
     */
    public function horarios(): array
    {
        return [
            ['dia' => 'Lunes – Viernes', 'horario' => '09:00 – 14:00'],
        ];
    }

    /**
     * @return array{ubicacion: string, telefono: string, email: string, responsable: string}
     */
    public function contacto(): array
    {
        return [
            'ubicacion' => 'Sede Matriz, Bloque B',
            'telefono' => '(02) 393-0980',
            'email' => 'nathaly.ortiz@superarse.edu.ec',
            'responsable' => 'Nathaly Ortiz - Coordinadora de Biblioteca',
        ];
    }

    /**
     * @return array{titulo: string, items: array<int, string>}
     */
    public function reglamento(): array
    {
        return [
            'titulo' => 'Reglamento de Uso',
            'items' => [
                'Presentar carné institucional vigente para el préstamo de libros.',
                'El préstamo externo es de 5 días hábiles renovable una sola vez.',
                'Prohibido ingresar con alimentos o bebidas al área de colección.',
                'Los equipos de cómputo son exclusivos para fines académicos.',
                'El usuario es responsable del material prestado hasta su devolución.',
            ],
        ];
    }
}