<?php
$tipo = $_GET['tipo'] ?? 'Solicitud Académica';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Subir Solicitud</title>
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>

<body class="bg-light">
  
<div class="container-fluid bg-light position-relative shadow container-top"></div>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-6">

      <div class="card shadow">
        <div class="card-body">
          <h4 class="text-center mb-4">Subir <?= htmlspecialchars($tipo) ?></h4>

          <form action="/enviar_solicitud.php" method="POST" enctype="multipart/form-data">
            
            <!-- Enviar el tipo de solicitud -->
            <input type="hidden" name="tipo" value="<?= htmlspecialchars($tipo) ?>">

            <div class="form-group">
              <label>Archivo PDF</label>
              <input type="file" name="archivo" class="form-control" accept="application/pdf" required>
            </div>

            <button type="submit" class="btn btn-success btn-block">
              <i class="fas fa-paper-plane"></i> Enviar Solicitud
            </button>

          </form>

        </div>
      </div>

    </div>
  </div>
</div>

</body>
</html>