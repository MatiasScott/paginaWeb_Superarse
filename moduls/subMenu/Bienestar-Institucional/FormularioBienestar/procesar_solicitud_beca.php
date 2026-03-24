<?php

// Activa la depuración de errores de PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Incluye el autoloader de Composer para cargar las librerías (mPDF y PHPMailer)
require __DIR__ . '/vendor/autoload.php';

use Mpdf\Mpdf;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// 1. Recopilar y validar los datos del formulario enviados por POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo 'Método de solicitud no válido.';
    exit;
}

// 2. Extraer y sanitizar los datos del formulario
$nombre = htmlspecialchars($_POST['nombre'] ?? '');
$identificacion = htmlspecialchars($_POST['identificacion'] ?? '');
$periodo = htmlspecialchars($_POST['periodo'] ?? '');
$carrera = htmlspecialchars($_POST['carrera'] ?? '');
$nivel = htmlspecialchars($_POST['nivel'] ?? '');
$tipo_beca = htmlspecialchars($_POST['tipo_beca'] ?? '');
$firma_data_base64 = $_POST['firma_data_base64'] ?? '';
$telefono = htmlspecialchars($_POST['telefono'] ?? '');


// Validación básica de campos obligatorios
if (empty($nombre) || empty($identificacion) || empty($firma_data_base64)) {
    http_response_code(400);
    echo 'Error: Por favor, complete todos los campos obligatorios y firme el documento.';
    exit;
}

// 3. Definir la lista completa de becas y sus textos (para la tabla dinámica)
$tipos_beca_disponibles = [
    'excelencia_bachillerato' => ['Excelencia Académica', 'Mérito académico en bachillerato.'],
    'excelencia_institucional' => ['Excelencia Académica', 'Mérito académico institucional.'],
    'socioeconomica' => ['Socioeconómica', 'Apoyo solidario. Desempleo. Familiar.'],
    'discapacidad' => ['Inclusión o Inclusiva', 'Discapacidad'],
    'enfermedades' => ['Inclusión o Inclusiva', 'Enfermedades catastróficas.'],
    'pueblos' => ['Inclusión o Inclusiva', 'Pueblos y Nacionalidades del Ecuador.'],
    'futuro_femenino' => ['Inclusión o Inclusiva', 'Futuro Femenino.'],
    'deportivo_cultural' => ['Especial', 'Mérito Deportivo, Mérito Cultural'],
    'educacion_continua' => ['Especial', 'Educación continua'],
    'clubes' => ['Especial', 'Clubes Institucionales'],
    'colaborativa' => ['Especial', 'Colaborativa'],
    'superarse' => ['Especial', 'Beca Superarse (Convenio de Cooperación)'],
];

// 4. Generar el contenido HTML del PDF dinámicamente
ob_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Solicitud de Beca - <?php echo $nombre; ?></title>
    <style>
        /* Estilos generales */
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 14px; color: #333; }
        #pdf-content { width: 100%; max-width: 900px; padding: 20px; }
        
        /* Estilos del encabezado usando TABLE para compatibilidad con mPDF */
        .header-table { width: 100%; border-bottom: 2px solid #2c3e50; margin-bottom: 20px; border-collapse: collapse; }
        .header-table td { padding: 0; vertical-align: top; }
        .logo-section { width: 25%; text-align: left; }
        .title-section { width: 50%; text-align: center; }
        .info-section { width: 25%; text-align: right; font-size: 12px; color: #7f8c8d; }
        .main-title { font-weight: bold; font-size: 20px; margin: 0; color: #2c3e50; line-height: 1.2; }
        .institutional { font-weight: bold; color: #2c3e50; }

        /* Estilos de contenido */
        .salutation, .closing { margin: 2px 0; line-height: 1.5; font-size: 14px; }
        .form-line { margin-bottom: 10px; }
        .form-line span { font-weight: bold; border-bottom: 1px solid #95a5a6; padding: 0 5px; }
        .table-responsive { margin: 20px 0; border: 1px solid #ddd; border-radius: 5px; width: 100%; }
        table { width: 100%; border-collapse: collapse; font-size: 13px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; text-align: center; font-weight: 600; }
        .radio-group { text-align: center; }
        .signature-container { margin: 25px 0 15px; }
        .signature-label { font-weight: bold; margin-bottom: 8px; font-size: 14px; }
        .signature-box { border: 1px solid #95a5a6; padding: 5px; height: 120px; text-align: center; }
        .footer { margin-top: 15px; padding-top: 10px; border-top: 1px solid #ddd; font-size: 12px; text-align: center; color: #7f8c8d; }
    </style>
</head>
<body>
    <div id="pdf-content">
        
        <table class="header-table">
            <tr>
                <td class="logo-section">
                    <img src="assets/img/Logo-Superarse-Negativo.png" alt="Logo de Superarse" style="width: 150px; height: auto; background-color: #3498db; color: white;">
                </td>
                <td class="title-section">
                    <div class="main-title">FICHA SOLICITUD BECA</div>
                </td>
                <td class="info-section">
                    <div class="institutional">BIENESTAR INSTITUCIONAL</div>
                    <div class="version">VERSIÓN: 001</div>
                    <div class="code">CÓDIGO: ISTS-GBI-001-001</div>
                    <div class="date">FECHA: 04/04/2024</div>
                </td>
            </tr>
        </table>
        <div class="salutation"><p>Ing. Verónica Tamayo, MSc.<br>INSTITUTO SUPERIOR TECNOLÓGICO SUPERARSE<br>Rectora</p></div>
        <p>De mis consideraciones;</p>
        <div class="form-line">
            <label>Yo,</label>
            <span><?php echo $nombre; ?></span>
            <label>, titular de la cédula de identidad/pasaporte No.</label>
            <span><?php echo $identificacion; ?></span>
             <label>por la presente solicito una beca para el periodo académico</label>
            <span><?php echo $periodo; ?></span>
            <label>correspondiente a la carrera de</label>
            <span><?php echo $carrera; ?></span>
            <label>en el</label>
            <span><?php echo $nivel; ?></span>
            <label> nivel.</label>
        </div>
        
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th width="20%">Tipo de Beca</th>
                        <th width="50%">Situación y/o justificación</th>
                        <th width="30%">Seleccione</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $rows_printed = ['Excelencia Académica' => 0, 'Inclusión o Inclusiva' => 0, 'Especial' => 0];
                    
                    foreach ($tipos_beca_disponibles as $value => $data) {
                        $beca_type = $data[0];
                        $justification = $data[1];
                        $is_selected = ($tipo_beca === $value) ? '✔' : '';
                        
                        echo '<tr>';
                        
                        // Lógica de rowspan para la columna "Tipo de Beca"
                        $print_type_column = true;
                        if ($beca_type === 'Excelencia Académica' && $rows_printed['Excelencia Académica'] === 0) {
                            echo '<td rowspan="2">' . $beca_type . '</td>';
                        } elseif ($beca_type === 'Inclusión o Inclusiva' && $rows_printed['Inclusión o Inclusiva'] === 0) {
                            echo '<td rowspan="4">' . $beca_type . '</td>';
                        } elseif ($beca_type === 'Especial' && $rows_printed['Especial'] === 0) {
                            echo '<td rowspan="5">' . $beca_type . '</td>';
                        } elseif (in_array($beca_type, ['Excelencia Académica', 'Inclusión o Inclusiva', 'Especial'])) {
                            // No imprimir la columna de tipo de beca en filas de rowspan consecutivo
                            $print_type_column = false;
                        } else {
                             // Si es un tipo de beca que no tiene rowspan (ej. Socioeconómica)
                             echo '<td>' . $beca_type . '</td>';
                        }

                        echo '<td>' . $justification . '</td>';
                        echo '<td class="radio-group">' . $is_selected . '</td>';
                        echo '</tr>';

                        // Incrementar el contador de filas impresas
                        if (array_key_exists($beca_type, $rows_printed)) {
                            $rows_printed[$beca_type]++;
                        }
                    } 
                    ?>
                </tbody>
            </table>
        </div>
        
        <div class="closing"><p>Por la atención a la presente, anticipo mis agradecimientos.<br>Atentamente,</p></div>
        <div class="signature-container">
            <div class="signature-label">Firma:</div>
            <div class="signature-box">
                <?php
                if (!empty($firma_data_base64)) {
                    echo '<img src="' . $firma_data_base64 . '" alt="Firma del estudiante" style="max-width: 100%; height: 110px;">';
                } else {
                    echo '<span>Sin firma</span>';
                }
                ?>
            </div>
        </div>
        <div class="form-line">
            <label>C.I:</label>
            <span><?php echo $telefono; ?></span>
        </div>
        <div class="footer">Dirección: Av. General Rumifahui e Isla Pinta 1111, a media cuadra del San Luis Shopping<br>Teléfono: (02) 393-0980 www.superarse.edu.ec</div>
    </div>
</body>
</html>
<?php
$html_content = ob_get_clean();

// 6. Generar el PDF con mPDF
try {
    $mpdf = new Mpdf([ 
        'mode' => 'utf-8',
        'format' => 'A4',
        'margin_left' => 0,
        'margin_right' => 0,
        'margin_top' => 0,
        'margin_bottom' => 0,
        'default_font_size' => 9,
        'default_font' => 'sans-serif'
       
    ]);
    
    $mpdf->WriteHTML($html_content);
    $pdf_output = $mpdf->Output('', 'S');
} catch (\Mpdf\MpdfException $e) {
    http_response_code(500);
    echo 'Error al generar el PDF: ' . $e->getMessage();
    exit;
}

// 7. Enviar el PDF y el HTML por correo electrónico usando PHPMailer
$mail = new PHPMailer(true);
try {
    // === CONFIGURACIÓN SMTP DE GMAIL (Reemplazar con tus credenciales) ===
    $gmail_user = 'alexander.quinga@superarse.ec'; 
    $gmail_password = 'Patoboris123'; 

    $mail->isSMTP();
    $mail->Host       = 'mail.superarse.ec';
    $mail->SMTPAuth   = true;
    
    $mail->Username   = $gmail_user;
    $mail->Password   = $gmail_password; 
    
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
    $mail->Port       = 587; 
    $mail->CharSet = 'UTF-8';

    // === Configuración del correo ===
    $mail->setFrom($gmail_user, 'Instituto Superarse'); 
    $mail->addAddress('bienestarinstitucional45@gmail.com', 'Destinatario Principal');
    
    $mail->isHTML(true);
    $mail->Subject = 'Solicitud de Beca de ' . $nombre;
    $mail->Body = '
                <p>Estimados,</p>
                <p>Adjuntamos el contrato de matrícula correspondiente al estudiante <strong>' . htmlspecialchars($nombre) . '</strong>con (Cédula: ' . htmlspecialchars($identificacion) . ').</p>
                <p>Saludos cordiales,<br><strong>Instituto Superior Tecnológico Superarse</strong></p>
            ';
   
    // Adjuntar el PDF generado
    $filename = 'solicitud_beca_' . str_replace(' ', '_', $nombre) . '.pdf';
    $mail->addStringAttachment($pdf_output, $filename, 'base64', 'application/pdf');

    $mail->send();
    echo '¡Éxito! Su solicitud ha sido enviada y el formulario ha sido enviado correctamente.';

} catch (Exception $e) {
    http_response_code(500);
    error_log("Error al enviar el correo: " . $mail->ErrorInfo);
    echo "Lo sentimos, ocurrió un error al enviar el correo. Por favor, reintente. Detalles del servidor: " . $mail->ErrorInfo;
}
?>