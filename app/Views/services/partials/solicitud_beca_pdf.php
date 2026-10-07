<?php
declare(strict_types=1);

$counts = array_count_values(array_column($tiposBeca, 0));
$printedCategories = [];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <style>
        @page { margin: 10mm; }
        body { font-family: 'Helvetica', sans-serif; font-size: 11px; color: #333; width: 100%; margin: 0; }
        .header-table { width: 100%; border-bottom: 2px solid #0B77BD; margin-bottom: 15px; border-collapse: collapse; table-layout: fixed; }
        .logo-section { width: 25%; text-align: left; }
        .title-section { width: 50%; text-align: center; }
        .info-section { width: 25%; text-align: right; font-size: 8px; color: #444; }
        .main-title { font-weight: bold; font-size: 16px; color: #0B77BD; }
        .form-line { margin-bottom: 12px; line-height: 1.6; text-align: justify; font-size: 12px; }
        .data-text { font-weight: bold; text-decoration: underline; color: #000; }
        table.becas { width: 100%; border-collapse: collapse; table-layout: fixed; margin-top: 10px; }
        table.becas th, table.becas td { border: 1px solid #ccc; padding: 4px; font-size: 9px; word-wrap: break-word; }
        table.becas th { background-color: #f2f2f2; }
        .signature-box { border: 1px solid #95a5a6; padding: 5px; height: 80px; width: 220px; text-align: center; }
        .signature-box img { max-height: 75px; max-width: 210px; }
        .footer { margin-top: 20px; font-size: 8px; text-align: center; color: #7f8c8d; border-top: 1px solid #ddd; padding-top: 10px; }
    </style>
</head>
<body>
    <div id="pdf-content">
        <table class="header-table">
            <tr>
                <td class="logo-section"><img src="<?php echo $logoPath; ?>" style="width: 110px;"></td>
                <td class="title-section"><div class="main-title">FICHA SOLICITUD BECA</div></td>
                <td class="info-section">
                    <div style="font-weight: bold; color: #0B77BD;">BIENESTAR INSTITUCIONAL</div>
                    <div>VERSIÓN: 001 | CÓDIGO: ISTS-GBI-001-001</div>
                    <div>FECHA: 04/04/2024</div>
                </td>
            </tr>
        </table>

        <div class="salutation">
            <?php echo $institucional['rectora']; ?><br />
            <strong><?php echo $institucional['instituto']; ?></strong><br /><?php echo $institucional['cargo']; ?>
        </div>

        <p>De mis consideraciones;</p>

        <div class="form-line">
            Yo, <span class="data-text"><?php echo $datos['nombre']; ?></span>, titular de la cédula/pasaporte No.
            <span class="data-text"><?php echo $datos['identificacion']; ?></span> solicito beca para el periodo académico
            <span class="data-text"><?php echo $datos['periodo']; ?></span> carrera de <span class="data-text"><?php echo $datos['carrera']; ?></span>
            en el <span class="data-text"><?php echo $datos['nivel']; ?></span> nivel.
        </div>

        <table class="becas">
            <thead>
                <tr>
                    <th style="width: 20%;">Tipo de Beca</th>
                    <th style="width: 68%;">Situación y/o justificación</th>
                    <th style="width: 12%;">Sel.</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tiposBeca as $value => $data): ?>
                    <tr>
                        <?php if (!in_array($data[0], $printedCategories, true)): ?>
                            <td rowspan="<?php echo $counts[$data[0]]; ?>" style="vertical-align:middle; font-weight:bold; text-align:center; background-color:#fafafa;"><?php echo $data[0]; ?></td>
                            <?php $printedCategories[] = $data[0]; ?>
                        <?php endif; ?>
                        <td><?php echo $data[1]; ?></td>
                        <td style="text-align:center; font-weight:bold; font-family:'DejaVu Sans', sans-serif;"><?php echo ($datos['tipo_beca'] === $value) ? '✔' : ''; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="closing" style="margin-top:15px;">Atentamente,</div>

        <div class="signature-container">
            <strong>Firma del Estudiante:</strong>
            <div class="signature-box">
                <?php if ($datos['firma_data_base64'] !== ''): ?>
                    <img src="<?php echo $datos['firma_data_base64']; ?>">
                <?php endif; ?>
            </div>
            <div style="margin-top: 8px;">
                <strong>C.I / Teléfono:</strong> <span class="data-text"><?php echo $datos['telefono']; ?></span>
            </div>
        </div>

        <div class="footer">
            Dirección: Av. General Rumiñahui e Isla Pinta 1111, Sangolquí<br />
            Teléfono: (02) 393-0980 | www.superarse.edu.ec
        </div>
    </div>
</body>
</html>