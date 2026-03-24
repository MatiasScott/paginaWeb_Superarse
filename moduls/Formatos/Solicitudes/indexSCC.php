<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/assets/img/content/logo/superarse_gris.png" rel="icon" />
      
    <title>Solicitud Cambio de Carrera</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
     <link href="css/style.css" rel="stylesheet" />

  
</head>

<body class="flex flex-col items-center">

    <div id="documento" class="shadow-2xl">
        <div class="header-band w-full h-20 bg-gradient-to-r from-[#005a9c] via-[#0088cc] to-[#4299e1] relative flex-none">
            <div class="absolute inset-0 flex items-center px-6">
                <img src="assets/img/Logo-Superarse-Negativo.png" alt="Logo Superarse" class="h-16 drop-shadow-md">
            </div>
        </div>

        <div class="p-8 text-gray-800 flex-grow text-sm">
            <h1 class="text-lg font-bold text-center mb-4">SOLICITUD CAMBIO DE CARRERA</h1>

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
                <strong><input type="text" id="nombrePrincipal" placeholder="Nombres y apellidos completos" class="w-80 mx-1 border-b"></strong>
                , con documento de identificación N.º
                <strong><input type="text" id="cedulaPrincipal" placeholder="Cédula/Pasaporte" class="w-40 mx-1 border-b"></strong>
                , me dirijo a usted para solicitar formalmente el cambio de carrera dentro de esta institución. Actualmente me encuentro matriculado en la carrera de
                <strong><select class="mx-1 border-b border-gray-400 max-w-xl">
                    <option value="">Seleccione</option>
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
                </select></strong>; sin embargo, debido a 
                <input type="text" placeholder="Escriba aquí el motivo detallado..." class="w-[800px] mx-1 border-b border-gray-400 text-left">
                , considero que la carrera de 
                <strong><select class="mx-1 border-b border-gray-400 max-w-xl">
                    <option value="seleccione"> Seleccione</option>
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
                </select></strong>, es la más adecuada para mi desarrollo académico y profesional.
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
        Descargar Solicitud Cambio de Carrera
    </button>

    <script src="js/SCC.js"></script>

</body>
</html>