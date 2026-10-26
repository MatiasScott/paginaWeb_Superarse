<?php
declare(strict_types=1);
// Vista MVC - Solicitud Cambio de Sede (idéntica al formato legacy)
$title = 'Solicitud Cambio de Sede';
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= asset('assets/img/content/logo/superarse_gris.png') ?>" rel="icon" />

    <title><?= $title ?></title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <link href="<?= asset('css/solicitudes.css') ?>" rel="stylesheet" />

</head>

<body class="flex flex-col items-center">

    <div id="documento" class="shadow-2xl">
        <div class="header-band w-full h-20 bg-gradient-to-r from-[#005a9c] via-[#0088cc] to-[#4299e1] relative flex-none">
            <div class="absolute inset-0 flex items-center px-6">
                <img src="<?= asset('assets/img/Logo-Superarse-Negativo.png') ?>" alt="Logo Superarse" class="h-16 drop-shadow-md">
            </div>
        </div>

        <div class="p-8 text-gray-800 flex-grow text-sm">
            <h1 class="text-lg font-bold text-center mb-4">SOLICITUD CAMBIO DE SEDE/CAMPUS </h1>

            <div class="text-right mb-4">
                Sangolquí,
                <input type="text" placeholder="02 DE ENERO" class="w-36 mx-1 text-center border-b border-gray-400">
                de
                <input type="text" placeholder="2026" maxlength="4" class="w-20 text-center border-b border-gray-400">
            </div>

            <div class="mb-4 leading-tight">
                <p class="font-bold">Vicerrectorado Académico</p>

                <p>Instituto Superior Tecnológico Superarse</p>
                <p class="font-bold mt-2">Presente.-</p>
            </div>

            <p class="font-bold mb-2">De mis consideraciones:</p>

            <div class="text-justify leading-relaxed">
                Por medio de la presente, yo
                <strong><input type="text" id="nombrePrincipal" placeholder="Nombres y apellidos completos" class="w-80 mx-1 border-b"></strong>,
                con documento de identificación N.º
                <strong><input type="text" id="cedulaPrincipal" placeholder="Cédula/Pasaporte" class="w-40 mx-1 border-b"></strong>,
                me dirijo a usted para solicitar formalmente el cambio de Sede/Campus dentro de esta institución.

                Actualmente me encuentro matriculado en
                <strong>
                    <select id="sedeActual" class="mx-1 border-b border-gray-400 max-w-xl">
                        <option value="">Seleccione Sede/Campus actual</option>
                        <option value="Matriz"> Sede Matriz</option>
                        <option value="Alpallana">Campus Alpallana</option>
                    </select>
                </strong>;
                Solicito se autorice mi cambio a 
                <strong>
                    <select id="sedeDestino" class="mx-1 border-b border-gray-400 max-w-xl">
                        <option value="">Seleccione Sede/Campus de destino</option>
                        <option value="Matriz">Sede Matriz</option>
                        <option value="Alpallana">Campus Alpallana</option>
                    </select>
                </strong>,
                para continuar con mi formación académica y profesional.
            </div>

            <p class="mt-4">Por la atención brindada, anticipo mis agradecimientos.</p>
            <p class="mt-4 font-bold">Atentamente,</p>

            <!-- DATOS DEL ESTUDIANTE -->
            <div class="mt-6 border border-gray-400 rounded-md p-3">
                <p class="font-bold text-xs mb-2 uppercase text-gray-700">
                    Datos del estudiante
                </p>

                <div class="grid grid-cols-2 gap-3">
                    <div class="space-y-3">
                        <div>
                            <label class="font-bold block">Nombre y Apellido:</label>
                            <input type="text" id="nombreFirma" class="w-full border-b" readonly>
                        </div>

                        <div>
                            <label class="font-bold block">N° de cédula:</label>
                            <input type="text" id="cedulaFirma" class="w-full border-b" readonly>
                        </div>

                        <div>
                            <label class="font-bold block">Correo electrónico:</label>
                            <input type="email" class="w-full border-b">
                        </div>

                        <div>
                            <label class="font-bold block">Celular:</label>
                            <input type="text" class="w-full border-b">
                        </div>
                    </div>

                    <div class="border border-gray-800 h-32 flex flex-col justify-end items-center">
                        <div class="w-3/4 border-t border-gray-800 mb-2"></div>
                        <p class="font-bold text-xs mb-2">Firma del estudiante</p>
                    </div>
                </div>
            </div>

            <!-- AUTORIZACIÓN -->
            <div class="mt-6 border border-gray-400 rounded-md p-3">
                <p class="font-bold text-xs mb-2 uppercase text-gray-700">
                    Autorización institucional
                </p>

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <p class="font-bold">Vicerrectorado Académico</p>
                        <p>Instituto Superior Tecnológico Superarse</p>
                        <p class="text-blue-600">matriculas@superarse.edu.ec</p>
                    </div>

                    <div class="border border-gray-800 h-32 flex flex-col justify-center px-4">
                        <div class="w-full border-t border-gray-800 mb-2 mt-6"></div>
                        <p class="text-center font-bold text-xs">Autorizado</p>

                        <div class="flex items-center mt-3">
                            <span class="mr-2 text-xs font-bold">Fecha:</span>
                            <div class="flex-1 border-b border-gray-800"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="footer-band w-full h-20 bg-gradient-to-r from-[#005a9c] via-[#0088cc] to-[#4299e1] flex justify-between items-end px-6 py-4 text-white text-[10px] flex-none">
            <p>Página 1 de 1</p>
            <p class="text-right">
                ISTS-GD-02-009<br>
                Versión: 001<br>
                Fecha de elab: 18/08/2024
            </p>
        </div>
    </div>

    <button onclick="descargarPDF()" class="my-10 px-10 py-4 bg-green-600 text-white rounded-full font-bold shadow-2xl hover:bg-green-700 transition-all active:scale-95">
        Descargar Solicitud Cambio de Sede
    </button>

    <script src="<?= asset('js/app/modules/services/solicitudes/SCDS.js') ?>"></script>

</body>
</html>
