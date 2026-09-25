// MVC Servicios - Modal "Subir solicitud" | Envío por el backend propio (/Solicitudes/procesar -> PHPMailer)
(function ($) {
    'use strict';

    const modal = $('#solicitudEnviarModal');
    const form = $('#solicitudEnviarForm');

    if (!modal.length || !form.length) return;

    const ENDPOINT = APP.asset('Solicitudes/procesar');
    const MAX_BYTES = 5 * 1024 * 1024;

    const tipoEl = $('#solicitudEnviarTipo');
    const fromEl = $('#solicitudEnviarFrom');
    const solicitudEl = $('#solicitudEnviarSolicitud');
    const anexoEl = $('#solicitudEnviarAnexo');
    const statusEl = $('#solicitudEnviarStatus');
    const submitBtn = $('#solicitudEnviarSubmit');

    const TIPOS_PERMITIDOS_SOLICITUD = ['application/pdf'];
    const TIPOS_PERMITIDOS_ANEXO = ['application/pdf', 'image/jpeg', 'image/png'];

    const LIMPIAR_STATUS_COLS = 'solicitud-enviar-success solicitud-enviar-error';

    function mostrarStatus(tipo, texto) {
        statusEl.removeClass(LIMPIAR_STATUS_COLS)
            .addClass('solicitud-enviar-' + tipo)
            .html(texto)
            .show();
    }

    function ocultarStatus() {
        statusEl.removeClass(LIMPIAR_STATUS_COLS).hide();
    }

    function actualizarEtiqueta(input, texto) {
        const etiqueta = $(input).next('.custom-file-label');
        if (etiqueta.length) {
            etiqueta.text(input.files[0] ? input.files[0].name : texto);
        }
    }

    function validarArchivo(input, tipos, nombreCampo, esObligatorio) {
        const archivo = input.files && input.files[0];
        if (!archivo) {
            return esObligatorio ? nombreCampo + ' es obligatorio.' : null;
        }
        if (archivo.size > MAX_BYTES) {
            return nombreCampo + ' supera los 5MB permitidos.';
        }
        if (tipos.indexOf(archivo.type) === -1) {
            return nombreCampo + ' debe ser ' + (tipos.indexOf('application/pdf') !== -1 ? 'PDF' : 'PDF, JPG o PNG') + '.';
        }
        return null;
    }

    modal.on('show.bs.modal', function (evento) {
        const boton = $(evento.relatedTarget);
        const tipo = boton.data('tipo') || 'Solicitud Académica';
        tipoEl.val(tipo);
        ocultarStatus();
        form[0].reset();
        $('#solicitudEnviarSolicitud').next('.custom-file-label').text('Seleccionar el PDF firmado...');
        $('#solicitudEnviarAnexo').next('.custom-file-label').text('Seleccionar el comprobante...');
        setTimeout(function () { fromEl.trigger('focus'); }, 100);
    });

    modal.on('hidden.bs.modal', function () {
        form[0].reset();
        $('#solicitudEnviarSolicitud').next('.custom-file-label').text('Seleccionar el PDF firmado...');
        $('#solicitudEnviarAnexo').next('.custom-file-label').text('Seleccionar el comprobante...');
        ocultarStatus();
    });

    solicitudEl.on('change', function () { actualizarEtiqueta(this, 'Seleccionar el PDF firmado...'); });
    anexoEl.on('change', function () { actualizarEtiqueta(this, 'Seleccionar el comprobante...'); });

    form.on('submit', function (evento) {
        evento.preventDefault();
        ocultarStatus();

        if (!fromEl[0].checkValidity()) {
            fromEl[0].reportValidity();
            return;
        }

        const errorSolicitud = validarArchivo(solicitudEl[0], TIPOS_PERMITIDOS_SOLICITUD, 'La solicitud firmada', true);
        if (errorSolicitud) {
            mostrarStatus('error', '<i class="fas fa-exclamation-triangle mr-1"></i>' + errorSolicitud);
            return;
        }

        const errorAnexo = validarArchivo(anexoEl[0], TIPOS_PERMITIDOS_ANEXO, 'El comprobante / baucher', true);
        if (errorAnexo) {
            mostrarStatus('error', '<i class="fas fa-exclamation-triangle mr-1"></i>' + errorAnexo);
            return;
        }

        const datos = new FormData();
        datos.append('tipo', $.trim(tipoEl.val()));
        datos.append('from_email', $.trim(fromEl.val()));
        datos.append('archivo_solicitud', solicitudEl[0].files[0]);
        datos.append('archivo_anexo', anexoEl[0].files[0]);

        submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin mr-1"></i>Enviando...');

        fetch(ENDPOINT, {
            method: 'POST',
            body: datos,
            headers: { 'Accept': 'application/json' },
        })
        .then(function (respuesta) {
            return respuesta.json().catch(function () {
                return { success: false, message: 'Respuesta no válida del servidor.' };
            }).then(function (datosResp) {
                if (respuesta.ok && datosResp.success) {
                    return datosResp;
                }
                throw new Error(datosResp.message || 'Error al enviar el correo.');
            });
        })
        .then(function (datosResp) {
            const destinatario = $('<span>').text(toVal()).html();
            mostrarStatus('success', '<i class="fas fa-check-circle mr-1"></i>&iexcl;' + datosResp.message + ' (' + destinatario + ')!');
            submitBtn.prop('disabled', false).html('<i class="fas fa-paper-plane mr-1"></i>Enviar por correo');
            setTimeout(function () {
                modal.modal('hide');
            }, 1800);
        })
        .catch(function (error) {
            console.error('Envío solicitud:', error);
            mostrarStatus('error', '<i class="fas fa-exclamation-triangle mr-1"></i>' + $('<span>').text(error.message).html());
            submitBtn.prop('disabled', false).html('<i class="fas fa-paper-plane mr-1"></i>Enviar por correo');
        });
    });

    function toVal() {
        return $('#solicitudEnviarTo').val() || 'matriculas@superarse.edu.ec';
    }
})(jQuery);