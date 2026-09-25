<?php

declare(strict_types=1);

namespace App\Models\Admisiones;

final class ProcesoAdmisionModel
{
    public function titulo(): string
    {
        return 'Proceso de Admisión';
    }

    public function cta(): string
    {
        return 'TU FUTURO NO ESPERA, INSCRÍBETE HOY';
    }

    public function pasos(): array
    {
        return [
            [
                'numero' => '1',
                'titulo' => 'Primer Paso',
                'texto' => 'Escoge la carrera en base a tu perfil vocacional',
                'imagen' => asset('assets/img/Admisiones/Procesodeadmision/02. PROCESO DE ADMISION-05.png'),
                'accion' => 'modal',
                'boton' => 'OFERTA ACADÉMICA',
                'modal' => [
                    'titulo' => 'Oferta Académica',
                    'imagenes' => [
                        asset('assets/img/Admisiones/Procesodeadmision/03.  POPUPS PROCESO ADMISION-01.png'),
                    ],
                    'texto' => '<p>¿Necesitas ayuda para elegir?</p><p>Contacta a un asesor de Admisiones</p>',
                    'whatsapp' => 'https://wa.me/593995901732?text=Hola,%20me%20gustaría%20más%20información%20sobre%20el%20proceso%20de%20matricula%20.',
                ],
            ],
            [
                'numero' => '2',
                'titulo' => 'Segundo Paso',
                'texto' => 'Realiza el pago de la primera cuota',
                'imagen' => asset('assets/img/Admisiones/Procesodeadmision/02. PROCESO DE ADMISION-06.png'),
                'accion' => 'modal',
                'boton' => 'CANALES DE PAGO',
                'modal' => [
                    'titulo' => 'Canales de Pago',
                    'imagenes' => [
                        asset('assets/img/Admisiones/Procesodeadmision/03.  POPUPS PROCESO ADMISION-02.png'),
                        asset('assets/img/Admisiones/Procesodeadmision/03.  POPUPS PROCESO ADMISION-03.png'),
                    ],
                    'texto' => null,
                    'whatsapp' => null,
                ],
            ],
            [
                'numero' => '3',
                'titulo' => 'Tercer Paso',
                'texto' => 'Llena el Contrato de Inscripción',
                'imagen' => asset('assets/img/Admisiones/Procesodeadmision/02. PROCESO DE ADMISION-07.png'),
                'accion' => 'enlace',
                'boton' => 'CONTRATO DE INSCRIPCIÓN',
                'enlace' => '/Solicitudes/contrato',
            ],
            [
                'numero' => '4',
                'titulo' => 'Cuarto Paso',
                'texto' => 'Enviar los Requisitos a tu Asesor',
                'imagen' => asset('assets/img/Admisiones/Procesodeadmision/02. PROCESO DE ADMISION-08.png'),
                'accion' => 'modal',
                'boton' => 'REQUISITOS',
                'modal' => [
                    'titulo' => 'Requisitos',
                    'imagenes' => [],
                    'texto' => "<h3 class='text-center'>Requisitos</h3><p class='text-left'>Asegúrate de enviar toda la documentación necesaria a tu asesor.</p>
                    <ul class='text-left'>
                        <li><i class='fas fa-user-graduate'></i> Título de bachiller: <a href='https://servicios.educacion.gob.ec/titulacion25-web/faces/paginas/consulta-titulos-refrendados.xhtml' target='_blank'>Min. Educación</a></li>
                        <li><i class='fas fa-id-card'></i> Copia de cédula y papeleta de votación.</li>
                        <li><i class='fas fa-camera'></i> 2 Fotos tamaño carnet.</li>
                        <li><i class='fas fa-tint'></i> Tipo de sangre (Licencia o carnet).</li>
                        <li><i class='fas fa-copy'></i> Copia de Servicio Básico.</li>
                    </ul>
                    <p class='text-left small'>*Si no dispones del registro en web, debes NOTARIZAR el acta o título físico.</p>",
                    'whatsapp' => null,
                ],
            ],
        ];
    }
}