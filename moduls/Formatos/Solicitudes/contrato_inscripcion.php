<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrato de Inscripción y Matrícula</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <link href="/assets/img/content/logo/superarse_gris.png" rel="icon" />
    <link href="css/style.css" rel="stylesheet" />
    <style>
        /* Estilos para asegurar que el PDF no salga cortado */
        #documento {
            background-color: white;
        }
        @media (max-width: 640px) {
            input, select { font-size: 14px !important; }
        }
    </style>

 
</head>

<body class="flex flex-col items-center">

    <div id="documento" class="shadow-2xl max-w-[794px] w-full">

        <div class="header-band w-full h-16 bg-gradient-to-r from-[#005a9c] via-[#0088cc] to-[#4299e1] relative flex-none">
            <div class="absolute inset-0 flex items-center px-6">
                <img src="assets/img/Logo-Superarse-Negativo.png" alt="Logo Superarse" class="h-14">
            </div>
        </div>

        <div class="p-8 text-gray-800 flex-grow text-sm">

            <h1 class="text-xl font-bold text-center mb-4  uppercase tracking-tight">
                Contrato de Inscripción y Matrícula
            </h1>


            <div class="text-justify leading-relaxed mb-6">
                Yo, 
                <strong><input type="text" id="nombrePrincipal" placeholder="NOMBRES Y APELLIDOS COMPLETOS" class="w-80 mx-1 border-b border-gray-400 uppercase font-bold"></strong>
                , portador/a de la cédula de ciudadanía/pasaporte N° 
                <strong><input type="text" id="cedulaPrincipal" placeholder="CÉDULA/PASAPORTE" class="w-40 mx-1 border-b border-gray-400 font-bold outline-none" maxlength="10"    oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10)"></strong>
                , por medio del presente Contrato de Inscripción y Matrícula declaro que me he matriculado en el <span class="font-bold">Instituto Superior Tecnológico Superarse</span>, en la CARRERA de:
                
                <div class="mt-4">
                         <strong><select class="mx-1 border-b">
                    <option value="">Seleccione</option>
                    <option value="ADMINISTRACIÓN">ADMINISTRACIÓN</option>
                    <option value="EDUCACIÓN BÁSICA">EDUCACIÓN BÁSICA</option>
                    <option value="EDUCACION BILINGÜE">EDUCACION BILINGÜE</option>
                    <option value="ENFERMERÍA VETERINARIA">ENFERMERÍA VETERINARIA</option>
                    <option value="INSTRUMENTACION QUIRURGICA">INSTRUMENTACION QUIRURGICA</option>
                    <option value="MARKETING DIGITAL">MARKETING DIGITAL</option>
                     <option value="TÉCNICO SUPERIOR EN MARKETING DIGITAL">MARKETING DIGITAL Y DISEÑO MULTIMEDIA</option>
                    <option value="MINERÍA">MINERÍA</option>
                    <option value="PRODUCCIÓN ANIMAL">PRODUCCIÓN ANIMAL</option>
                    <option value="SEGURIDAD E HIGIENE DEL TRABAJO<">SEGURIDAD E HIGIENE DEL TRABAJO</option>
                    <option value="SEGURIDAD Y PREVENCIÓN DE RIESGOS LABORALES">SEGURIDAD Y PREVENCIÓN DE RIESGOS LABORALES</option>
                    <option value="TOPOGRAFÍA CON NIVEL EQUIVALENTE A TECNOLOGIA SUPERIOR ">TOPOGRAFÍA CON NIVEL EQUIVALENTE A TECNOLOGIA SUPERIOR</option>
                    <option value="VENTAS ESTRATÉGICAS CON INTELIGENCIA ARTIFICIAL">VENTAS ESTRATÉGICAS CON INTELIGENCIA ARTIFICIAL</option>
                </select></strong>,
                </div>

                <div class="mt-4">
                    en el período académico 
                    <input type="text" id="periodoInicio" placeholder="mes/año" class="w-48 mx-1 border-b border-gray-400 text-center font-semibold">
                    <strong>(mes y año de inicio) </strong>
                    <input type="text" id="periodoFin" placeholder="mes/año" class="w-48 mx-1 border-b border-gray-400 text-center font-semibold">
                    <strong>(mes y año de culminación)</strong>; por lo que, en mi calidad de ESTUDIANTE me comprometo y obligo de forma expresa, libre y voluntaria a lo siguiente:
                </div>
            </div>

            <div class="text-[11px] leading-snug space-y-3 text-gray-700 text-justify mb-8">
                <p>• Por medio de la presente, autorizo de manera libre, expresa e informada al Instituto Superior Tecnológico Superarse para que almacene, recolecte y procese mis datos personales con fines académicos e institucionales, de conformidad con la Ley Orgánica de Protección de Datos personales. Asimismo, autorizo que esta información pueda ser compartida con los entes de control y autoridades competentes, cuando así corresponda o sea requerida a la normativa vigente.</p>
                <p>• De acuerdo al <strong>Artículo 37</strong> del <strong>Reglamento de Estudiantes</strong> los valores ingresados al instituto por concepto de matrículas y aranceles no serán devueltos por el Instituto Superior Tecnológico Superarse.</p>
                <p>• El alumno recibirá las credenciales de acceso a la plataforma de Gestión Académica utilizada por el Instituto, incluyendo el software institucional y todos los contenidos disponibles en dicha plataforma.</p>
                <p>• Respetar la visión, misión, principios, fines y objetivos institucionales del Instituto Superior Tecnológico Superarse, de acuerdo a lo establecido en el Estatuto de la institución.</p>
                <p>• Reconozco que la matrícula tiene vigencia desde la firma del presente contrato, correspondiente al periodo académico en curso, y me comprometo a cumplir con la Ley Orgánica de Educación Superior, el Reglamento General de los Institutos Superiores, el Código de Ética, el Estatuto y los Reglamentos Internos del Instituto Superior Tecnológico Superarse, aceptando que el incumplimiento de estas disposiciones podrá generar procesos disciplinarios, administrativos y/o legales en mi contra.</p>
                <p>• Conocer que al momento de matricularme en el Instituto Superior Tecnológico Superarse bajo la modalidad de CRÉDITO EDUCATIVO estoy asumiendo la obligación de cancelar la totalidad de los aranceles generados y aprobados por el Órgano Colegiado Superior, me comprometo a cancelar las cuotas planteadas en las fechas indicadas por el Instituto Superior Tecnológico Superarse</p>
                <p>• Conocer que el retiro académico legal se procederá únicamente presentando una solicitud dirigida a la Coordinación de Bienestar Institucional y cubriendo el costo del derecho que implique este proceso.</p>
                <p>• Respetar y cumplir los Reglamentos Internos del Instituto Superior Tecnológico Superarse; y, por consiguiente, aceptar que el incumplimiento de los compromisos establecidos generará en mi contra procesos disciplinarios, administrativos y/o legales, cumpliendo todas las obligaciones determinadas para los estudiantes del Instituto Superior Tecnológico Superarse.</p>
            </div>

            <div class="mt-4 border border-gray-400 rounded-md p-2 bg-white">
    <p class="font-bold text-[10px] uppercase text-gray-700 mb-2 border-b border-gray-100 pb-1">
        Datos del estudiante e Institucionales
    </p>

    <div class="flex gap-4">
        <div class="flex-grow space-y-3">
            
            <div>
                <label class="font-bold block text-[9px] uppercase text-gray-600 mb-0.5">Nombre y Apellido:</label>
                <input type="text" id="nombreFirma" class="w-full border-b border-gray-300 bg-gray-50 uppercase font-semibold text-[10px] py-0.5 outline-none" readonly>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="font-bold block text-[9px] uppercase text-gray-600 mb-0.5">N° de cédula:</label>
                    <input type="text" id="cedulaFirma" class="w-full border-b border-gray-300 bg-gray-50 font-semibold text-[10px] py-0.5 outline-none" readonly>
                </div>
                <div>
                    <label class="font-bold block text-[9px] uppercase text-gray-600 mb-0.5">Celular:</label>
                    <input type="text" id="celularEstudiante" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '')" placeholder="09..." class="w-full border-b border-gray-300 font-semibold text-[10px] py-0.5 outline-none">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="font-bold block text-[9px] uppercase text-gray-600 mb-0.5">Correo electrónico:</label>
                    <input type="email" id="emailEstudiante" placeholder="ejemplo@correo.com" class="w-full border-b border-gray-300 font-semibold text-[10px] py-0.5 outline-none">
                </div>
                <div>
                    <label class="font-bold block text-[9px] uppercase text-blue-700 mb-0.5">Asesor Responsable:</label>
                    <select id="asesorSelect" class="w-full border-b border-gray-400 font-bold text-blue-800 text-[10px] py-0.5 outline-none cursor-pointer bg-transparent">
                        <option value="">-- SELECCIONE --</option>
                        <option value="LUIS GRANJA">LUIS GRANJA</option>
                        <option value="LIZBETH OCHOA">LIZBETH OCHOA</option>
                        <option value="MAYRA SEGARRA">MAYRA SEGARRA</option>
                        <option value="MELANY ARTIEADA">MELANY ARTIEADA</option>
                        <option value="MELANY VASQUEZ">MELANY VASQUEZ</option>
                        <option value="NOEMI TORO">NOEMI TORO</option>
                        <option value="JENNIFER BETANCOURT">JENNIFER BETANCOURT</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="w-32 flex flex-col">
             <p class="font-bold text-[9px] uppercase text-gray-400 mb-1 text-center">Validación</p>
             <div class="flex-grow border border-gray-800 flex flex-col justify-end items-center pb-2 min-h-[100px] bg-white">
                <div class="w-4/5 border-t border-gray-800 mb-1"></div>
                <p class="font-bold text-[9px] uppercase italic text-gray-700 text-center leading-tight">Firma del<br>estudiante</p>
             </div>
        </div>
    </div>
</div>

        </div>

        <div class="footer-band w-full h-16 bg-gradient-to-r from-[#005a9c] via-[#0088cc] to-[#4299e1] flex justify-between items-end px-6 py-3 text-white text-[10px] flex-none">
            <p>Página 1 de 1</p>
            <p class="text-right">
                ISTS-GD-02-001<br>
                Versión: 001<br>
                Fecha de elab: 05/09/2025
            </p>
        </div>
    </div>

    <button onclick="descargarPDF()"
        class="my-10 px-12 py-4 bg-green-600 text-white rounded-full font-bold shadow-2xl hover:bg-green-700 transition-all transform hover:scale-105">
         Descargar Contrato de Matrícula
    </button>

    <script src="js/contrato_inscripcion.js?=v1"></script>
</body>
</html>