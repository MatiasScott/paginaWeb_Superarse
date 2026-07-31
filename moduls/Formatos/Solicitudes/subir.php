<?php
$tipo = $_GET['tipo'] ?? 'Solicitud Académica';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Solicitud - Superarse</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="/assets/img/content/logo/superarse_gris.png" rel="icon" />
    <link rel="stylesheet" href="/css/style.css">

    <style>
        .notificacion {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2000;
            min-width: 320px;
            max-width: 90%;
        }
        .card {
            border-radius: 12px;
            border: none;
        }
        .btn-success {
            background-color: #198754;
            border: none;
        }
        .form-label-bold {
            font-weight: 1000;
            color: #495057;
            display: block;
            margin-bottom: 5px;
        }
    </style>
</head>

<body class="bg-light">

<div class="container-fluid bg-light position-relative shadow container-top"></div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">

            <div class="card shadow">
                <div class="card-body p-4">

                    <h4 class="text-center mb-4 font-weight-bold">
                        Subir <?= htmlspecialchars($tipo) ?>
                    </h4>

                    <form id="formSolicitud" enctype="multipart/form-data">
                        <input type="hidden" name="tipo" value="<?= htmlspecialchars($tipo) ?>">

                        <div class="alert alert-warning text-center py-2" style="font-size: 0.95rem; border-radius: 8px;">
                            ⚠️ <strong>¡Atención!</strong> Subir firmado manualmente o digitalmente. OBLIGATORIO
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label-bold">1. Archivo PDF (Solicitud) *</label>
                            <input
                                type="file"
                                name="archivo_solicitud"
                                id="archivoSolicitud"
                                class="form-control"
                                accept="application/pdf"
                                required
                            >
                            <p class="form-text text-muted mb-0" style="font-size: 1.2rem;">Este documento es obligatorio.</p>
                        </div>

                       <div class="form-group mb-4">
                        <label class="form-label-bold">2. Comprobante de pago *</label>
                           <input
                             type="file"
                             name="archivo_anexo"
                             id="archivoAnexo"
                             class="form-control"
                             accept="application/pdf, image/jpeg, image/png"
                             required
                        >
                        <p class="form-text text-muted mb-0" style="font-size: 1.2rem;">
                         Sube tu comprobante </b>.
                        </p>
                        </div>

                        <div class="text-center mb-2">
                             <small class="text-secondary">Máximo 5MB permitido por cada archivo.</small>
                        </div>

                        <div class="d-flex justify-content-between mt-3">
                            <a href="javascript:history.back()" class="btn btn-secondary" style="width: 48%; border-radius: 8px;">
                                Volver
                            </a>
                
                            <button type="submit" id="btnEnviar" class="btn btn-success" style="width: 48%; border-radius: 8px;">
                                Enviar Solicitud
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<div id="notificacion" class="notificacion d-none">
    <div id="notificacionContenido" class="alert text-center shadow mb-0" style="border-radius: 10px; padding: 20px;"></div>
</div>

<script>
document.getElementById("formSolicitud").addEventListener("submit", function (e) {
    e.preventDefault();

    const form = this;
    const btn  = document.getElementById("btnEnviar");
    const data = new FormData(form);

    // Desactivar botón para evitar múltiples envíos
    btn.disabled = true;
    btn.innerHTML = "⏳ Enviando solicitud...";

    // Fetch hacia el procesador PHP
    fetch("procesar_solicitud.php", { 
        method: "POST",
        body: data
    })
    .then(response => {
        if (!response.ok) throw new Error("Error en el servidor");
        return response.json();
    })
    .then(res => {
        btn.disabled = false;
        btn.innerHTML = "Enviar Solicitud";

        mostrarNotificacion(
            res.success ? "success" : "danger",
            res.success ? "✅ " + res.message : "⚠️ " + res.message
        );

        if (res.success) {
            form.reset();
        }
    })
    .catch(error => {
        btn.disabled = false;
        btn.innerHTML = "Enviar Solicitud";
        console.error("Error detallado:", error);
        mostrarNotificacion("danger", "❌ Error de conexión o el archivo es muy pesado.");
    });
});

function mostrarNotificacion(tipo, mensaje) {
    const contenedor = document.getElementById("notificacion");
    const contenido  = document.getElementById("notificacionContenido");

    contenido.className = `alert alert-${tipo} text-center shadow`;
    contenido.innerHTML = mensaje;

    contenedor.classList.remove("d-none");

    // Ocultar automáticamente después de 5 segundos
    setTimeout(() => {
        contenedor.classList.add("d-none");
    }, 5000);
}
</script>

<script src="/js/moduls/header.js?v=1"></script>

</body>
</html>