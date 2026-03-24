<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="/assets/img/content/logo/superarse_gris.png" rel="icon" />
    <title>Solicitud de Tercera Matrícula</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <link href="css/style.css" rel="stylesheet" />
</head>


<body class="flex flex-col items-center py-8">

    <!-- DOCUMENTO -->
    <div id="documento"
         class="shadow-2xl bg-white flex flex-col"
         style="width: 210mm;">

        <!-- HEADER -->
        <div class="header-band w-full h-20 bg-gradient-to-r from-[#005a9c] via-[#0088cc] to-[#4299e1] relative">
            <div class="absolute inset-0 flex items-center px-6">
                <img src="assets/img/Logo-Superarse-Negativo.png" class="h-14">
            </div>
        </div>

        <!-- CONTENIDO -->
        <div class="px-10 py-6 text-gray-800 text-sm flex-grow">

            <h1 class="text-sm font-bold text-center mb-4 uppercase">
                Solicitud de Tercera Matrícula
            </h1>

            <div class="text-right mb-4">
                Sangolquí,
                <input type="text" class="w-28 text-center border-b" placeholder="02 DE ENERO">
                de
                <input type="text" class="w-16 text-center border-b" placeholder="2026">
            </div>

            <div class="mb-4">
                <p class="font-bold">Vicerrectorado Académico </p>
                
                <p>Instituto Superior Tecnológico Superarse</p>
                <p class="font-bold mt-1">Presente.-</p>
            </div>

            <p class="font-bold mb-1">De mis consideraciones:</p>

            <p class="text-justify leading-relaxed mb-3">
                Por medio de la presente, yo
                <strong><input type="text" id="nombrePrincipal" placeholder="Nombres y apellidos Completos" class="w-72 mx-1 border-b"></strong>
                con documento de identificación N.º
                <strong><input type="text" id="cedulaPrincipal" placeholder="Cédula/Pasaporte" class="w-36 mx-1 border-b"></strong>,
                en la carrera
                <strong><select class="border-b mx-1">
                    <option value="Seleccione">Seleccione</option>
                <option value="ADMINISTRACIÓN">ADMINISTRACIÓN</option>
                <option value="EDUCACIÓN BÁSICA">EDUCACIÓN BÁSICA</option>
                <option value="EDUCACION BILINGÜE">EDUCACION BILINGÜE</option>
                <option value="ENFERMERÍA VETERINARIA">ENFERMERÍA VETERINARIA</option>
                <option value="INSTRUMENTACION QUIRURGICA">INSTRUMENTACION QUIRURGICA</option>
                <option value="MINERÍA">MINERÍA</option>
                <option value="PRODUCCIÓN ANIMAL">PRODUCCIÓN ANIMAL</option>
                <option value="SEGURIDAD E HIGIENE DEL TRABAJO<">SEGURIDAD E HIGIENE DEL TRABAJO</option>
                <option value="SEGURIDAD Y PREVENCIÓN DE RIESGOS LABORALES">SEGURIDAD Y PREVENCIÓN DE RIESGOS LABORALES</option>
                <option value="TÉCNICO SUPERIOR EN MARKETING DIGITAL">TÉCNICO SUPERIOR EN MARKETING DIGITAL</option>
                <option value="MARKETING DIGITAL">MARKETING DIGITAL</option>
                <option value="TOPOGRAFÍA CON NIVEL EQUIVALENTE A TECNOLOGIA SUPERIOR ">TOPOGRAFÍA CON NIVEL EQUIVALENTE A TECNOLOGIA SUPERIOR </option>
                <option value="VENTAS ESTRATÉGICAS CON INTELIGENCIA ARTIFICIAL">VENTAS ESTRATÉGICAS CON INTELIGENCIA ARTIFICIAL</option>
                </select></strong>,
                para el periodo académico <strong>Noviembre 2025 – Abril 2026.</strong>
            </p>

            <div class="ml-4 mb-3 space-y-1">
                <div class="flex items-end"><span class="w-4 font-bold">1.</span><input type="text" class="flex-1 border-b border-dashed"></div>
                <div class="flex items-end"><span class="w-4 font-bold">2.</span><input type="text" class="flex-1 border-b border-dashed"></div>
                <div class="flex items-end"><span class="w-4 font-bold">3.</span><input type="text" class="flex-1 border-b border-dashed"></div>
                <div class="flex items-end"><span class="w-4 font-bold">4.</span><input type="text" class="flex-1 border-b border-dashed"></div>
            </div>

            <p class="mb-3">Por la atención brindada, anticipo mis agradecimientos.</p>
            <p class="font-bold mb-2">Atentamente,</p>

           

           <div class="mt-5 border border-gray-400 rounded-md p-3">
            <p class="font-bold text-xs mb-2 uppercase">Datos del estudiante</p>

            <div class="grid grid-cols-2 gap-3 text-sm">
                <div class="space-y-3">
                    <div>
                        <label class="font-bold">Nombre y Apellido:</label>
                        <input type="text" id="nombreFirma" class="w-full border-b " readonly>
                    </div>
                    <div>
                        <label class="font-bold">N° de cédula:</label>
                        <input type="text" id="cedulaFirma" class="w-full border-b " readonly>
                    </div>
                    <div>
                        <label class="font-bold">Correo electrónico:</label>
                        <input type="email" class="w-full border-b">
                    </div>
                    <div>
                        <label class="font-bold">Celular:</label>
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
        <div class="mt-5 border border-gray-400 rounded-md p-3">
            <p class="font-bold text-xs mb-2 uppercase">Autorización institucional</p>

            <div class="grid grid-cols-2 gap-5 text-sm">
                <div>
                    <p class="font-bold">Vicerrectorado Académico </p>
                    <p>Instituto Superior Tecnológico Superarse</p>
                    <p class="text-blue-600">matriculas@superarse.edu.ec</p>
                </div>

                <div class="border border-gray-800 h-32 flex flex-col justify-center px-4">
                    <div class="w-full border-t border-gray-800 mb-2 mt-6"></div>
                    <p class="text-center font-bold text-xs">Autorizado</p>
                    <div class="flex items-center mt-3">
                        <span class="mr-2 font-bold">Fecha:</span>
                        <div class="flex-1 border-b border-gray-800"></div>
                    </div>
                </div>
            </div>
        </div>

        </div>

        <!-- FOOTER -->
        <div class="w-full h-16 bg-gradient-to-r from-[#005a9c] via-[#0088cc] to-[#4299e1]
                    flex justify-between items-end px-6 py-3 text-white text-[10px]">
            <p>Página 1 de 1</p>
            <p class="text-right">
                ISTS-GD-02-009<br>
                Versión: 001<br>
                Fecha de elab: 18/08/2024
            </p>
        </div>

    </div>

    <!-- BOTÓN (SE MANTIENE) -->
    <button onclick="descargarPDF()"
        class="my-10 px-10 py-4 bg-green-600 text-white rounded-full font-bold shadow-2xl hover:bg-green-700 transition-all active:scale-95">
        Descargar Solicitud de Tercera Matrícula
    </button>

    <!-- SCRIPT ORIGINAL -->
    <script src="js/STM.js"></script>

</body>
</html>

