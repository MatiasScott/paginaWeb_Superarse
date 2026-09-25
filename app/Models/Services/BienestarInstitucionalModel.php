<?php

declare(strict_types=1);

namespace App\Models\Services;

final class BienestarInstitucionalModel
{
    public function titulo(): string
    {
        return 'Bienestar Estudiantil';
    }

    /**
     * @return array<int, string>
     */
    public function heroImagenes(): array
    {
        return [
            asset('assets/img/bienestarEstudiantil/principal/Carrusel1.png'),
            asset('assets/img/bienestarEstudiantil/principal/Carrusel2.jpeg'),
            asset('assets/img/bienestarEstudiantil/principal/Carrusel3.png'),
            asset('assets/img/bienestarEstudiantil/principal/Carrusel4.png'),
            asset('assets/img/bienestarEstudiantil/principal/Carrusel5.png'),
            asset('assets/img/bienestarEstudiantil/principal/Carrusel6.png'),
            asset('assets/img/bienestarEstudiantil/principal/Carrusel7.jpg'),
        ];
    }

    /**
     * @return array{email: array<int, string>, movil: string, horario: string}
     */
    public function heroContacto(): array
    {
        return [
            'email' => [
                'coordinacion.bienestar@superarse.edu.ec',
                'asistencia.bienestar@superarse.edu.ec',
                'becas@superarse.edu.ec',
            ],
            'movil' => '0998409293',
            'horario' => 'Lunes a viernes de 08:00 a 17:00',
        ];
    }

    public function whatsapp(): string
    {
        return 'https://wa.me/593998409293';
    }

    /**
     * Carruseles de la sección "Somos un espacio inclusivo".
     *
     * @return array<string, array<int, string>>
     */
    public function carruseles(): array
    {
        return [
            'lenguaSenas' => [
                asset('assets/img/bienestarEstudiantil/tallerDeLenguas/taller_lengua_sen1.jpg'),
                asset('assets/img/bienestarEstudiantil/tallerDeLenguas/taller_lengua_sen2.jpg'),
                asset('assets/img/bienestarEstudiantil/tallerDeLenguas/taller_lengua_sen3.jpg'),
                asset('assets/img/bienestarEstudiantil/tallerDeLenguas/taller_lengua_sen4.jpg'),
            ],
            'protocolo' => [
                asset('assets/img/bienestarEstudiantil/socializacion/psicopedagogico1.jpg'),
                asset('assets/img/bienestarEstudiantil/socializacion/psicopedagogico2.jpg'),
                asset('assets/img/bienestarEstudiantil/socializacion/psicopedagogico3.jpg'),
                asset('assets/img/bienestarEstudiantil/socializacion/psicopedagogico4.jpg'),
                asset('assets/img/bienestarEstudiantil/socializacion/psicopedagogico5.jpg'),
            ],
            'sensibilizacion' => [
                asset('assets/img/bienestarEstudiantil/sensibilizacion/scapd1.jpg'),
                asset('assets/img/bienestarEstudiantil/sensibilizacion/scapd2.jpg'),
                asset('assets/img/bienestarEstudiantil/sensibilizacion/scapd3.jpg'),
            ],
            'espacios' => [
                asset('assets/img/bienestarEstudiantil/espacio/espacc1.jpg'),
                asset('assets/img/bienestarEstudiantil/espacio/espacc2.jpg'),
                asset('assets/img/bienestarEstudiantil/espacio/espacc3.jpg'),
                asset('assets/img/bienestarEstudiantil/espacio/espacc4.jpg'),
            ],
            'senaletica' => [
                asset('assets/img/bienestarEstudiantil/braile/braile1.jpg'),
                asset('assets/img/bienestarEstudiantil/braile/braile2.jpg'),
                asset('assets/img/bienestarEstudiantil/braile/braile3.jpg'),
                asset('assets/img/bienestarEstudiantil/braile/braile4.jpg'),
            ],
            'intiRaymi' => [
                asset('assets/img/bienestarEstudiantil/IntiRaymi/IntiRaymi.png'),
                asset('assets/img/bienestarEstudiantil/IntiRaymi/IntiRaymi1.png'),
                asset('assets/img/bienestarEstudiantil/IntiRaymi/IntiRaymi2.png'),
                asset('assets/img/bienestarEstudiantil/IntiRaymi/IntiRaymi3.png'),
                asset('assets/img/bienestarEstudiantil/IntiRaymi/IntiRaymi4.png'),
                asset('assets/img/bienestarEstudiantil/IntiRaymi/IntiRaymi5.png'),
                asset('assets/img/bienestarEstudiantil/IntiRaymi/IntiRaymi6.png'),
            ],
        ];
    }
}