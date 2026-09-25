<?php
declare(strict_types=1);
// Vista MVC Servicios - Bienestar Institucional (render server-side)
$title = $title ?? 'Bienestar Estudiantil';
$heroImagenes = $heroImagenes ?? [];
$heroContacto = $heroContacto ?? [];
$whatsapp = $whatsapp ?? '';
$carruseles = $carruseles ?? [];
$extraScripts = [
    asset('js/moduls/BienestarEstudiantil/CarruselBienestar.js'),
    asset('js/app/modules/services/bienestar-institucional.js'),
];
$extraStyles = '';

$escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

ob_start();
?>
<div class="container-fluid py-3 container-top">
    <div class="container-fluid py-5 text-center">
        <p class="section-title px-5">
            <span class="px-2">BIENESTAR</span>
        </p>
        <h1 class="display-4 fw-bold">Bienestar Institucional</h1>
    </div>

    <div class="container my-5">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <div class="custom-carousel-wrapper">
                    <div class="custom-carousel-track">
                        <?php foreach ($heroImagenes as $index => $imagen): ?>
                            <div class="custom-carousel-item"><img src="<?= $escape($imagen) ?>" alt="Imagen <?= (int) $index + 1 ?>"></div>
                        <?php endforeach; ?>
                    </div>

                    <div class="custom-dots-container">
                        <span class="custom-dot custom-active"></span>
                        <span class="custom-dot"></span>
                        <span class="custom-dot"></span>
                        <span class="custom-dot"></span>
                    </div>
                    <p class="text-center">CONOCE NUESTRO SERVICIOS </p>
                </div>
            </div>

            <div class="col-lg-4 d-flex justify-content-center">
                <div class="card-container bienestar-equipo-card d-flex flex-column align-items-center p-4">
                    <div class="bienestar-equipo-imagen mb-4 text-center">
                        <img src="<?= asset('assets/img/bienestarEstudiantil/principal/NicolasP.jpg') ?>"
                             alt="Coordinación de Bienestar Institucional"
                             class="img-fluid img-reflect-center" />
                    </div>

                    <div class="bienestar-contacto-panel w-100 text-center mb-3" style="max-width: 500px;">
                        <h5 class="fw-bold mb-3 text-primary text-uppercase">Contacto</h5>
                        <div class="contact-info-list text-start d-inline-block">
                            <?php foreach ($heroContacto['email'] as $email): ?>
                                <p class="mb-2"><i class="fas fa-envelope text-primary me-2"></i><?= $escape($email) ?></p>
                            <?php endforeach; ?>
                            <p class="mb-2"><i class="fas fa-mobile-alt text-primary me-2"></i><?= $escape((string) $heroContacto['movil']) ?></p>
                            <p class="mb-0"><i class="fas fa-clock text-primary me-2"></i><?= $escape((string) $heroContacto['horario']) ?></p>
                        </div>
                    </div>

                    <p class="text-center fw-bold text-muted">La Coordinación de Bienestar Institucional</p>
                    <a href="<?= $escape($whatsapp) ?>" class="btn btn-success mb-2" target="_blank">
                        <i class="fab fa-whatsapp me-2"></i>Chatear por WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div id="bienestar-all-content">
        <!-- CONTENIDO 1: FLECHA INTERACTIVA HACIA ABAJO (ocupando el espacio del título) -->
        <section class="container-fluid bienestar-page-container bienestar-section-block">
            <div class="bienestar-seccion-wrapper">
                <div class="container-fluid bienestar-page-container bienestar-section-block bienestar-title-block">
                    <div class="bienestar-flecha-wrapper">
                        <a href="#bienestar-menu-superior" class="bienestar-flecha-animada" aria-label="Bajar a los servicios">
                            <i class="fas fa-chevron-down"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- LAYOUT POR BOTONES: menú horizontal debajo de la flecha azul + panel de contenido -->
        <div class="bienestar-tabs-container">
            <nav class="bienestar-menu-superior" id="bienestar-menu-superior" role="tablist" aria-label="Secciones de Bienestar Institucional">
                <button type="button" class="bienestar-menu-btn is-active" data-bienestar-target="bienestar-panel-clubes" role="tab">
                    <i class="fas fa-users"></i>
                    <span>Clubes</span>
                </button>
                <button type="button" class="bienestar-menu-btn" data-bienestar-target="bienestar-panel-biopsicosocial" role="tab">
                    <i class="fas fa-heartbeat"></i>
                    <span>Acompañamiento Biopsicosocial</span>
                </button>
                <button type="button" class="bienestar-menu-btn" data-bienestar-target="bienestar-panel-becas" role="tab">
                    <i class="fas fa-hand-holding-usd"></i>
                    <span>Becas</span>
                </button>
                <button type="button" class="bienestar-menu-btn" data-bienestar-target="bienestar-panel-orientacion" role="tab">
                    <i class="fas fa-compass"></i>
                    <span>Orientación Vocacional</span>
                </button>
                <button type="button" class="bienestar-menu-btn" data-bienestar-target="bienestar-panel-inclusion" role="tab">
                    <i class="fas fa-universal-access"></i>
                    <span>Igualdad, Equidad e Inclusión</span>
                </button>
              <a class="bienestar-menu-btn" 
               href="https://docs.google.com/forms/d/e/1FAIpQLScKuypiP-LoLt4-QtKw4ycF37TJSXwY4YZZk_XN9rP519yYfw/viewform" 
               target="_blank" 
               rel="noopener" 
               style="background-color: #e74c3c; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
                 <i class="fas fa-life-ring"></i>
                 <span>Botón de Ayuda</span>
              </a>
            </nav>

            <div class="bienestar-paneles">
                <!-- PANEL 1: CLUBES -->
                <section class="bienestar-panel is-active" id="bienestar-panel-clubes" role="tabpanel">
                    <section class="container-fluid bienestar-page-container bienestar-section-block">
                        <div class="bienestar-seccion-wrapper">
                            <div class="container-fluid py-5 bg-white">
                                <div class="d-flex justify-content-center mb-4">
                                    <div class="titulo-flecha-derecha" style="background-color: #ed7d31; min-width: 60%; color: white; padding: 10px 40px; font-weight: bold; text-align: center; clip-path: polygon(0% 0%, 95% 0%, 100% 50%, 95% 100%, 0% 100%);">
                                        BIENESTAR PSICOLÓGICO
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="caja-texto-borde mb-4" style="border-color: #C28502;">
                                        <p class="mb-0">Tu salud mental es importante. El bienestar psicológico es el resultado de un equilibrio emocional, personal y académico alineado al proyecto de vida de cada miembro de la comunidad educativa.</p>
                                    </div>
                                </div>

                                <div class="container">
                                    <div class="text-center mb-5">
                                        <h1 class="fw-bold" style="color: #ffc000; font-size: 3rem; text-shadow: 1px 1px 2px rgba(0,0,0,0.1);">
                                            ¡TU BIENESTAR ES PARTE DE SUPERARSE!
                                        </h1>
                                    </div>

                                    <div class="row g-4 align-items-start">
                                        <div class="col-lg-4">
                                            <h3 class="text-primary fw-bold text-center mb-4" style="letter-spacing: 2px;">CLUBES</h3>
                                            <div class="clubes-lista">
                                                <button type="button" class="club-menu-btn is-active" data-bienestar-club="club-creacion">
                                                    <i class="fas fa-video"></i>
                                                    <span>Club de Creación de Contenido</span>
                                                </button>
                                                <button type="button" class="club-menu-btn" data-bienestar-club="club-danza">
                                                    <i class="fas fa-music"></i>
                                                    <span>Club de Danza</span>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="col-lg-8">
                                            <div id="clubesDetalle" class="club-detalle p-4 p-md-5 rounded-4 shadow-sm">
                                                <div class="club-detalle-cuerpo is-active" id="club-creacion">
                                                    <h4 class="fw-bold mb-4 text-primary">Club de Creación de Contenido</h4>
                                                    <div class="row align-items-center g-4">
                                                        <div class="col-md-5">
                                                            <p class="mb-0">El club de Creación de contenido se enfoca en la producción audiovisual y conocimiento de las tendencias del marketing. Se representa como un espacio estudiantil para optener nuevos conocimientos saliendo de la zona de confort</p>
                                                        </div>
                                                        <div class="col-md-7 text-center">
                                                         <video src="<?= asset('assets/videos/Bienestar/creacion_de_contenido.mp4') ?>" 
                                                         class="img-fluid rounded shadow" 
                                                         controls 
                                                         autoplay 
                                                         muted 
                                                         loop 
                                                         playsinline>
                                                         Tu navegador no soporta el reproductor de video.
                                                         </video>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="club-detalle-cuerpo" id="club-danza">
                                                    <h4 class="fw-bold mb-4 text-primary">Club de Danza</h4>
                                                    <div class="row align-items-center g-4">
                                                        <div class="col-md-4">
                                                            <p class="mb-0">El club de Danza es una de las asociaciones estudiantiles que recupera partes de la cultura de nuestro país. A través de la danza producen emociones que contribuyen al bienestar psicológico de la comunidad estudiantil.</p>
                                                        </div>
                                                        <div class="col-md-7 text-center">
                                                         <video src="<?= asset('assets/videos/Bienestar/Danza_video.mp4') ?>" 
                                                         class="img-fluid rounded shadow" 
                                                         controls 
                                                         autoplay 
                                                         muted 
                                                         loop 
                                                         playsinline>
                                                         Tu navegador no soporta el reproductor de video.
                                                         </video>
                                                        </div>
                                                        <div class="col-md-8 d-flex gap-2">
                                                            <img src="<?= asset('assets/img/bienestarEstudiantil/Clubes/Danza1.jpeg') ?>" class="img-fluid rounded shadow" style="width: 32%;">
                                                            <img src="<?= asset('assets/img/bienestarEstudiantil/Clubes/Danza2.jpeg') ?>" class="img-fluid rounded shadow" style="width: 32%;">
                                                            <img src="<?= asset('assets/img/bienestarEstudiantil/Clubes/Danza3.jpeg') ?>" class="img-fluid rounded shadow" style="width: 32%;">
                                                            <img src="<?= asset('assets/img/bienestarEstudiantil/Clubes/Danza4.jpeg') ?>" class="img-fluid rounded shadow" style="width: 32%;">
                                                            <img src="<?= asset('assets/img/bienestarEstudiantil/Clubes/Danza5.jpeg') ?>" class="img-fluid rounded shadow" style="width: 32%;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                    </section>
                </section>

                <!-- PANEL 2: ACOMPAÑAMIENTO BIOPSICOSOCIAL -->
                <section class="bienestar-panel" id="bienestar-panel-biopsicosocial" role="tabpanel">
                    <section class="container-fluid bienestar-page-container bienestar-section-block">
                        <div class="bienestar-seccion-wrapper">
                            <div class="container-fluid py-5 bg-white bienestar-seccion-biopsico">
                                <div class="d-flex flex-column align-items-center mb-5">
                                    <div class="d-flex justify-content-center mb-3">
                                        <div class="titulo-flecha-derecha">
                                            ACOMPAÑAMIENTO BIOPSICOSOCIAL
                                        </div>
                                    </div>
                                    <div class="text-container text-center" style="max-width: 800px;">
                                        <div class="col-md-12">
                                            <div class="caja-texto-borde mb-4" style="border-color: #F54927;">
                                                <p class="mb-0">El acompañamiento biopsicosocial se define como un enfoque integral de apoyo que considera simultáneamente los aspectos biológicos, psicológicos y sociales de la persona, buscando promover su bienestar y salud mental holística.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="container">
                                    <div class="row align-items-center mb-5">
                                        <div class="col-md-5">
                                            <div class="caja-texto-borde mb-4" style="border-color: #4A90E2;">
                                                <p class="mb-0">Una mente sana es el motor más poderoso para el aprendizaje. Por eso, hemos creado un espacio seguro, confidencial y libre de juicios para ti.</p>
                                            </div>
                                            <div class="caja-texto-borde" style="border-color: #7ED321;">
                                                <p class="mb-0">La vida universitaria es un viaje apasionante lleno de retos, descubrimientos y crecimiento. Pero también puede ser una montaña rusa de emociones donde el estrés o la incertidumbre toman la delantera.</p>
                                            </div>
                                        </div>

                                        <div class="col-md-7 text-center">
                                            <div class="contenedor-imagen-simple">
                                                <img src="<?= asset('assets/img/bienestarEstudiantil/AcompanamientoBiopsicosocial/Carrusel2.jpeg') ?>"
                                                     alt="Acompañamiento Biopsicosocial"
                                                     class="img-fluid rounded shadow-sm">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row text-center g-4 justify-content-center mt-5">
                                        <div class="col-6 col-md-3">
                                            <div class="biopsico-pilar-card h-100 p-3 rounded-4 shadow-sm" style="border-bottom: 5px solid #4A90E2; background-color: white;">
                                                <div class="biopsico-icono-wrapper rounded-circle p-4 mb-3 d-flex align-items-center justify-content-center mx-auto" style="background-color: rgba(74, 144, 226, 0.1); width: 100px; height: 100px;">
                                                    <i class="fas fa-headset fa-3x" style="color: #4A90E2;"></i>
                                                </div>
                                                <div class="cajita-informativa rounded-3 p-2 text-white" style="background-color: #4A90E2; font-size: 0.8rem; text-transform: uppercase;">
                                                    <p class="mb-0 fw-bold letter-spacing-1">ESCUCHA ACTIVA</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6 col-md-3">
                                            <div class="biopsico-pilar-card h-100 p-3 rounded-4 shadow-sm" style="border-bottom: 5px solid #F5A623; background-color: white;">
                                                <div class="biopsico-icono-wrapper rounded-circle p-4 mb-3 d-flex align-items-center justify-content-center mx-auto" style="background-color: rgba(245, 166, 35, 0.1); width: 100px; height: 100px;">
                                                    <i class="fas fa-phone-volume fa-3x" style="color: #F5A623;"></i>
                                                </div>
                                                <div class="cajita-informativa rounded-3 p-2 text-white" style="background-color: #F5A623; font-size: 0.8rem; text-transform: uppercase;">
                                                    <p class="mb-0 fw-bold letter-spacing-1">PRIMEROS AUXILIOS PSICOLÓGICOS</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6 col-md-3">
                                            <div class="biopsico-pilar-card h-100 p-3 rounded-4 shadow-sm" style="border-bottom: 5px solid #7ED321; background-color: white;">
                                                <div class="biopsico-icono-wrapper rounded-circle p-4 mb-3 d-flex align-items-center justify-content-center mx-auto" style="background-color: rgba(126, 211, 33, 0.1); width: 100px; height: 100px;">
                                                    <i class="fas fa-heartbeat fa-3x" style="color: #7ED321;"></i>
                                                </div>
                                                <div class="cajita-informativa rounded-3 p-2 text-white" style="background-color: #7ED321; font-size: 0.8rem; text-transform: uppercase;">
                                                    <p class="mb-0 fw-bold letter-spacing-1">FORTALECE TU SALUD MENTAL</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6 col-md-3">
                                            <div class="biopsico-pilar-card h-100 p-3 rounded-4 shadow-sm" style="border-bottom: 5px solid #f1c40f; background-color: white;">
                                                <div class="biopsico-icono-wrapper rounded-circle p-4 mb-3 d-flex align-items-center justify-content-center mx-auto"
                                                     style="background-color: #fef9e7; width: 100px; height: 100px; border: 1px solid #fcf3cf;">
                                                    <i class="fas fa-hand-holding-heart fa-3x" style="color: #f1c40f; filter: drop-shadow(0px 2px 2px rgba(0,0,0,0.1));"></i>
                                                </div>
                                                <div class="cajita-informativa rounded-3 p-2 text-center" style="background-color: #f1c40f; color: #333; font-size: 0.8rem; text-transform: uppercase;">
                                                    <p class="mb-0 fw-bold" style="letter-spacing: 0.5px; line-height: 1.2;">ACOMPAÑAMIENTO EN LA ADVERSIDAD</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- ACOMPAÑAMIENTO PSICOPEDAGÓGICO (dentro del acompañamiento) -->
                    <section class="container-fluid bienestar-page-container bienestar-section-block">
                        <div class="bienestar-seccion-wrapper">
                            <div class="container-fluid py-5 bg-white">
                                <div class="d-flex justify-content-center mb-5">
                                    <div class="titulo-flecha-derecha" style="background-color: #7bc54a;">
                                        ACOMPAÑAMIENTO PSICOPEDAGÓGICO
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="caja-texto-borde mb-4" style="border-color: #04DB53;">
                                        <p class="mb-0">El acompañamiento psicopedagógico es un proceso inclusivo que aborda las dificultades de aprendizaje para que todos logren un desarrollo académico adecuado.</p>
                                    </div>
                                </div>

                                <div class="container">
                                    <div class="row align-items-center mb-5 pb-5">
                                        <div class="col-md-6 text-center mb-4 mb-md-0">
                                            <div class="contenedor-imagen-simple">
                                                <img src="<?= asset('assets/img/bienestarEstudiantil/AcompanamientoPsicopedagogico/acompañamientoPsicopedagogico.jpeg') ?>"
                                                     alt="Acompañamiento Estudiantil"
                                                     class="img-fluid shadow"
                                                     style="border-radius: 25px; max-width: 75%; height: auto;">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="d-flex flex-wrap justify-content-center align-items-center">
                                                <div class="burbuja-info b-naranja shadow-sm d-flex align-items-center justify-content-center text-center p-3">
                                                    <span class="fw-bold small">DESCUBRE TU ESTILO DE APRENDIZAJE</span>
                                                </div>
                                                <div class="burbuja-info b-amarillo shadow-sm d-flex align-items-center justify-content-center text-center p-3">
                                                    <span class="fw-bold small">AJUSTES RAZONABLES</span>
                                                </div>
                                                <div class="burbuja-info b-azul shadow-sm d-flex align-items-center justify-content-center text-center p-3">
                                                    <span class="fw-bold small">CONFIDENCIALIDAD</span>
                                                </div>
                                                <div class="burbuja-info b-verde shadow-sm d-flex align-items-center justify-content-center text-center p-3">
                                                    <span class="fw-bold small">ACOMPAÑAMIENTO Y SEGUIMIENTO</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row align-items-center mt-5 pt-5">
                                        <div class="col-md-6">
                                            <div class="d-flex flex-column gap-4">
                                                <div class="d-flex align-items-center item-proceso">
                                                    <div class="paso-flecha-numero" style="border-color: #0056b3; color: #0056b3;">1</div>
                                                    <h4 class="ms-3 mb-0 fw-bold" style="color: #0056b3;">Detección de la necesidad</h4>
                                                </div>
                                                <div class="d-flex align-items-center item-proceso">
                                                    <div class="paso-flecha-numero" style="border-color: #7bc54a; color: #7bc54a;">2</div>
                                                    <h4 class="ms-3 mb-0 fw-bold" style="color: #7bc54a;">Entrevista Inicial</h4>
                                                </div>
                                                <div class="d-flex align-items-center item-proceso">
                                                    <div class="paso-flecha-numero" style="border-color: #ffc107; color: #ffc107;">3</div>
                                                    <h4 class="ms-3 mb-0 fw-bold" style="color: #ffc107;">Valoración</h4>
                                                </div>
                                                <div class="d-flex align-items-center item-proceso">
                                                    <div class="paso-flecha-numero" style="border-color: #fd7e14; color: #fd7e14;">4</div>
                                                    <h4 class="ms-3 mb-0 fw-bold" style="color: #fd7e14;">Acompañamiento y seguimiento continuo</h4>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 text-center mt-5 mt-md-0">
                                            <div class="contenedor-imagen-simple">
                                                <img src="<?= asset('assets/img/bienestarEstudiantil/AcompanamientoPsicopedagogico/acompañamientoPsicopedagogico2.jpeg') ?>"
                                                     alt="Sesión de Seguimiento"
                                                     class="img-fluid shadow"
                                                     style="border-radius: 20px; max-width: 75%; height: auto;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                        </div>
                    </section>
                    <section class="container-fluid bienestar-page-container bienestar-section-block">
    <div class="bienestar-seccion-wrapper">
        <div class="container-fluid py-5 bg-white">
            
            <!-- Título centrado -->
            <div class="d-flex justify-content-center mb-5">
                <div class="titulo-flecha-derecha" style="background-color: #7bc54a;">
                    ACOMPAÑAMIENTO PSICOLÓGICO
                </div>
            </div>

            <div class="container">
                <!-- Fila centrada para la imagen y el botón -->
                <div class="row justify-content-center text-center">
                    <div class="col-12 col-md-8 col-lg-6">
                        
                        <!-- 1. Foto en el centro -->
                        <div class="contenedor-imagen-simple mb-4">
                            <img src="<?= asset('assets/img/bienestarEstudiantil/AcompanamientoBiopsicosocial/Imagen1.jpg') ?>"
                                 alt="Acompañamiento Estudiantil"
                                 class="img-fluid shadow"
                                 style="border-radius: 25px; max-width: 85%; height: auto;">
                        </div>

                        <!-- 2. Botón de colores llamativos centrado -->
                       <div class="d-flex justify-content-center mt-3">
                        <a class="bienestar-menu-btn btn-llamativo" 
                           href="https://wa.me/593998409293?text=Hola,%20deseo%20solicitar%20acompañamiento%20psicológico" 
                           target="_blank" 
                           rel="noopener">
                        <i class="fab fa-whatsapp"></i>
                       <span>Agenda tu Cita aqui</span>
                        </a>
                      </div>

                    </div>
                </div>
            </div>

        </div>
        <br>
        <br>
    </div>
</section>
                </section>

                <!-- PANEL 3: BECAS -->
                <section class="bienestar-panel" id="bienestar-panel-becas" role="tabpanel">
                    <section class="container-fluid bienestar-page-container bienestar-section-block">
                        <div class="bienestar-seccion-wrapper">
                            <div class="container-fluid py-5 bg-white">
                                <div class="d-flex justify-content-center mb-5">
                                    <div class="titulo-flecha-derecha">
                                        BECAS Y AYUDAS ECONÓMICAS
                                    </div>
                                </div>

                                <div class="container">
                                    <div class="row g-4 justify-content-center mb-5">
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <div class="flip-card mb-3">
                                                <div class="flip-card-inner shadow-sm">
                                                    <div class="flip-card-front card-socioeconomica">
                                                        <i class="fas fa-users icon-grande"></i>
                                                        <h3>Beca Socioeconómica</h3>
                                                        <i class="fas fa-sync-alt flip-icon"></i>
                                                    </div>
                                                    <div class="flip-card-back p-3">
                                                        <h5 class="fw-bold mb-3">REQUISITOS</h5>
                                                        <ul class="text-start small" style="color: black; list-style: none; padding-left: 0;">
                                                            <li><i class="fas fa-check me-2 text-primary"></i>Solicitud de beca.</li>
                                                            <li><i class="fas fa-check me-2 text-primary"></i>Ficha Socioeconómica.</li>
                                                            <li><i class="fas fa-check me-2 text-primary"></i>Historial de trabajo.</li>
                                                            <li><i class="fas fa-check me-2 text-primary"></i>Carta de Servicio Básico.</li>
                                                            <li><i class="fas fa-check me-2 text-primary"></i>Pago de Derecho de Beca.</li>
                                                            <li><i class="fas fa-check me-2 text-primary"></i>Promedio mín. 8.5/10.</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bg-white p-3 rounded-4 shadow-sm border text-center" style="min-height: 110px; display: flex; align-items: center; justify-content: center;">
                                                <p class="small mb-0 text-dark">La beca de inclusión está dirigida a estudiantes con enfermedades crónicas, enfermedades catastróficas, discapacidad, mujeres sobrevivientes a violencia basada en género, poblaciones históricamente excluidas y necesidades educativas específicas.</p>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-3">
                                            <div class="flip-card mb-3">
                                                <div class="flip-card-inner shadow-sm">
                                                    <div class="flip-card-front card-inclusion">
                                                        <i class="fas fa-wheelchair icon-grande"></i>
                                                        <h3>Beca de Inclusión</h3>
                                                        <i class="fas fa-sync-alt flip-icon"></i>
                                                    </div>
                                                    <div class="flip-card-back p-3">
                                                        <h5 class="fw-bold mb-3">REQUISITOS</h5>
                                                        <ul class="text-start small" style="color: black; list-style: none; padding-left: 0;">
                                                            <li><i class="fas fa-check me-2 text-success"></i>Solicitud de beca.</li>
                                                            <li><i class="fas fa-check me-2 text-success"></i>Ficha Socioeconómica.</li>
                                                            <li><i class="fas fa-check me-2 text-success"></i>Informe Psicopedagógico.</li>
                                                            <li><i class="fas fa-check me-2 text-success"></i>Copia de Cédula.</li>
                                                            <li><i class="fas fa-check me-2 text-success"></i>Entrevista Bienestar.</li>
                                                            <li><i class="fas fa-check me-2 text-success"></i>Promedio mín. 8.5/10.</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bg-white p-3 rounded-4 shadow-sm border text-center" style="min-height: 110px; display: flex; align-items: center; justify-content: center;">
                                                <p class="small mb-0 text-dark">La beca socioeconómica está destinada a estudiantes que se encuentran en situación de vulnerabilidad socioeconómica, desempleo o poseen escasos recursos económicos.</p>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-3">
                                            <div class="flip-card mb-3">
                                                <div class="flip-card-inner shadow-sm">
                                                    <div class="flip-card-front card-especial">
                                                        <i class="fas fa-horse-head icon-grande"></i>
                                                        <h3>Beca Especial</h3>
                                                        <i class="fas fa-sync-alt flip-icon"></i>
                                                    </div>
                                                    <div class="flip-card-back p-3">
                                                        <h5 class="fw-bold mb-3">REQUISITOS</h5>
                                                        <ul class="text-start small" style="color: black; list-style: none; padding-left: 0;">
                                                            <li><i class="fas fa-check me-2 text-warning"></i>Solicitud de beca.</li>
                                                            <li><i class="fas fa-check me-2 text-warning"></i>Ficha Socioeconómica.</li>
                                                            <li><i class="fas fa-check me-2 text-warning"></i>Copia de Cédula.</li>
                                                            <li><i class="fas fa-check me-2 text-warning"></i>Pago Derecho de Beca.</li>
                                                            <li><i class="fas fa-check me-2 text-warning"></i>Promedio mín. 8.5/10.</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bg-white p-3 rounded-4 shadow-sm border text-center" style="min-height: 110px; display: flex; align-items: center; justify-content: center;">
                                                <p class="small mb-0 text-dark">La Beca Especial se encuentra dirigida a aquellos estudiantes que se benefician de algún convenio, son parte de clubes o situaciones especiales de mérito académico o cultural.</p>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-3">
                                            <div class="flip-card mb-3">
                                                <div class="flip-card-inner shadow-sm">
                                                    <div class="flip-card-front card-excelencia">
                                                        <i class="fas fa-graduation-cap icon-grande"></i>
                                                        <h3>Excelencia Académica</h3>
                                                        <i class="fas fa-sync-alt flip-icon"></i>
                                                    </div>
                                                    <div class="flip-card-back p-3">
                                                        <h5 class="fw-bold mb-3">REQUISITOS</h5>
                                                        <ul class="text-start small" style="color: black; list-style: none; padding-left: 0;">
                                                            <li><i class="fas fa-check me-2 text-danger"></i>Solicitud de beca.</li>
                                                            <li><i class="fas fa-check me-2 text-danger"></i>Ficha Socioeconómica.</li>
                                                            <li><i class="fas fa-check me-2 text-danger"></i>Promedio mínimo 9/10.</li>
                                                            <li><i class="fas fa-check me-2 text-danger"></i>Pago Derecho de Beca.</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bg-white p-3 rounded-4 shadow-sm border text-center" style="min-height: 110px; display: flex; align-items: center; justify-content: center;">
                                                <p class="small mb-0 text-dark">La Beca de Excelencia Académica se encuentra destinada a estudiantes que poseen un rendimiento académico excelente, ya sea antes de ingresar a la institución o siendo parte de la misma.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="proceso-becas-section py-5 px-4 rounded-4 shadow-sm mb-5" style="background-color: #f8f9fa; border-top: 5px solid #ffc107;">
                                        <h3 class="text-center fw-bold mb-5">¿CÓMO POSTULAR A UNA BECA?</h3>
                                        <div class="row g-4 justify-content-center">
                                            <div class="col-6 col-md-4 col-lg-2 text-center">
                                                <div class="paso-circulo" style="background-color: #f8c471;">1</div>
                                                <p class="small fw-bold mt-2">Entrar con tus credenciales al sistema Q10</p>
                                            </div>
                                            <div class="col-6 col-md-4 col-lg-2 text-center">
                                                <div class="paso-circulo" style="background-color: #aed6f1;">2</div>
                                                <p class="small fw-bold mt-2">Selecciona "Crear Solicitud" en el apartado de Bienestar Institucional -&gt; Solicitudes.</p>
                                            </div>
                                            <div class="col-6 col-md-4 col-lg-2 text-center">
                                                <div class="paso-circulo" style="background-color: #f7b445;">3</div>
                                                <p class="small fw-bold mt-2">Adjunta la Solicitud de Beca y llena la Encuesta Socioeconómica</p>
                                            </div>
                                            <div class="col-6 col-md-4 col-lg-2 text-center">
                                                <div class="paso-circulo" style="background-color: #f1948a;">4</div>
                                                <p class="small fw-bold mt-2">Cancela el valor de $10 de Derecho de Beca</p>
                                            </div>
                                            <div class="col-6 col-md-4 col-lg-2 text-center">
                                                <div class="paso-circulo" style="background-color: #d2b4de;">5</div>
                                                <p class="small fw-bold mt-2">En caso de aprobarse la beca, llegará un contrato al correo, el cual se debe firmar.</p>
                                            </div>
                                            <div class="col-6 col-md-4 col-lg-2 text-center">
                                                <div class="paso-circulo" style="background-color: #7bc54a;">6</div>
                                                <p class="small fw-bold mt-2">Entrega toda la documentación utilizada en el proceso</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center flex-wrap gap-3 mb-5">
                                        <a href="<?= asset('GUIA_DEL_REGLAMENTO_BECAS') ?>" target="_blank" class="btn-bienestar-action">Guía del Reglamento de Becas</a>
                                        <a href="<?= asset('Formulario-Bienestar') ?>" target="_blank" class="btn-bienestar-action">Ficha de Solicitud</a>
                                        <a href="<?= asset('FICHA_SOCIOECONOMICA') ?>" target="_blank" class="btn-bienestar-action">Ficha SocioEconómica</a>
                                        <a href="https://forms.office.com/..." target="_blank" class="btn-bienestar-action">Encuesta SocioEconómica</a>
                                    </div>

                                    <div class="table-container-modern p-4 rounded-4 shadow-sm bg-white border">
                                            <h4 class="text-center fw-bold text-primary mb-4">+30% de becados por periodo</h4>
                                            <div class="grafico-becas">
                                                <div class="becas-fila">
                                                    <span class="becas-etiqueta">Nov23-Abr24</span>
                                                    <div class="becas-pista">
                                                        <div class="becas-barra" style="width: 100%;">419</div>
                                                    </div>
                                                </div>
                                                <div class="becas-fila">
                                                    <span class="becas-etiqueta">May-Oct24</span>
                                                    <div class="becas-pista">
                                                        <div class="becas-barra" style="width: 72%;">301</div>
                                                    </div>
                                                </div>
                                                <div class="becas-fila">
                                                    <span class="becas-etiqueta">Nov24-Abr25</span>
                                                    <div class="becas-pista">
                                                        <div class="becas-barra" style="width: 85%;">358</div>
                                                    </div>
                                                </div>
                                                <div class="becas-fila">
                                                    <span class="becas-etiqueta">May-Oct25</span>
                                                    <div class="becas-pista">
                                                        <div class="becas-barra" style="width: 76%;">318</div>
                                                    </div>
                                                </div>
                                                <div class="becas-fila">
                                                    <span class="becas-etiqueta">Nov25-Abr26</span>
                                                    <div class="becas-pista">
                                                        <div class="becas-barra" style="width: 43%;">179</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </section>

                <!-- PANEL 4: ORIENTACIÓN VOCACIONAL -->
                <section class="bienestar-panel" id="bienestar-panel-orientacion" role="tabpanel">
                    <section class="container-fluid bienestar-page-container bienestar-section-block">
                        <div class="bienestar-seccion-wrapper">
                            <div class="container-fluid py-5 bg-white">
                                <div class="d-flex justify-content-center mb-5">
                                    <div class="titulo-flecha-derecha" style="background-color: #ed7d31; min-width: 60%; color: white; padding: 10px 40px; font-weight: bold; text-align: center; clip-path: polygon(0% 0%, 95% 0%, 100% 50%, 95% 100%, 0% 100%);">
                                        ORIENTACIÓN VOCACIONAL Y TRABAJO SOCIAL
                                    </div>
                                </div>

                                <div class="container">
                                    <div class="row g-5">
                                        <div class="col-lg-6">
                                            <div class="text-center mb-4">
                                                <h3 class="fw-bold px-4 py-2 d-inline-block" style="color: white; background-color: #4682B4; border-radius: 50px 0 50px 0;">Orientación Vocacional</h3>
                                            </div>
                                            <div class="card border-0 shadow-sm overflow-hidden mb-4" style="border-radius: 20px;">
                                                <img src="<?= asset('assets/img/bienestarEstudiantil/Orientacion/Orientacion1.jpeg') ?>" alt="Orientación" class="img-fluid" style="height: 250px; width: 100%; object-fit: cover;">
                                                <div class="p-4 bg-light">
                                                    <p class="mb-0 text-dark" style="text-align: justify;">
                                                        Si no te encuentras seguro en la carrera de tus sueños, no te preocupes, la <b>Coordinación de Bienestar Institucional</b> te ayudará en la elección de tu profesión de acuerdo a tus habilidades, destrezas y gustos personales. De este modo, nos aseguramos de que te encuentres en un lugar más adecuado para ti.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="p-3 text-center shadow-sm" style="background-color: #fdf2e9; border-left: 5px solid #ed7d31; border-radius: 10px;">
                                                <p class="mb-0 fw-bold" style="color: #d35400;">
                                                    <i class="fas fa-graduation-cap me-2"></i> ¡Si te encuentras en el último año de bachillerato, también puedes acceder!
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="text-center mb-4">
                                                <h3 class="fw-bold px-4 py-2 d-inline-block" style="color: white; background-color: #7bc54a; border-radius: 0 50px 0 50px;">Trabajo Social</h3>
                                            </div>
                                            <div class="card border-0 shadow-sm overflow-hidden mb-4" style="border-radius: 20px;">
                                                <img src="<?= asset('assets/img/bienestarEstudiantil/Orientacion/Trabajo1.jpg') ?>" alt="Trabajo Social" class="img-fluid" style="height: 250px; width: 100%; object-fit: cover;">
                                                <div class="p-4 bg-light">
                                                    <p class="mb-0 text-dark" style="text-align: justify;">
                                                        Nuestro apartado de trabajo social está encargado de asegurar una convivencia adecuada de todos los miembros de la comunidad educativa, logrando un desarrollo académico que conecte con sus proyectos de vida.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row g-2">
                                                <div class="col-12">
                                                    <div class="d-flex align-items-center p-3 text-white shadow-sm" style="background-color: #f1948a; border-radius: 10px;">
                                                        <i class="fas fa-heart me-3 fs-4"></i>
                                                        <span class="fw-bold">Programas de Bienestar General.</span>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-flex align-items-center p-3 text-white shadow-sm" style="background-color: #4682B4; border-radius: 10px;">
                                                        <i class="fas fa-chart-line me-3 fs-4"></i>
                                                        <span class="fw-bold">Evaluación de situación socioeconómica.</span>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-flex align-items-center p-3 text-white shadow-sm" style="background-color: #7bc54a; border-radius: 10px;">
                                                        <i class="fas fa-hands-helping me-3 fs-4"></i>
                                                        <span class="fw-bold">Acompañamiento y Orientación.</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                    </section>
                </section>

                <!-- PANEL 5: IGUALDAD, EQUIDAD E INCLUSIÓN -->
                <section class="bienestar-panel" id="bienestar-panel-inclusion" role="tabpanel">
                    <section class="container-fluid bienestar-page-container bienestar-section-block">
                        <div class="bienestar-seccion-wrapper">
                            <div class="container-fluid py-5">
                                <div class="d-flex justify-content-center mb-5">
                                    <div class="titulo-flecha-derecha" style="background-color: #ed7d31; min-width: 65%; color: white; padding: 10px 40px; font-weight: bold; text-align: center; clip-path: polygon(0% 0%, 95% 0%, 100% 50%, 95% 100%, 0% 100%);">
                                        IGUALDAD, EQUIDAD E INCLUSIÓN
                                    </div>
                                </div>

                                <div class="container">
                                    <p class="text-center mb-5 fs-5 text-secondary">
                                        La Coordinación de Bienestar Institucional siempre se preocupa por lograr un ambiente inclusivo y equitativo, logrando la igualdad de oportunidades.
                                    </p>

                                    <div class="d-flex justify-content-center flex-wrap gap-3 mb-5">
                                        <a href="<?= asset('PLAN_IGUALDAD_2024') ?>" target="_blank" class="btn btn-outline-primary fw-bold px-4" style="border-radius: 50px; border-width: 2px;">
                                            Plan de Igualdad 2024
                                        </a>
                                        <a href="<?= asset('PLAN_IGUALDAD_2025') ?>" target="_blank" class="btn btn-outline-primary fw-bold px-4" style="border-radius: 50px; border-width: 2px;">
                                            Plan de Igualdad 2025
                                        </a>
                                        <a href="<?= asset('PLAN_IGUALDAD_2026') ?>" target="_blank" class="btn btn-outline-primary fw-bold px-4" style="border-radius: 50px; border-width: 2px;">
                                            Plan de Igualdad 2026
                                        </a>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 text-center mb-5 mt-4">
                                            <h2 class="text-uppercase fw-bold mb-4" style="color: #333; letter-spacing: 2px;">Taller de Lengua de Señas</h2>
                                            <div id="carrusel-lengua-senas-container" class="carrusel-limpio">
                                                <div class="owl-carousel">
                                                    <?php foreach ($carruseles['lenguaSenas'] as $imagen): ?>
                                                        <div><img src="<?= $escape($imagen) ?>" alt="Taller" class="img-fluid"></div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 text-center mb-5 mt-4">
                                            <h2 class="text-uppercase fw-bold mb-4" style="color: #333; letter-spacing: 2px;">Socialización del Protocolo Psicopedagógico</h2>
                                            <div id="carrusel-protocolo-container" class="carrusel-limpio">
                                                <div class="owl-carousel">
                                                    <?php foreach ($carruseles['protocolo'] as $imagen): ?>
                                                        <div><img src="<?= $escape($imagen) ?>" alt="Protocolo" class="img-fluid"></div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 text-center mb-5 mt-4">
                                            <h2 class="text-uppercase fw-bold mb-4" style="color: #333; letter-spacing: 2px;">Sensibilización: Comunicación asertiva</h2>
                                            <div id="carrusel-sensibilizacion-container" class="carrusel-limpio">
                                                <div class="owl-carousel">
                                                    <?php foreach ($carruseles['sensibilizacion'] as $imagen): ?>
                                                        <div><img src="<?= $escape($imagen) ?>" alt="Sensibilización" class="img-fluid"></div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 text-center mb-5 mt-4">
                                            <h2 class="text-uppercase fw-bold mb-4" style="color: #333; letter-spacing: 2px;">Espacios accesibles</h2>
                                            <div id="carrusel-espacios-container" class="carrusel-limpio">
                                                <div class="owl-carousel">
                                                    <?php foreach ($carruseles['espacios'] as $imagen): ?>
                                                        <div><img src="<?= $escape($imagen) ?>" alt="Espacios" class="img-fluid"></div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </section>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require dirname(__DIR__) . '/layouts/main.php';
