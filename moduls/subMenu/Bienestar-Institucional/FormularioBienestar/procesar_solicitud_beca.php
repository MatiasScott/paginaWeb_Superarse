<?php
// 1. CONFIGURACIÓN CRÍTICA PARA MÓVILES (No eliminar esto)
ini_set('memory_limit', '512M');           // Para procesar firmas pesadas de celulares
ini_set('pcre.backtrack_limit', '5000000'); // Evita que el PDF se corte a la mitad por datos largos
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 2. Carga de librerías mediante Composer
require __DIR__ . '/vendor/autoload.php';

use Mpdf\Mpdf;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// 3. Cabeceras para asegurar compatibilidad con móviles
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

// 4. Validación de la solicitud
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo 'Método de solicitud no válido.';
    exit;
}

// 5. Captura de todos los datos (SIN ELIMINAR NADA)
$nombre = htmlspecialchars($_POST['nombre'] ?? '');
$identificacion = htmlspecialchars($_POST['identificacion'] ?? '');
$periodo = htmlspecialchars($_POST['periodo'] ?? '');
$carrera = htmlspecialchars($_POST['carrera'] ?? '');
$nivel = htmlspecialchars($_POST['nivel'] ?? '');
$tipo_beca = htmlspecialchars($_POST['tipo_beca'] ?? '');
$firma_data_base64 = $_POST['firma_data_base64'] ?? '';
$telefono = htmlspecialchars($_POST['telefono'] ?? '');

if (empty($nombre) || empty($identificacion) || empty($firma_data_base64)) {
    http_response_code(400);
    echo 'Error: Por favor, complete todos los campos obligatorios y firme el documento.';
    exit;
}

// 6. Diccionario completo de becas (SIN ELIMINAR NADA)
$tipos_beca_disponibles = [
    'excelencia_bachillerato' => ['Excelencia Académica', 'Mérito académico en bachillerato.'],
    'excelencia_institucional' => ['Excelencia Académica', 'Mérito académico institucional.'],
    'socioeconomica'          => ['Socioeconómica', 'Apoyo solidario.'],
    'desempleo'               => ['Socioeconómica', 'Desempleo.'],
    'escasez'                 => ['Socioeconómica', 'Escasez de recursos económicos.'],
    'familiar'                => ['Socioeconómica', 'Familiar.'],
    'migrantes'               => ['Socioeconómica', 'Migrantes o refugiados.'],
    'politica'                => ['Socioeconómica', 'Política de cuotas.'],
    'discapacidad'            => ['Inclusión o Inclusiva', 'Discapacidad.'],
    'enfermedades'            => ['Inclusión o Inclusiva', 'Enfermedades catastróficas.'],
    'pueblos'                 => ['Inclusión o Inclusiva', 'Pueblos y Nacionalidades del Ecuador.'],
    'futuro_femenino'         => ['Inclusión o Inclusiva', 'Género.'],
    'deportivo_cultural'      => ['Especial', 'Mérito Deportivo o Cultural.'],
    'educacion_continua'      => ['Especial', 'Educación continua.'],
    'clubes'                  => ['Especial', 'Clubes Institucionales.'],
    'colaborativa'            => ['Especial', 'Colaborativa.'],
    'superarse'               => ['Especial', 'Beca Superarse.'],
    'institucionales'         => ['Especial', 'Convenios Institucionales.'],
];

// 7. Generación del HTML (Optimizado para visores móviles)
ob_start();
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
                <td class="logo-section"><img src="assets/img/Logo-Superarse-Negativo.png" style="width: 110px;"></td>
                <td class="title-section"><div class="main-title">FICHA SOLICITUD BECA</div></td>
                <td class="info-section">
                    <div style="font-weight: bold; color: #0B77BD;">BIENESTAR INSTITUCIONAL</div>
                    <div>VERSIÓN: 001 | CÓDIGO: ISTS-GBI-001-001</div>
                    <div>FECHA: 04/04/2024</div>
                </td>
            </tr>
        </table>

        <div class="salutation">
            Ing. Verónica Tamayo, MSc.<br />
            <strong>INSTITUTO SUPERIOR TECNOLÓGICO SUPERARSE</strong><br />Rectora
        </div>

        <p>De mis consideraciones;</p>

        <div class="form-line">
            Yo, <span class="data-text"><?php echo $nombre; ?></span>, titular de la cédula/pasaporte No. 
            <span class="data-text"><?php echo $identificacion; ?></span> solicito beca para el periodo académico 
            <span class="data-text"><?php echo $periodo; ?></span> carrera de <span class="data-text"><?php echo $carrera; ?></span> 
            en el <span class="data-text"><?php echo $nivel; ?></span> nivel.
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
                <?php 
                $counts = array_count_values(array_column($tipos_beca_disponibles, 0));
                $printed_categories = [];
                foreach ($tipos_beca_disponibles as $value => $data) {
                    echo '<tr>';
                    if (!in_array($data[0], $printed_categories)) {
                        echo '<td rowspan="'.$counts[$data[0]].'" style="vertical-align:middle; font-weight:bold; text-align:center; background-color:#fafafa;">'.$data[0].'</td>';
                        $printed_categories[] = $data[0];
                    }
                    echo '<td>' . $data[1] . '</td>';
                    echo '<td style="text-align:center; font-weight:bold;">' . (($tipo_beca === $value) ? '✔' : '') . '</td>';
                    echo '</tr>';
                } 
                ?>
            </tbody>
        </table>
        
        <div class="closing" style="margin-top:15px;">Atentamente,</div>
        
        <div class="signature-container">
            <strong>Firma del Estudiante:</strong>
            <div class="signature-box">
                <?php if ($firma_data_base64): ?>
                    <img src="<?php echo $firma_data_base64; ?>">
                <?php endif; ?>
            </div>
            <div style="margin-top: 8px;">
                <strong>C.I / Teléfono:</strong> <span class="data-text"><?php echo $telefono; ?></span>
            </div>
        </div>

        <div class="footer">
            Dirección: Av. General Rumiñahui e Isla Pinta 1111, Sangolquí<br />
            Teléfono: (02) 393-0980 | www.superarse.edu.ec
        </div>
    </div>
</body>
</html>
<?php
$html_content = ob_get_clean();

// 8. Generación del PDF (Ajustado para móviles)
try {
    $mpdf = new Mpdf([
        'mode' => 'utf-8', 'format' => 'A4',
        'margin_left' => 10, 'margin_right' => 10, 'margin_top' => 10, 'margin_bottom' => 10,
        'shrink_tables_to_fit' => 1
    ]);
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->WriteHTML($html_content);
    $pdf_output = $mpdf->Output('', 'S');
} catch (\Mpdf\MpdfException $e) {
    exit('Error PDF: ' . $e->getMessage());
}

// 9. PHPMailer
$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host       = 'mail.superarse.ec';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'alexander.quinga@superarse.ec';
    $mail->Password   = 'Patoboris123'; 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
    $mail->Port       = 587; 
    $mail->CharSet    = 'UTF-8';
    $mail->setFrom('alexander.quinga@superarse.ec', 'Instituto Superarse'); 
    $mail->addAddress('bienestarinstitucional45@gmail.com');
    $mail->isHTML(true);
    $mail->Subject = 'Nueva Solicitud de Beca - ' . $nombre;
    $mail->Body    = 'Se adjunta la solicitud de beca firmada por ' . $nombre;
    $mail->addStringAttachment($pdf_output, 'Solicitud_Beca.pdf', 'base64', 'application/pdf');

    if($mail->send()) echo 'La solicitud ha sido enviada con éxito.';
} catch (Exception $e) {
    echo "Error al enviar el correo: {$mail->ErrorInfo}";
}
?>