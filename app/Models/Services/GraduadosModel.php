<?php

declare(strict_types=1);

namespace App\Models\Services;

final class GraduadosModel
{
    public function titulo(): string
    {
        return 'Graduados';
    }

    public function subtitulo(): string
    {
        return 'Comunidad de exalumnos';
    }

    public function descripcion(): string
    {
        return 'Este espacio está orientado a mantener el vínculo con nuestros graduados, facilitar su actualización profesional y fortalecer la red de oportunidades académicas y laborales.';
    }

    /**
     * @return array<int, array{icono: string, titulo: string, descripcion: string, enlace: string}>
     */
    public function beneficios(): array
    {
        return [
            [
                'icono' => 'fas fa-briefcase',
                'titulo' => 'Bolsa de empleo',
                'descripcion' => 'Acceso a convocatorias laborales y pasantías compartidas por aliados institucionales.',
                'enlace' => 'https://forms.cloud.microsoft/r/ZW3eqsVBz9?origin=lprLink',
            ],
            [
                'icono' => 'fas fa-chalkboard-teacher',
                'titulo' => 'Capacitación continua',
                'descripcion' => 'Difusión de cursos, talleres y eventos de actualización académica y profesional.',
                'enlace' => 'https://eci.superarse.edu.ec/',
            ],
            [
                'icono' => 'fas fa-network-wired',
                'titulo' => 'Red de graduados',
                'descripcion' => 'Conexión con exalumnos para colaboración profesional, mentoría y networking.',
                'enlace' => 'https://forms.cloud.microsoft/pages/responsepage.aspx?id=Q55kP6NREkOuuxxVvxRacM1iUyNvm6NAt-AsANiElZxUN1FYVVJSWjNTS1BQVDE0TzhMQlJNMzhKNS4u&route=shorturl',
            ],
            [
                'icono' => 'fas fa-user-check',
                'titulo' => 'Seguimiento institucional',
                'descripcion' => 'Registro y actualización de trayectoria laboral para fortalecer la calidad educativa.',
                'enlace' => 'https://forms.cloud.microsoft/r/Ee17B7iWyG?origin=lprLink',
            ],
        ];
    }

    /**
     * @return array<int, string>
     */
    public function servicios(): array
    {
        return [
            'Actualización de datos de graduados',
            'Difusión de oportunidades laborales y académicas',
            'Participación en eventos y actividades institucionales',
            'Canal de comunicación para aportes y retroalimentación',
        ];
    }

    /**
     * @return array{titulo: string, descripcion: string, enlace: string, boton: string}
     */
    public function formulario(): array
    {
        return [
            'titulo' => 'Registro y actualización de graduados',
            'descripcion' => 'Completa el formulario oficial para mantener actualizada tu información.',
            'enlace' => 'https://forms.office.com/pages/responsepage.aspx?id=PXXLFwN_702XROHw7bSFdZeoiE5NT6BOo433qziuU4hUN085QjVYR0xCVklJNVkzMUU1NUdFTDJTWi4u&embed=true&route=shorturl',
            'boton' => 'Abrir formulario',
        ];
    }

    /**
     * @return array{correo: string, telefono: string, horario: string}
     */
    public function contacto(): array
    {
        return [
            'correo' => 'jenny.siza@superarse.edu.ec',
            'telefono' => '(02) 393-0980',
            'horario' => 'Lunes a viernes de 08:00 a 17:00',
        ];
    }

    /**
     * @return array<int, array{carrera: string, anios: array<int, int>}>
     */
    public function estadisticasCarreras(): array
    {
        return [
            ['carrera' => 'Asistencia Pedagógica', 'anios' => [2020 => 0, 2021 => 20, 2022 => 38, 2023 => 12, 2024 => 8, 2025 => 2]],
            ['carrera' => 'Educación Básica', 'anios' => [2020 => 0, 2021 => 0, 2022 => 0, 2023 => 0, 2024 => 0, 2025 => 85]],
            ['carrera' => 'Administración', 'anios' => [2020 => 55, 2021 => 22, 2022 => 50, 2023 => 45, 2024 => 68, 2025 => 24]],
            ['carrera' => 'Marketing Digital', 'anios' => [2020 => 0, 2021 => 1, 2022 => 27, 2023 => 22, 2024 => 36, 2025 => 79]],
            ['carrera' => 'Cuidado Canino', 'anios' => [2020 => 0, 2021 => 0, 2022 => 32, 2023 => 29, 2024 => 33, 2025 => 33]],
            ['carrera' => 'Producción Animal', 'anios' => [2020 => 0, 2021 => 0, 2022 => 49, 2023 => 24, 2024 => 18, 2025 => 11]],
            ['carrera' => 'Topografía', 'anios' => [2020 => 0, 2021 => 0, 2022 => 0, 2023 => 70, 2024 => 82, 2025 => 55]],
            ['carrera' => 'Seguridad y Prevención de Riesgos Laborales', 'anios' => [2020 => 0, 2021 => 0, 2022 => 0, 2023 => 0, 2024 => 0, 2025 => 4]],
            ['carrera' => 'Minería', 'anios' => [2020 => 0, 2021 => 0, 2022 => 0, 2023 => 0, 2024 => 0, 2025 => 33]],
        ];
    }

    /**
     * @return array<int, string>
     */
    public function ofertasLaboralesImagenes(): array
    {
        return [
            asset('assets/img/bienestarEstudiantil/OfertaTrabajo/Trabajo_J1.jpg'),
            asset('assets/img/bienestarEstudiantil/OfertaTrabajo/Trabajo_J2.jpeg'),
            asset('assets/img/bienestarEstudiantil/OfertaTrabajo/Trabajo_J3.jpg'),
            asset('assets/img/bienestarEstudiantil/OfertaTrabajo/Trabajo_J4.jpeg'),
        ];
    }
}