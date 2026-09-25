<?php

declare(strict_types=1);

namespace App\Models\VinculacionConLaSociedad;

final class VinculacionModel
{
    public function kicker(): string
    {
        return 'COMPROMISO SOCIAL';
    }

    public function title(): string
    {
        return 'Vinculación con la Sociedad';
    }

    /**
     * @return array<int, array{id: string, titulo: string, icono: string, contenidoHtml: string}>
     */
    public function areas(): array
    {
        return [
            [
                'id'            => 'equipoTrabajo',
                'titulo'        => 'Equipo de Trabajo de Vinculación',
                'icono'         => 'fa-users-cog',
                'contenidoHtml' => '
                    <div class="d-flex justify-content-center">
                        <div class="card-container">
                            <div class="flip-cardp" style="min-height: 450px; max-width: 400px;">
                                <div class="flip-cardp-inner">
                                    <div class="flip-cardp-front">
                                        <i class="fas fa-sync-alt flip-icon"></i>
                                        <img src="' . asset('assets/img/Vinculacion/07 - CONTACTO RELACIONES INSTITUCIONALES-01.png') . '" alt="Imagen Principal" width="100%" height="100%">
                                    </div>
                                    <div class="flip-cardp-back" style="background-color: #5069A1;">
                                        <div class="back-content">
                                            <div class="icon-section">
                                                <i class="fas fa-envelope icon"></i>
                                                <p class="style text-center">
                                                    <a href="mailto:vinculacion@superarse.edu.ec">vinculacion@superarse.edu.ec</a>
                                                </p>
                                            </div>
                                            <a href="https://wa.me/593983974688?text=Hola,%20me%20gustaría%20más%20información%20Sobre%20el%20tema%20de%20Vinculación" class="whatsapp-link">
                                                <div class="icon-section">
                                                    <i class="fas fa-mobile-alt icon"></i>
                                                    <p class="style text-center">0998409293</p>
                                                </div>
                                            </a>
                                            <i class="fas fa-sync-alt flip-icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-center mt-3 font-weight-bold">La Coordinación de Vinculación</p>
                        </div>
                    </div>
                ',
            ],
            [
                'id'            => 'modelodevinculacion',
                'titulo'        => 'Modelo de vinculación',
                'icono'         => 'fa-sitemap',
                'contenidoHtml' => '
                    <h4><strong>Modelo de Gestión: Investigación, Innovación y Vinculación con la Sociedad</strong></h4>
                    <p>
                        El Instituto Superior Tecnológico Superarse impulsa un modelo de gestión que articula 
                        de manera estratégica sus funciones sustantivas: Docencia, Investigación y Vinculación. 
                        Nuestro objetivo es aplicar el conocimiento para ofrecer soluciones concretas a los desafíos del entorno.
                    </p>
                    <h5><strong>¿Cómo lo logramos?</strong></h5>
                    <ul>
                        <li><strong>Integración Estratégica:</strong> Alineamos la docencia con las necesidades de investigación y las demandas de la sociedad. Este modelo responde directamente a nuestra misión institucional y a los objetivos del Plan Estratégico de Desarrollo Institucional (PEDI).</li><br>
                        <li><strong>Aplicación Práctica del Conocimiento:</strong> Fomentamos proyectos que transfieren innovación tecnológica y académica a los sectores productivos y sociales, generando un impacto medible.</li><br>
                        <li><strong>Desarrollo de Alianzas:</strong> Construimos y fortalecemos redes de colaboración con actores clave para potenciar el alcance de nuestras iniciativas y asegurar su pertinencia.</li>
                    </ul>
                    <div class="d-flex justify-content-center mt-4">
                        <a href="' . asset('Vinculacion') . '" target="_blank" class="btn btn-sm btn-info">
                            <i class="fa fa-file-pdf mr-2"></i> Modelo de gestión
                        </a>
                    </div>
                ',
            ],
            [
                'id'            => 'programasProyectos',
                'titulo'        => 'Programas y Proyectos de Vinculación',
                'icono'         => 'fa-tasks',
                'contenidoHtml' => '
                    <h4>Listado de Programas</h4>
                    <p>Accede a nuestros programas. El carrusel de muestras pasa automáticamente.</p>
                    <div class="main-image-container mb-3 text-center">
                            <img id="matematicas-main-img" src="' . asset('assets/img/Vinculacion/CARRUSEL 03 - VINCULACION-01.jpg') . '" alt="Portada del programa" style="max-width: 100%; height: 400px; object-fit: contain; border: 1px solid #ccc;">
                    </div>

                    <div class="form-group mb-3">
                        <label for="libroSelector"><strong>Selecciona un Programa para visualizar:</strong></label>
                        <select class="form-control mt-2" id="libroSelector" onchange="
                            document.querySelectorAll(\\\\\\\'.image-viewer\\\\\\\').forEach(viewer => viewer.style.display = \\\\\\\'none\\\\\\\');
                            const selectedViewerId = this.value;
                            if (selectedViewerId) {
                                document.getElementById(selectedViewerId).style.display = \\\\\\\'block\\\\\\\';
                            }
                        ">
                            <option value="">-- Elige un Programa --</option>
                            <option value="matematicas-viewer">INTEGRANIMAL</option>
                            <option value="publicidad-viewer">CUENTOS QUE CONECTAN</option>
                            <option value="reglamento-viewer">ECOHUELLA</option>
                        </select>
                    </div>

                    <div id="matematicas-viewer" class="image-viewer" style="display:none; margin-top: 15px;">
                        <h4>INTEGRANIMAL: De la investigación a la práctica comunitaria</h4>
                        <div class="main-image-container mb-3 text-center">
                            <img src="' . asset('assets/img/Vinculacion/IntegraAnimal/CARRUSEL 03 - VINCULACION-04.jpg') . '" alt="Portada Integra Animal" style="max-width: 100%; height: 400px; object-fit: contain; border: 1px solid #ccc;">
                        </div>
                        <div id="carouselIntegranimal" class="carousel slide" data-ride="carousel" data-interval="3000">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="d-flex justify-content-around">
                                        <img src="' . asset('assets/img/Vinculacion/IntegraAnimal/BIENESTAR 5.jpg') . '" alt="Muestra 1" class="img-thumbnail" style="width: 32%; height: 150px; object-fit: cover;">
                                        <img src="' . asset('assets/img/Vinculacion/IntegraAnimal/BIENESTAR 4.jpg') . '" alt="Muestra 2" class="img-thumbnail" style="width: 32%; height: 150px; object-fit: cover;">
                                        <img src="' . asset('assets/img/Vinculacion/IntegraAnimal/BIENESTAR 3.jpg') . '" alt="Muestra 3" class="img-thumbnail" style="width: 32%; height: 150px; object-fit: cover;">
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="d-flex justify-content-around">
                                        <img src="' . asset('assets/img/Vinculacion/IntegraAnimal/BIENESTAR ANIMAL2.jpg') . '" alt="Muestra 4" class="img-thumbnail" style="width: 48%; height: 150px; object-fit: cover;">
                                        <img src="' . asset('assets/img/Vinculacion/IntegraAnimal/BIENESTAR ANMIAL 1.jpg') . '" alt="Muestra 5" class="img-thumbnail" style="width: 48%; height: 150px; object-fit: cover;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="publicidad-viewer" class="image-viewer" style="display:none; margin-top: 15px;">
                        <h4>CUENTOS QUE CONECTAN: Fomento de la lectura</h4>
                        <div class="main-image-container mb-3 text-center">
                            <img src="' . asset('assets/img/Vinculacion/Cuentos/CARRUSEL 03 - VINCULACION-02.jpg') . '" alt="Portada Cuentos que Conectan" style="max-width: 100%; height: 400px; object-fit: contain; border: 1px solid #ccc;">
                        </div>
                        <div id="carouselCuentos" class="carousel slide" data-ride="carousel" data-interval="4000">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="d-flex justify-content-around">
                                        <img src="' . asset('assets/img/Vinculacion/Cuentos/Cuentos que conectan.jpeg') . '" alt="Muestra 1" class="img-thumbnail" style="width: 48%; height: 150px; object-fit: cover;">
                                        <img src="' . asset('assets/img/Vinculacion/Cuentos/CUENTOS 3.jpg') . '" alt="Muestra 2" class="img-thumbnail" style="width: 48%; height: 150px; object-fit: cover;">
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="d-flex justify-content-around">
                                        <img src="' . asset('assets/img/Vinculacion/Cuentos/Cuentos que conectan.jpeg') . '" alt="Muestra 3" class="img-thumbnail" style="width: 48%; height: 150px; object-fit: cover;">
                                        <img src="' . asset('assets/img/Vinculacion/Cuentos/CUENTOS 4.jpg') . '" alt="Muestra 4" class="img-thumbnail" style="width: 48%; height: 150px; object-fit: cover;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="reglamento-viewer" class="image-viewer" style="display:none; margin-top: 15px;">
                        <h4>ECOHUELLA: Herramienta de sostenibilidad</h4>
                        <div class="main-image-container mb-3 text-center">
                            <img src="' . asset('assets/img/Vinculacion/RSE/CARRUSEL 03 - VINCULACION-03.jpg') . '" alt="Portada Ecohuella" style="max-width: 100%; height: 400px; object-fit: contain; border: 1px solid #ccc;">
                        </div>
                        <div id="carouselEcohuella" class="carousel slide" data-ride="carousel" data-interval="4000">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="d-flex justify-content-around">
                                        <img src="' . asset('assets/img/Vinculacion/RSE/Participacion de estudiante en proyecto ecohuella.jpeg') . '" alt="Muestra 1" class="img-thumbnail" style="width: 32%; height: 150px; object-fit: cover;">
                                        <img src="' . asset('assets/img/Vinculacion/RSE/Proyecto de Ecohuella.jpeg') . '" alt="Muestra 2" class="img-thumbnail" style="width: 32%; height: 150px; object-fit: cover;">
                                        <img src="' . asset('assets/img/Vinculacion/RSE/Proyecto Ecohuella 2.jpeg') . '" alt="Muestra 3" class="img-thumbnail" style="width: 32%; height: 150px; object-fit: cover;">
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="d-flex justify-content-around">
                                        <img src="' . asset('assets/img/Vinculacion/RSE/Mercado Cesar Chiriboga.jpeg') . '" alt="Muestra 4" class="img-thumbnail" style="width: 48%; height: 150px; object-fit: cover;">
                                        <img src="' . asset('assets/img/Vinculacion/RSE/Gestion mercado Cesar Chiriboga.jpeg') . '" alt="Muestra 5" class="img-thumbnail" style="width: 48%; height: 150px; object-fit: cover;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                ',
            ],
        ];
    }
}