// Sincronización automática de datos
    document.addEventListener("DOMContentLoaded", () => {
        const nPrincipal = document.getElementById("nombrePrincipal");
        const cPrincipal = document.getElementById("cedulaPrincipal");
        const nFirma = document.getElementById("nombreFirma");
        const cFirma = document.getElementById("cedulaFirma");

        if (nPrincipal && nFirma) {
            nPrincipal.addEventListener("input", () => {
                nFirma.value = nPrincipal.value.toUpperCase();
            });
        }

        if (cPrincipal && cFirma) {
            cPrincipal.addEventListener("input", () => {
                cFirma.value = cPrincipal.value;
            });
        }
    });

    // Función para validar y generar PDF
    function descargarPDF() {
        // 1. Definimos el elemento que vamos a convertir (EL ERROR ESTABA AQUÍ)
        const element = document.getElementById('documento');
        
        // 2. Validación de campos
        const campos = document.querySelectorAll('#documento input, #documento select');
        let vacios = [];

        campos.forEach(campo => {
            if (!campo.readOnly) {
                if (campo.value.trim() === '') {
                    vacios.push(campo);
                    campo.classList.add('border-red-500');
                } else {
                    campo.classList.remove('border-red-500');
                }
            }
        });

        if (vacios.length > 0) {
            alert('⚠️ Por favor complete todos los campos resaltados.');
            vacios[0].focus();
            return;
        }

        // 3. Configuración para evitar cortes y hojas en blanco
        const opt = {
            margin: 0,
            filename: 'Contrato_Matricula_ISTS.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { 
                scale: 3, 
                useCORS: true,
                letterRendering: true,
                scrollY: 0,
                scrollX: 0,
                // Esto asegura que capture todo el largo sin dejar espacios en blanco
                windowHeight: element.scrollHeight, 
                width: element.clientWidth
            },
            jsPDF: { 
                unit: 'mm', 
                format: 'a4', 
                orientation: 'portrait',
                compress: true
            }
        };

        // 4. Ejecución
        html2pdf().set(opt).from(element).save();
    }