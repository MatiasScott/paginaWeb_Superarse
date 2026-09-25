<?php
declare(strict_types=1);
// Vista MVC Admisiones - Contrato de Matrícula (firma). Página limpia imprimible (sin layout del sitio).
$title = $title ?? 'Contrato de Matrícula';
$carreras = $carreras ?? [];
$asesores = $asesores ?? [];
$clausulas = $clausulas ?? [];
$codigoDocumento = $codigoDocumento ?? [];
$logoWebUrl = $logoWebUrl ?? '';

$escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= asset('assets/img/content/logo/superarse_gris.png') ?>" rel="icon" />
    <title><?= $escape($title) ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Estilos CSS personalizados para las curvas que no existen en Tailwind */
        .header-band {
            clip-path: polygon(0 0, 100% 0, 100% 100%, 0% 80%);
        }

        .footer-band {
            clip-path: polygon(0% 20%, 100% 0, 100% 100%, 0% 100%);
        }

        /* Arreglo para que los input no sean anchos por defecto */
        .document-text input {
            display: inline-block;
            vertical-align: middle;
            text-align: center;
        }

        /* Aseguramos que los inputs tomen el ancho completo en móvil si es necesario */
        .document-text input {
            /* Solo para que los inputs en línea ocupen su propio espacio */
            min-width: 100px;
            max-width: 90%;
        }
    </style>
</head>

<body class="bg-gray-100 flex justify-center items-start min-h-screen p-4 sm:p-8">
    <div class="bg-white rounded-xl shadow-lg max-w-4xl w-full border border-gray-200 overflow-hidden">
        <div class="header-band w-full h-24 sm:h-32 bg-gradient-to-r from-[#005a9c] via-[#0088cc] to-[#4299e1] relative">
            <div class="absolute inset-0 flex justify-between items-center px-4 sm:px-8 py-2 sm:py-4">
                <img src="<?= $escape($logoWebUrl) ?>" alt="Logo Superarse Tecnológico" class="h-12 sm:h-20 drop-shadow-md">
                <h1 class="text-white text-base sm:text-2xl font-bold text-right flex-grow ml-4">CONTRATO DE INSCRIPCIÓN Y MATRÍCULA</h1>
            </div>
        </div>

        <form id="contract-form" action="<?= asset('Contrato-Matricula/procesar') ?>" method="post" class="p-4 sm:p-10">
            <div class="document-text text-base text-gray-700 leading-relaxed text-justify flex flex-wrap items-center">
                Yo,
                <input type="text" name="nombre" placeholder="Nombres completos"
                       class="border-b-2 border-gray-400 focus:border-blue-500 bg-transparent text-center px-1 flex-1 min-w-[200px] mx-1 mt-1 sm:mt-0"
                       style="width: 100%;">
                , portador/a de la cédula de ciudadanía/pasaporte N°
                <input type="text" name="cedula" placeholder="Nro. de cédula/pasaporte " maxlength="10"
                       class="border-b-2 border-gray-400 focus:border-blue-500 bg-transparent text-center px-1 flex-1 min-w-[150px] mx-1 mt-1 sm:mt-0">
                , por medio del presente Contrato de Inscripción y Matrícula declaro que me he matriculado en el <strong class="font-bold">Instituto Superior Tecnológico Superarse</strong>, en la CARRERA de:
            </div>

            <select id="program" name="carrera" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-3" required>
                <option value="">Seleccione</option>
                <?php foreach ($carreras as $carrera): ?>
                    <option value="<?= $escape($carrera) ?>"><?= $escape($carrera) ?></option>
                <?php endforeach; ?>
            </select>

            <div class="document-text text-base text-gray-700 leading-relaxed text-justify flex flex-wrap items-center mt-3">
                , en el período académico
                <input type="text" name="inicio_periodo" class="border-b-2 border-gray-400 focus:border-blue-500 bg-transparent text-center px-1 flex-1 min-w-[150px] mx-1 mt-1 sm:mt-0" placeholder="mes/año" maxlength="7" >
                <strong class="font-bold mt-1 sm:mt-0">(mes y año de inicio)</strong>
                <input type="text" name="fin_periodo" class="border-b-2 border-gray-400 focus:border-blue-500 bg-transparent text-center px-1 flex-1 min-w-[150px] mx-1 mt-1 sm:mt-0" placeholder="mes/año" maxlength="7" >
                <strong class="font-bold mt-1 sm:mt-0">(mes y año de culminación)</strong>; por lo que, en mi calidad de ESTUDIANTE me comprometo y obligo de forma expresa, libre y voluntaria a lo siguiente:
            </div>

            <div class="document-text mt-3">
                <ul class="list-none pl-2 text-gray-700 text-justify">
                    <?php foreach ($clausulas as $clausula): ?>
                        <li class="relative pl-4 mb-4 before:content-['•'] before:absolute before:left-0 before:font-bold before:text-gray-600"><?= $clausula ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="signature-container mt-5 text-center">
                <p class="font-bold">FIRMA DEL ESTUDIANTE</p>
                <canvas id="signature-pad" class="border-2 border-gray-400 rounded-lg bg-gray-50 cursor-crosshair w-full max-w-md h-52 mt-2 mx-auto"></canvas><br>
                <button type="button" id="limpiar" class="bg-red-600 text-white border-none py-3 px-6 text-base rounded-lg cursor-pointer mt-4 transition-colors hover:bg-red-700">Limpiar Firma</button><br>
                <input type="hidden" name="firma_data" id="firma_data">
                <br>

                <div class="flex flex-col sm:flex-row justify-center items-center sm:gap-8 mt-4">
                    <p class="cc-label w-full sm:w-auto mt-2 sm:mt-0">
                        C.I.
                        <input type="text" name="firma_cc" placeholder="Número de cédula"maxlength="10"
                               class="border-b-2 border-gray-400 focus:border-blue-500 bg-transparent text-center px-1 w-full sm:w-40 mt-1">
                    </p>
                    <p class="asesor-label w-full sm:w-auto mt-4 sm:mt-0 flex flex-col sm:flex-row items-center">
                        Asesor:
                        <select id="asesor" name="asesor"
                                class="shadow border rounded w-full sm:w-auto py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-2 sm:mt-0 sm:ml-2" required>
                            <option value="">Seleccione un Asesor</option>
                            <?php foreach ($asesores as $asesor): ?>
                                <option value="<?= $escape($asesor) ?>"><?= $escape($asesor) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </p>
                </div>
                <br>
            </div>

            <div class="button-group flex justify-center gap-4 mt-3">
                <button type="submit" class="submit-button p-4 text-white border-none rounded-lg text-lg cursor-pointer transition-colors w-full max-w-xs bg-green-600 hover:bg-green-700" name="action" value="send_and_download">Enviar Contrato y Descargar</button>
            </div>
        </form>

        <div class="footer-band w-full h-24 sm:h-32 bg-gradient-to-r from-[#005a9c] via-[#0088cc] to-[#4299e1] relative flex justify-between items-end px-4 sm:px-8 py-2 sm:py-4 box-border text-white mt-8">
            <p class="m-0 text-sm sm:text-base">Página 1 de 1</p>
            <p class="m-0 text-sm sm:text-base"><?= $escape((string) ($codigoDocumento['codigo'] ?? '')) ?><br><span><?= $escape((string) ($codigoDocumento['version'] ?? '')) ?></span><br><span><?= $escape((string) ($codigoDocumento['fecha'] ?? '')) ?></span></p>
        </div>
    </div>

    <script src="<?= asset('js/app/modules/admisiones/firma-contrato.js') ?>"></script>
</body>

</html>