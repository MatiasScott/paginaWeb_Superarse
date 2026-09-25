<?php

declare(strict_types=1);

namespace App\Models\Services;

final class EquipoConectadosModel
{
    /**
     * @return array<int, array{nombre: string, cargo: string, imagen: string, whatsapp: string|null, correo: string}>
     */
    public function miembros(): array
    {
        return [
            [
                'nombre' => 'Elena Quezada',
                'cargo' => 'Vicerrectora Académica',
                'imagen' => asset('assets/img/contactos/docencia.jpeg'),
                'whatsapp' => 'https://wa.me/593983873798?text=Hola,%20me%20gustaría%20más%20información%20',
                'correo' => 'elena.quezada@superarse.edu.ec',
            ],
            [
                'nombre' => 'Carolina Baquero',
                'cargo' => 'Directora de Docencia',
                'imagen' => asset('assets/img/contactos/CONECTADOS-Carolina-Baquero.jpg'),
                'whatsapp' => 'https://wa.me/59399763911?text=Hola,%20me%20gustaría%20más%20información%20',
                'correo' => 'ingles@superarse.edu.ec',
            ],
            [
                'nombre' => 'Luis Granja',
                'cargo' => 'Coordinador de Admisiones',
                'imagen' => asset('assets/img/contactos/admision1.jpeg'),
                'whatsapp' => 'https://wa.me/593987289072?text=Hola,%20me%20gustaría%20más%20información%20',
                'correo' => 'luis.granja@superarse.edu.ec',
            ],
            [
                'nombre' => 'Mayra Segarra',
                'cargo' => 'Admisiones',
                'imagen' => asset('assets/img/contactos/admision2.jpeg'),
                'whatsapp' => 'https://wa.me/593992656109?text=Hola,%20me%20gustaría%20más%20información%20',
                'correo' => 'mayra.segarra@superarse.edu.ec',
            ],
            [
                'nombre' => 'Matías Valdivieso',
                'cargo' => 'Soporte Técnico · Coordinador de Tecnologías de la Información y Comunicaciones',
                'imagen' => asset('assets/img/contactos/tics.jpg'),
                'whatsapp' => 'https://wa.me/593983323477?text=Hola,%20me%20gustaría%20más%20información%20',
                'correo' => 'mesadeayuda@superarse.edu.ec',
            ],
            [
                'nombre' => 'Mariela Anchundia',
                'cargo' => 'Contabilidad-Finanzas-Cobranzas',
                'imagen' => asset('assets/img/contactos/Mariela_Ancundia.jpeg'),
                'whatsapp' => 'https://wa.me/593962962598?text=Hola,%20me%20gustaría%20más%20información%20',
                'correo' => 'mariela.anchundia@superarse.edu.ec',
            ],
            [
                'nombre' => 'Nicolás Ponce',
                'cargo' => 'Bienestar Estudiantil',
                'imagen' => asset('assets/img/contactos/NicolasP.jpg'),
                'whatsapp' => 'https://wa.me/593998409293?text=Hola,%20me%20gustaría%20más%20información%20',
                'correo' => 'coordinacion.bienestar@superarse.edu.ec',
            ],
            [
                'nombre' => 'Gabriel Morales',
                'cargo' => 'Proveedores',
                'imagen' => asset('assets/img/contactos/CONECTADOS-GabrielMorales.jpg'),
                'whatsapp' => null,
                'correo' => 'asistencia.contabilidad@superarse.edu.ec',
            ],
            [
                'nombre' => 'Edison Aucay',
                'cargo' => 'Director de Vinculación y Prácticas Preprofesionales',
                'imagen' => asset('assets/img/contactos/Edison-Aucay.png'),
                'whatsapp' => 'https://wa.me/593984001102?text=Hola,%20me%20gustaría%20más%20información%20',
                'correo' => 'practicas@superarse.edu.ec',
            ],
        ];
    }
}