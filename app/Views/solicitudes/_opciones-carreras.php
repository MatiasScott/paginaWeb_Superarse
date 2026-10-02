<?php
// Opciones de carreras desde la tabla programas_academicos ($carreras lo define SolicitudesController).
?>
<option value="">Seleccione</option>
<?php foreach ($carreras ?? [] as $carrera): ?>
                    <option value="<?= htmlspecialchars($carrera, ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($carrera, ENT_QUOTES, 'UTF-8') ?></option>
<?php endforeach; ?>
