<?php

declare(strict_types=1);

// MVC SubMenu - Talento Humano
// Renderiza las 6 pestañas, los modales legacy (BS4) y el visor de PDF (pdf.js).

$title = 'Talento Humano';
$bootstrap5Css = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css';
$extraScripts = [
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js',
    asset('js/app/modules/talento-humano/talento-humano-pdfs.js'),
    asset('js/app/modules/talento-humano/talento-humano.js'),
];

$escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

ob_start();
?>
<div class="container-fluid py-2 bg-light container-top">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center pb-2">
                    <p class="section-title px-5">
                        <span class="px-2"><?= $escape($kicker) ?></span>
                    </p>
                    <h1 class="mb-4">De <br> Talento Humano</h1>
                </div>
                <br>
                <div class="list-group list-group-horizontal flex-nowrap overflow-auto" id="list-tab" role="tablist">
                    <?php foreach ($tabs as $index => $tab): ?>
                        <a class="list-group-item list-group-item-action text-nowrap<?= $index === 0 ? ' active' : '' ?>"
                           id="list-<?= $escape($tab['aria']) ?>-list"
                           data-bs-toggle="list"
                           href="#list-<?= $escape($tab['id']) ?>"
                           role="tab"
                           aria-controls="list-<?= $escape($tab['aria']) ?>"><?= $escape($tab['etiqueta']) ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="tab-content" id="nav-tabContent">

                    <!----------------------------------------------- TRABAJA CON NOSOTROS --------------------------------------- -->
                    <div class="tab-pane fade show active" id="list-trabaja" role="tabpanel" aria-labelledby="list-trabaja-list">
                        <div class="row gx-5">
                            <div class="col-lg-12">
                                <h1 class="text-center text-primary">TRABAJA EN EL TECNOLÓGICO SUPERARSE</h1>
                                <br>
                                <h4 class="text-uppercase mb-3">Conócenos</h4>
                                <p style="text-align: justify;">
                                    En la Coordinación de Talento Humano del Instituto Superior Tecnológico Superarse, buscamos profesionales apasionados por la educación, comprometidos con la excelencia académica e innovadores en su enseñanza.<br>Si deseas formar parte de un equipo dinámico que transforma vidas a través del conocimiento, te invitamos a postularte y crecer profesionalmente con nosotros.
                                </p>
                                <p class="mb-4" style="text-align: center;">
                                    <strong>¡Súmate a nuestra comunidad educativa y contribuye al futuro de la educación!</strong>
                                </p>
                                <h4 class="text-uppercase mb-3">¿Cómo Aplicar?</h4>
                                <p>Si estás interesado en formar parte de nuestro equipo, debes revisar los procesos de selección vacantes, cumplir con los requisitos y aplicar:</p>
                                <h5 class="text-primary text-uppercase mb-1">Para su postulación, tenga en cuenta los siguientes pasos:</h5>

                                <div class="container-fluid py-5">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-12">
                                                <h1 class="mb-4 text-center">Proceso de Selección</h1>
                                                <div class="p-4 border rounded shadow-sm">
                                                    <div class="row">
                                                        <?php foreach ($procesoSeleccion as $card): ?>
                                                            <div class="col-md-6 col-lg-4 mb-4">
                                                                <div class="card card-custom h-100">
                                                                    <img src="<?= $escape($card['imagen']) ?>" class="card-img-top" alt="<?= $escape($card['title']) ?>" />
                                                                    <div class="card-body d-flex flex-column">
                                                                        <h5 class="card-title"><?= $escape($card['title']) ?></h5>
                                                                        <p class="card-text"><?= $escape($card['descripcion']) ?></p>
                                                                        <button type="button" class="btn btn-primary mt-auto"
                                                                                data-toggle="modal" data-target="<?= $escape($card['modal']) ?>"
                                                                                <?php if (isset($card['pdfSrc'])): ?>data-pdf-src="<?= $escape($card['pdfSrc']) ?>"<?php endif; ?>>
                                                                            <?= $escape($card['boton']) ?>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php // MODAL VACANTES ?>
                                <div class="modal fade" id="vacantesModal" tabindex="-1" role="dialog" aria-labelledby="vacantesModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content rounded">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="vacantesModalLabel">Vacantes Disponibles</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body p-0">
                                                <div id="vacantesCarousel" class="carousel slide" data-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <?php foreach ($vacantesSlides as $index => $slide): ?>
                                                            <div class="carousel-item<?= $index === 0 ? ' active' : '' ?>">
                                                                <img src="<?= $escape($slide['src']) ?>" class="d-block w-100" alt="<?= $escape($slide['alt']) ?>" style="<?= $escape($slide['estilo']) ?> object-fit: cover;">
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                    <a class="carousel-control-prev" href="#vacantesCarousel" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Anterior</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#vacantesCarousel" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Siguiente</span>
                                                    </a>
                                                </div>

                                                <div class="container py-4">
                                                    <div class="row">
                                                        <div class="col-md-6 mb-9 mb-md-0">
                                                            <h4 class="text-primary mb-3">Vacantes<br> Docentes</h4>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h4 class="text-primary mb-3">Vacantes Administrativo</h4>
                                                        </div>
                                                        <p class="col-md-12 mb-4 mb-md-3">1. La postulación se realizará descargando y completando la información solicitada en el FORMATO DE HOJA DE VIDA.</p>
                                                        <p class="col-md-12 mb-4 mb-md-0">2. Enviar la hoja de vida en el formato de la Institución y los documentos de respaldo a <strong>rrhh@superarse.edu.ec</strong></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-center">
                                                <a href="<?= asset('assets/docs/MeritoyOposicion/PeriodoAcademico/Formatohojadevida.docx') ?>" download class="btn btn-primary">Descargar Formato CV</a>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php // MODAL PDF (inducción) ?>
                                <div class="modal fade" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="pdfModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-fullscreen-sm-down modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content rounded">
                                            <div class="modal-header rounded-top">
                                                <h5 class="modal-title" id="pdfModalLabel">Documento</h5>
                                                <a href="<?= asset('Induccion') ?>" class="btn btn-success ml-auto mr-2" target="_blank">Ir a la página</a>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body p-0 d-flex flex-column rounded-bottom" style="height: calc(100vh - 120px); max-height: 70vh;">
                                                <div class="embed-responsive embed-responsive-1by1 flex-grow-1" style="border-radius: 0 0 calc(.3rem - 1px) calc(.3rem - 1px); overflow: hidden;">
                                                    <iframe id="pdfFrame" src="" class="embed-responsive-item" frameborder="0"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php // MODAL ENTORNO LABORAL ?>
                                <div class="modal fade" id="entornoLaboralModal" tabindex="-1" role="dialog" aria-labelledby="entornoLaboralModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content rounded">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="entornoLaboralModalLabel">Nuestro Entorno Laboral</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h1 style="text-align: center;">Entorno Laboral</h1>
                                                <p class="text-justify mb-4">
                                                    En el Tecnológico Superarse, nos enorgullecemos de ofrecer un ambiente de trabajo dinámico,
                                                    colaborativo y enriquecedor. Creemos firmemente en el desarrollo profesional continuo y en
                                                    la creación de un espacio donde cada miembro pueda crecer y contribuir al éxito de nuestros estudiantes.
                                                </p>
                                                <div id="entornoCarousel" class="carousel slide" data-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <?php foreach ($entornoSlides as $index => $slide): ?>
                                                            <div class="carousel-item<?= $index === 0 ? ' active' : '' ?>">
                                                                <img src="<?= $escape($slide['src']) ?>" class="d-block w-100" alt="<?= $escape($slide['alt']) ?>" style="min-height: 30px; object-fit: cover;">
                                                                <div class="carousel-caption d-none d-md-block bg-dark opacity-75 rounded p-2">
                                                                    <h5 style="color: aqua;"><?= $escape($slide['titulo']) ?></h5>
                                                                    <p><?= $escape($slide['caption']) ?></p>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                    <a class="carousel-control-prev" href="#entornoCarousel" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Anterior</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#entornoCarousel" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Siguiente</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-------------------------------------------------- CONCURSO DE MÉRITOS Y OPOSICIÓN --------------------------------- -->
                    <div class="tab-pane fade" id="list-concurso" role="tabpanel" aria-labelledby="list-concurso-list">
                        <div class="row d-flex">
                            <div class="col-lg-4">
                                <?php foreach ($concursoGrupos as $grupo): ?>
                                    <h6 class="mb-3"><?= $escape($grupo['encabezado']) ?></h6>
                                    <div class="list-group pdf-submenu" role="tablist">
                                        <?php foreach ($grupo['items'] as $item): ?>
                                            <a class="list-group-item list-group-item-action" href="#" data-pdf-src="<?= $escape($item['pdfSrc']) ?>" data-canvas-id="<?= $escape($item['canvasId']) ?>"><?= $escape($item['label']) ?></a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <div class="col-lg-8 d-flex flex-column">
                                <div class="pdf-viewer-container border rounded shadow-sm bg-white">
                                    <canvas id="pdf-viewer-concurso" class="pdf-canvas"></canvas>
                                </div>
                                <div class="pdf-paginator" data-canvas-id="pdf-viewer-concurso">
                                    <button class="btn btn-primary" data-action="prev">Anterior</button>
                                    <span class="page-info">Página: <span class="page-num">0</span> / <span class="page-count">0</span></span>
                                    <button class="btn btn-primary" data-action="next">Siguiente</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-------------------------------------------------- CONVOCATORIA ------------------------------------------------------ -->
                    <div class="tab-pane fade" id="list-convocatoria" role="tabpanel" aria-labelledby="list-convocatoria-list">
                        <div class="row">
                            <div class="col-lg-4">
                                <?php foreach ($convocatoriaGrupos as $grupo): ?>
                                    <h6 class="mb-3"><?= $escape($grupo['encabezado']) ?></h6>
                                    <div class="list-group pdf-submenu" role="tablist">
                                        <?php foreach ($grupo['items'] as $item): ?>
                                            <a class="list-group-item list-group-item-action" href="#" data-pdf-src="<?= $escape($item['pdfSrc']) ?>" data-canvas-id="<?= $escape($item['canvasId']) ?>"><?= $escape($item['label']) ?></a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <div class="col-lg-8">
                                <div class="pdf-viewer-container border rounded shadow-sm bg-white">
                                    <canvas id="pdf-viewer-igualdad" class="pdf-canvas"></canvas>
                                </div>
                                <div class="pdf-paginator" data-canvas-id="pdf-viewer-igualdad">
                                    <button class="btn btn-primary" data-action="prev">Anterior</button>
                                    <span class="page-info">Página: <span class="page-num">0</span> / <span class="page-count">0</span></span>
                                    <button class="btn btn-primary" data-action="next">Siguiente</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!------------------------------------------------------- MEJORES EVALUADOS ---------------------------------------------------------- -->
                    <div class="tab-pane fade" id="list-mejores" role="tabpanel" aria-labelledby="list-mejores-list">
                        <h1 class="text-center">Mejores Evaluados</h1>
                        <p class="mb-4" style="text-align: justify;">En el Tecnológico Superarse cuidamos con esmero la selección de los
                            profesionales que conforman nuestro cuerpo docente. Su sólida formación académica y amplia trayectoria los
                            consolidan como referentes en sus respectivas áreas. Nos honra contar con su conocimiento, liderazgo y compromiso,
                            cualidades que enriquecen la excelencia académica de nuestras carreras.</p>
                        <div class="container-fluid py-5">
                            <div class="container">
                                <div id="carouselExampleAutoplay" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="2500">
                                    <div class="carousel-inner">
                                        <?php foreach ($mejoresEvaluados as $index => $slide): ?>
                                            <div class="carousel-item<?= $index === 0 ? ' active' : '' ?>">
                                                <img src="<?= $escape($slide['src']) ?>" class="d-block w-100 carousel-img-full" alt="<?= $escape($slide['alt']) ?>" />
                                                <div class="carousel-caption">
                                                    <h5 style="color: aqua;">Reconocimiento a los mejores evaluados</h5>
                                                    <p>Felicitaciones por su esfuerzo y dedicación, su desempeño es un ejemplo a seguir.</p>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplay" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplay" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <h1 style="text-align: center;">DOCENTES</h1>

                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex flex-wrap justify-content-center">
                                    <?php foreach ($docentes as $docente): ?>
                                        <div class="perfil-profesor text-center m-2 clickable-item" data-large-src="<?= $escape($docente['src']) ?>" data-name="<?= $escape($docente['nombre']) ?>">
                                            <img src="<?= $escape($docente['src']) ?>" alt="Foto de perfil" class="border rounded" style="width: 100px; height: 100px; object-fit: cover;">
                                            <h6><?= $escape($docente['nombre']) ?></h6>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <div id="contenedor-foto-grande" class="text-center d-none mt-4">
                                    <h4 id="nombre-profesor" class="mb-3"></h4>
                                    <img id="foto-principal" src="" alt="Foto informativa del profesor" class="img-fluid border rounded" style="max-width: 100%; max-height: 500px;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--------------------------------------------------- INFRAESTRUCTURA --------------------------------------------------->
                    <div class="tab-pane fade" id="list-infraestructura" role="tabpanel" aria-labelledby="list-infraestructura-list">
                        <div class="row">
                            <h1 class="text-center">CONOCE NUESTRA INFRAESTRUCTURA</h1>
                            <div>
                                <p>El Instituto Superior Tecnológico Superarse impulsa espacios educativos innovadores y sostenibles, donde la
                                    arquitectura integra funcionalidad, inclusión y respeto al entorno natural. Sus instalaciones modernas promueven
                                    el aprendizaje colaborativo y preparan a los estudiantes para un futuro resiliente y en armonía con la sociedad y
                                    el medio ambiente.</p>
                            </div>
                        </div>
                        <br>

                        <?php foreach ($infraestructura as $bloque): ?>
                            <div class="row">
                                <h3 style="text-align: center;"><?= $escape($bloque['titulo']) ?></h3>
                                <p><?= $escape($bloque['descripcion']) ?></p>
                                <br>
                                <div class="col-lg-12">
                                    <div class="image-carousel-container">
                                        <div class="image-carousel-wrapper">
                                            <div class="image-carousel-track">
                                                <?php foreach ($bloque['slides'] as $slide): ?>
                                                    <div class="image-carousel-item">
                                                        <?php foreach ($slide as $imagen): ?>
                                                            <img src="<?= $escape($imagen) ?>" alt="<?= $escape($bloque['titulo']) ?>">
                                                        <?php endforeach; ?>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        <?php endforeach; ?>
                    </div>

                    <!------------------------------------------------- S.S.O -------------------------------------------------------->
                    <div class="tab-pane fade" id="list-s.s.o" role="tabpanel" aria-labelledby="list-s.s.o-list">
                        <div class="row d-flex">
                            <h1 class="text-center">Unidad de Seguridad y Salud Ocupacional (SSO)</h1>
                            <div>
                                <p style="text-align: justify;">La Unidad de Seguridad y Salud Ocupacional del Instituto Superior Tecnológico
                                    Superarse garantiza entornos académicos seguros mediante la aplicación de protocolos de prevención de riesgos,
                                    planes de emergencia y normas de bioseguridad. Controla el uso adecuado de laboratorios, fomenta la correcta
                                    manipulación de equipos y materiales, exige protección personal y vela por la disposición responsable de desechos.
                                    Además, impulsa capacitaciones en primeros auxilios, prevención de accidentes y bienestar integral, consolidando una
                                    cultura institucional de seguridad y corresponsabilidad.</p>
                            </div>
                            <div class="d-flex justify-content-center flex-wrap gap-3">
                                <?php foreach ($ssoBotones as $boton): ?>
                                    <a href="<?= $escape(url($boton['enlace'])) ?>" target="_blank" class="btn btn-primary mx-2"><?= $escape($boton['label']) ?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <h3 style="text-align: center;">Pausas activas</h3>
                            <p>Las Pausas Activas en el Instituto Superior Tecnológico Superarse son breves intervenciones de 5 a 10 minutos que se
                                realizan durante la jornada académica y laboral para prevenir la fatiga, mejorar la postura, reducir el riesgo de
                                lesiones músculo-esqueléticas y promover el bienestar integral. Incluyen ejercicios de movilidad, estiramientos,
                                respiración y hábitos saludables como la hidratación y el descanso visual, adaptados a cada entorno (aulas,
                                laboratorios, oficinas), fomentando una cultura preventiva y de autocuidado que fortalece la salud y el rendimiento
                                de toda la comunidad institucional.</p>
                            <br>
                            <div class="col-lg-12">
                                <div class="image-carousel-container">
                                    <div class="image-carousel-wrapper">
                                        <div class="image-carousel-track">
                                            <?php foreach ($ssoPausas as $slide): ?>
                                                <div class="image-carousel-item">
                                                    <?php foreach ($slide as $imagen): ?>
                                                        <img src="<?= $escape($imagen) ?>" alt="Pausa activa">
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <h3 style="text-align: center;">Simulacros</h3>
                            <p>Los simulacros en el Instituto Superior Tecnológico Superarse son una estrategia clave de la Unidad de Seguridad y
                                Salud Ocupacional para preparar a la comunidad educativa ante emergencias. Permiten aplicar planes de evacuación, rutas
                                de escape y uso de equipos, fortaleciendo la coordinación interna y externa. Con enfoque pedagógico, incluyen evaluación
                                y retroalimentación para mejorar continuamente la respuesta institucional.</p>
                            <br>
                            <div class="col-lg-12">
                                <div class="image-carousel-container">
                                    <div class="image-carousel-wrapper">
                                        <div class="image-carousel-track">
                                            <?php foreach ($ssoSimulacros as $slide): ?>
                                                <div class="image-carousel-item">
                                                    <?php foreach ($slide as $imagen): ?>
                                                        <img src="<?= $escape($imagen) ?>" alt="Simulacro">
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!-- /.tab-content -->
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require ROOT_PATH . '/app/Views/layouts/main.php';