<?php
declare(strict_types=1);
// Vista MVC Servicios - Formatos / Solicitudes Estudiantiles (render server-side)
$title = $title ?? 'Solicitudes Estudiantiles';
$formatos = $formatos ?? [];

$extraStyles = asset('css/solicitudes-enviar.css');
$extraScripts = [asset('js/app/modules/services/solicitudes-enviar.js')];

$escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

ob_start();
?>

<div class="container-fluid container-top">
    <div class="container">
        <!-- CABECERA ORIGINAL (Sin ningún cambio de estructura ni formato) -->
        <div class="text-center pb-2">
            <p class="section-title px-5">
                <span class="px-2">FORMATOS</span>
            </p>
            <h3 class="mb-4">De <br />Solicitudes Estudiantiles</h3>
            <h3 class="alert alert-warning text-center py-2" style="font-size: 1.25rem;">
                &#9888;&#65039; <strong>&iexcl;Atenci&oacute;n!</strong> Subir firmado manualmente o digitalmente
            </h3>
        </div>

        <!-- Cards con diseño mejorado y estructura original de variables -->
        <div class="row justify-content-center">
            <?php foreach ($formatos as $formato): ?>
                <div class="col-sm-10 col-md-6 col-lg-4 mb-4">
                    <div class="card card-format h-100 mx-auto d-flex flex-column justify-content-between">
                        <div>
                            <!-- Imagen original con badge flotante de icono -->
                            <div class="card-img-top-wrapper">
                                <img src="<?= asset('assets/img/solicitud.jpg') ?>" class="card-img-top" alt="<?= $escape((string) $formato['titulo']) ?>">
                                <div class="icon-badge">
                                    <i class="<?= $escape((string) ($formato['icono'] ?? 'fas fa-file-alt')) ?> text-primary"></i>
                                </div>
                            </div>

                            <div class="card-body text-center pt-4 px-3 pb-2">
                                <h5 class="card-title font-weight-bold text-dark mt-2 mb-2">
                                    <?= $escape((string) $formato['titulo']) ?>
                                </h5>
                                <p class="card-text text-muted small mb-3">
                                    <?= $escape((string) $formato['descripcion']) ?>
                                </p>
                            </div>
                        </div>

                        <!-- Botones originales con diseño estilizado -->
                        <div class="card-footer bg-transparent border-0 pt-0 pb-3 px-3">
                            <div class="d-flex justify-content-center gap-2 flex-wrap">
                                <?php if (!empty($formato['generar'])): ?>
                                    <a href="<?= $escape(url((string) $formato['generar']['url'])) ?>" class="btn btn-soft-primary btn-sm flex-fill" target="_blank">
                                        <i class="fas fa-file-alt mr-1"></i> <?= $escape((string) $formato['generar']['texto']) ?>
                                    </a>
                                <?php endif; ?>

                                <?php if (!empty($formato['llenar'])): ?>
                                    <a href="<?= $escape(url((string) $formato['llenar']['url'])) ?>" class="btn btn-soft-primary btn-sm flex-fill" target="_blank">
                                        <i class="fas fa-file-alt mr-1"></i> <?= $escape((string) $formato['llenar']['texto']) ?>
                                    </a>
                                <?php endif; ?>

                                <?php if (!empty($formato['subir'])): ?>
                                    <button type="button" class="btn btn-success btn-sm w-100 mt-2 font-weight-bold shadow-sm" 
                                            data-toggle="modal"
                                            data-target="#solicitudEnviarModal"
                                            data-tipo="<?= $escape((string) $formato['subir']['tipo']) ?>"
                                            title="Enviar por correo la solicitud firmada y el comprobante de pago">
                                        <i class="fas fa-upload mr-1"></i> <?= $escape((string) $formato['subir']['texto']) ?>
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Modal de envío por correo (backend PHPMailer -> /Solicitudes/procesar) -->
<div class="modal fade solicitud-enviar-modal" id="solicitudEnviarModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header modal-header-institutional">
                <h5 class="modal-title font-weight-bold">
                    <i class="fas fa-envelope mr-2"></i>Enviar Solicitud Firmada
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form id="solicitudEnviarForm" novalidate>
                <div class="modal-body p-4">
                    <input type="hidden" id="solicitudEnviarTipo" name="tipo" value="" />

                    <div class="alert alert-warning solicitud-enviar-aviso border-0 shadow-sm py-2 mb-4">
                        <i class="fas fa-info-circle mr-1"></i>
                        La solicitud firmada se enviará al correo institucional de matr&iacute;culas para su tr&aacute;mite.
                    </div>

                    <div id="solicitudEnviarStatus" class="alert solicitud-enviar-status" style="display:none;"></div>

                    <div class="row">
                        <!-- Correo del Estudiante -->
                        <div class="col-md-6 form-group mb-3">
                            <label for="solicitudEnviarFrom" class="font-weight-bold text-dark small">
                                <i class="fas fa-user-graduate text-success mr-1"></i>Correo del estudiante <span class="text-danger">*</span>
                            </label>
                            <input type="email" id="solicitudEnviarFrom" name="from_email" class="form-control"
                                   placeholder="tu.correo@ejemplo.com" required />
                            <small class="form-text text-muted">Aqu&iacute; llegar&aacute; la confirmaci&oacute;n de su env&iacute;o.</small>
                        </div>

                        <!-- Destinatario -->
                        <div class="col-md-6 form-group mb-3">
                            <label for="solicitudEnviarTo" class="font-weight-bold text-dark small">
                                <i class="fas fa-university text-success mr-1"></i>Destinatario
                            </label>
                            <input type="email" id="solicitudEnviarTo" class="form-control bg-light"
                                   value="matriculas@superarse.edu.ec" readonly />
                        </div>
                    </div>

                    <hr class="my-3">

                    <!-- Carga de Archivos -->
                    <div class="row">
                        <!-- Solicitud Firmada (PDF) -->
                        <div class="col-md-6 form-group mb-3">
                            <label for="solicitudEnviarSolicitud" class="font-weight-bold text-dark small">
                                <i class="fas fa-file-pdf text-danger mr-1"></i>Solicitud firmada (PDF) <span class="text-danger">*</span>
                            </label>
                            <div class="upload-box">
                                <i class="fas fa-file-pdf fa-2x text-danger mb-2"></i>
                                <div class="custom-file mb-1">
                                    <input type="file" class="custom-file-input" id="solicitudEnviarSolicitud"
                                           name="archivo_solicitud" accept="application/pdf" required />
                                    <label class="custom-file-label text-left" for="solicitudEnviarSolicitud">Seleccionar PDF firmado...</label>
                                </div>
                                <small class="form-text text-muted d-block mt-2">Solo PDF, m&aacute;ximo 5MB.</small>
                            </div>
                        </div>

                        <!-- Comprobante / Voucher -->
                        <div class="col-md-6 form-group mb-3">
                            <label for="solicitudEnviarAnexo" class="font-weight-bold text-dark small">
                                <i class="fas fa-file-invoice-dollar text-success mr-1"></i>Comprobante / Baucher de pago <span class="text-danger">*</span>
                            </label>
                            <div class="upload-box">
                                <i class="fas fa-receipt fa-2x text-success mb-2"></i>
                                <div class="custom-file mb-1">
                                    <input type="file" class="custom-file-input" id="solicitudEnviarAnexo"
                                           name="archivo_anexo" accept="application/pdf,image/jpeg,image/png" required />
                                    <label class="custom-file-label text-left" for="solicitudEnviarAnexo">Seleccionar comprobante...</label>
                                </div>
                                <small class="form-text text-muted d-block mt-2">PDF, JPG o PNG, m&aacute;ximo 5MB.</small>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer bg-light px-4 py-3">
                    <button type="button" class="btn btn-secondary font-weight-bold" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="solicitudEnviarSubmit" class="btn btn-success font-weight-bold px-4">
                        <i class="fas fa-paper-plane mr-1"></i>Enviar por correo
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require dirname(__DIR__) . '/layouts/main.php';