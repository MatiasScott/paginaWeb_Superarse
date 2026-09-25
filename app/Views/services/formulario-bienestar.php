<?php
declare(strict_types=1);

$periodos      = $model->periodos();
$carreras      = $model->carreras();
$niveles       = $model->niveles();
$grupos        = $model->tiposBecaAgrupados();
$headerVal     = $model->header();
$institucional = $model->datosInstitucionales();
?>
<div id="pdf-content">
    <div class="container">
        <form id="becaForm" action="<?= asset('Formulario-Bienestar/enviar') ?>" method="POST">

            <div class="header-responsive">
                <div class="logo-section">
                    <div class="logo">
                        <img src="<?= asset('assets/img/services/formularioBienestar/Logo-Superarse-Negativo.png') ?>" alt="Logo de Superarse">
                    </div>
                </div>
                <div class="title-section">
                    <div class="main-title"><?php echo $headerVal['titulo']; ?></div>
                </div>
                <div class="info-section">
                    <div class="institutional"><?php echo $headerVal['institucional']; ?></div>
                    <div class="version"><?php echo $headerVal['version']; ?></div>
                    <div class="code"><?php echo $headerVal['codigo']; ?></div>
                    <div class="date"><?php echo $headerVal['fecha']; ?></div>
                </div>
            </div>

            <div class="salutation">
                <p><?php echo $institucional['rectora']; ?><br><?php echo $institucional['instituto']; ?><br><?php echo $institucional['cargo']; ?></p>
            </div>
            <p style="font-size: 13px; margin: 5px 0;">De mis consideraciones;</p>

            <div class="form-line">
                <label>Yo,</label>
                <input type="text" class="line-input" name="nombre" id="nombre" required placeholder="Nombres completos" style="width: 280px;">
                <label>, titular de la cédula de identidad/pasaporte No.</label>
                <input type="text" class="line-input" name="identificacion" required placeholder="Nº de ID" style="width: 120px;" maxlength="10">
            </div>

            <div class="form-line">
                <label>por la presente solicito una beca para el periodo académico</label>
                <select class="line-input" name="periodo" required>
                    <option value="">Seleccione el periodo</option>
                    <?php foreach ($periodos as $valor => $etiqueta): ?>
                        <option value="<?php echo $valor; ?>"><?php echo $etiqueta; ?></option>
                    <?php endforeach; ?>
                </select>
                <label>correspondiente a la carrera de</label>
                <select class="line-input-carrera" name="carrera" required style="width: 350px;">
                    <option value="">Seleccione la carrera</option>
                    <?php foreach ($carreras as $carrera): ?>
                        <option value="<?php echo $carrera; ?>"><?php echo $carrera; ?></option>
                    <?php endforeach; ?>
                </select>
                <label>en el</label>
                <select class="line-input" name="nivel" required style="width: 100px;">
                    <option value="">Seleccione</option>
                    <?php foreach ($niveles as $nivel): ?>
                        <option value="<?php echo $nivel; ?>"><?php echo $nivel; ?></option>
                    <?php endforeach; ?>
                </select>
                <label>nivel.</label>
            </div>

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th width="20%">Tipo de Beca</th>
                            <th width="60%">Situación y/o justificación</th>
                            <th width="20%">Seleccione</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($grupos as $categoria => $items): ?>
                            <tr>
                                <td rowspan="<?php echo count($items); ?>"><?php echo $categoria; ?></td>
                                <td><?php echo $items[0]['justificacion']; ?></td>
                                <td class="radio-group"><input type="radio" name="tipo_beca" value="<?php echo $items[0]['clave']; ?>"></td>
                            </tr>
                            <?php foreach (array_slice($items, 1) as $item): ?>
                                <tr>
                                    <td><?php echo $item['justificacion']; ?></td>
                                    <td class="radio-group"><input type="radio" name="tipo_beca" value="<?php echo $item['clave']; ?>"></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="closing"><p>Por la atención a la presente, anticipo mis agradecimientos.<br>Atentamente,</p></div>

            <div class="signature-container">
                <div class="signature-label">Firma:</div>
                <div class="signature-box">
                    <canvas id="signature-pad-canvas"></canvas>
                    <button class="signature-clear" id="clear-signature" type="button">Limpiar</button>
                </div>
                <input type="hidden" name="firma_data_base64" id="firmaDataBase64">
            </div>

            <div class="form-line">
                <label>C.I:</label>
                <input type="tel" class="line-input" name="telefono" required placeholder="Numero C.I/Pasaporte " style="width: 180px;" maxlength="10">
            </div>

            <div class="footer">
                <?php echo $institucional['direccion']; ?><br>
                <?php echo $institucional['contacto']; ?>
            </div>
        </form>
    </div>
</div>

<div class="buttons-container">
    <button type="button" class="action-button" id="generate-pdf-btn">Enviar Solicitud y Descargar PDF</button>
</div>