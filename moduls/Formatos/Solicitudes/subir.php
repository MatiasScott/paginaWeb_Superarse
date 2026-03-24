<?php
$tipo = $_GET['tipo'] ?? 'Solicitud Académica';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Subir Solicitud</title>

  <!-- Bootstrap 4 -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
      <link href="/assets/img/content/logo/superarse_gris.png" rel="icon" />

  <!-- Estilos propios -->
  <link rel="stylesheet" href="/css/style.css">

  <!-- NOTIFICACIÓN CENTRADA -->
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
  </style>
</head>

<body class="bg-light">

<div class="container-fluid bg-light position-relative shadow container-top"></div>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-6">

      <div class="card shadow">
        <div class="card-body">

          <h4 class="text-center mb-4">
            Subir <?= htmlspecialchars($tipo) ?>
          </h4>

          <form id="formSolicitud" enctype="multipart/form-data">

            <input type="hidden" name="tipo" value="<?= htmlspecialchars($tipo) ?>">

            <div class="form-group">
              <label>Archivo PDF</label>
              <input
                type="file"
                name="archivo"
                class="form-control"
                accept="application/pdf"
                required
              >
            </div>

            <button
              type="submit"
              id="btnEnviar"
              class="btn btn-success btn-block"
            >
              Enviar Solicitud
            </button>

          </form>

        </div>
      </div>

    </div>
  </div>
</div>

<!-- NOTIFICACIÓN -->
<div id="notificacion" class="notificacion d-none">
  <div id="notificacionContenido" class="alert text-center shadow mb-0"></div>
</div>

<script>
document.getElementById("formSolicitud").addEventListener("submit", function (e) {
    e.preventDefault();

    const form = this;
    const btn  = document.getElementById("btnEnviar");
    const data = new FormData(form);

    // Botón en estado enviando
    btn.disabled = true;
    btn.innerHTML = "⏳ Enviando solicitud...";

    fetch("/Formatos/Solicitudes/procesar_solicitud.php", {
        method: "POST",
        body: data
    })
    .then(res => res.json())
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
    .catch(() => {
        btn.disabled = false;
        btn.innerHTML = "Enviar Solicitud";
        mostrarNotificacion("danger", "❌ Error de conexión. Intente nuevamente.");
    });
});

function mostrarNotificacion(tipo, mensaje) {
    const contenedor = document.getElementById("notificacion");
    const contenido  = document.getElementById("notificacionContenido");

    contenido.className = `alert alert-${tipo} text-center shadow`;
    contenido.innerHTML = mensaje;

    contenedor.classList.remove("d-none");

    setTimeout(() => {
        contenedor.classList.add("d-none");
    }, 3500);
}
</script>

<script src="/js/moduls/header.js"></script>

</body>
</html>


