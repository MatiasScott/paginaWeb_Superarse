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
        <div class="text-center pb-2">
            <p class="section-title px-5">
                <span class="px-2">FORMATOS</span>
            </p>
            <h3 class="mb-4">De <br />Solicitudes Estudiantiles</h3>
            <h3 class="alert alert-warning text-center py-2" style="font-size: 1.25rem;">
                &#9888;&#65039; <strong>&iexcl;Atenci&oacute;n!</strong> Subir firmado manualmente o digitalmente
            </h3>
        </div>

        <div class="row justify-content-center">
            <?php foreach ($formatos as $formato): ?>
                <div class="col-sm-10 col-md-6 col-lg-4 mb-4">
                    <div class="card card-custom h-100 mx-auto">
                        <img src="<?= asset('assets/img/solicitud.jpg') ?>" class="card-img-top" alt="<?= $escape((string) $formato['titulo']) ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title">
                                <i class="<?= $escape((string) $formato['icono']) ?> text-primary mr-2"></i>
                                <?= $escape((string) $formato['titulo']) ?>
                            </h5>
                            <p class="card-text">
                                <?= $escape((string) $formato['descripcion']) ?>
                            </p>
                            <div class="d-flex justify-content-center gap-2 flex-wrap">
                                <?php if (!empty($formato['generar'])): ?>
                                    <a href="<?= $escape((string) $formato['generar']['url']) ?>" class="btn btn-primary" target="_blank">
                                        <i class="fas fa-file-alt"></i> <?= $escape((string) $formato['generar']['texto']) ?>
                                    </a>
                                <?php endif; ?>
                                <?php if (!empty($formato['llenar'])): ?>
                                    <a href="<?= $escape((string) $formato['llenar']['url']) ?>" class="btn btn-primary" target="_blank">
                                        <i class="fas fa-file-alt"></i> <?= $escape((string) $formato['llenar']['texto']) ?>
                                    </a>
                                <?php endif; ?>
                                <?php if (!empty($formato['subir'])): ?>
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#solicitudEnviarModal"
                                            data-tipo="<?= $escape((string) $formato['subir']['tipo']) ?>"
                                            title="Enviar por correo la solicitud firmada y el comprobante de pago">
                                        <i class="fas fa-upload"></i> <?= $escape((string) $formato['subir']['texto']) ?>
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
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-envelope mr-2"></i>Enviar Solicitud Firmada
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="solicitudEnviarForm" novalidate>
                <div class="modal-body">
                    <input type="hidden" id="solicitudEnviarTipo" name="tipo" value="" />
                    <div class="alert alert-warning solicitud-enviar-aviso py-2">
                        <i class="fas fa-info-circle mr-1"></i>
                        La solicitud firmada se enviará al correo institucional de matr&iacute;culas para su tr&aacute;mite.
                    </div>
                    <div id="solicitudEnviarStatus" class="alert solicitud-enviar-status" style="display:none;"></div>
                    <div class="form-group">
                        <label for="solicitudEnviarFrom">
                            <i class="fas fa-user-graduate text-success mr-1"></i>Correo del estudiante <span class="text-danger">*</span>
                        </label>
                        <input type="email" id="solicitudEnviarFrom" name="from_email" class="form-control"
                               placeholder="tu.correo@ejemplo.com" required />
                        <small class="form-text text-muted">Aqu&iacute; llegar&aacute; la confirmaci&oacute;n de su env&iacute;o.</small>
                    </div>
                    <div class="form-group">
                        <label for="solicitudEnviarSolicitud">
                            <i class="fas fa-file-pdf text-danger mr-1"></i>Solicitud firmada (PDF) <span class="text-danger">*</span>
                        </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="solicitudEnviarSolicitud"
                                   name="archivo_solicitud" accept="application/pdf" required />
                            <label class="custom-file-label" for="solicitudEnviarSolicitud">Seleccionar el PDF firmado...</label>
                        </div>
                        <small class="form-text text-muted">Solo PDF, m&aacute;ximo 5MB.</small>
                    </div>
                    <div class="form-group">
                        <label for="solicitudEnviarAnexo">
                            <i class="fas fa-file-invoice-dollar text-success mr-1"></i>Comprobante / Baucher de pago <span class="text-danger">*</span>
                        </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="solicitudEnviarAnexo"
                                   name="archivo_anexo" accept="application/pdf,image/jpeg,image/png" required />
                            <label class="custom-file-label" for="solicitudEnviarAnexo">Seleccionar el comprobante...</label>
                        </div>
                        <small class="form-text text-muted">PDF, JPG o PNG, m&aacute;ximo 5MB.</small>
                    </div>
                    <div class="form-group">
                        <label for="solicitudEnviarTo">
                            <i class="fas fa-university text-success mr-1"></i>Destinatario
                        </label>
                        <input type="email" id="solicitudEnviarTo" class="form-control"
                               value="matriculas@superarse.edu.ec" readonly />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="solicitudEnviarSubmit" class="btn btn-success">
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