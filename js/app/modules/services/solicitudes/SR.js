function descargarPDF() {

    // 1️⃣ VALIDACIÓN DE CAMPOS
    const campos = document.querySelectorAll('#documento input, #documento select');
    let incompletos = [];

    campos.forEach(campo => {
        if (campo.type !== 'file') {
            if (campo.value.trim() === '') {
                incompletos.push(campo);
                campo.classList.add('border-red-500');
            } else {
                campo.classList.remove('border-red-500');
            }
        }
    });

    if (incompletos.length > 0) {
        alert('⚠️ Debe llenar TODOS los campos antes de descargar el PDF.');
        incompletos[0].focus();
        return;
    }

    // 2️⃣ VALIDACIÓN DE CORREO
    const correo = document.querySelector('input[type="email"]');
    const regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!correo || !regexCorreo.test(correo.value)) {
        alert('⚠️ Ingrese un correo electrónico válido.');
        if (correo) {
            correo.classList.add('border-red-500');
            correo.focus();
        }
        return;
    }

    // 3️⃣ GENERACIÓN DEL PDF
    window.scrollTo(0, 0);

    const element = document.getElementById('documento');
    if (!element) {
        alert('Error interno: no se pudo generar el documento');
        return;
    }

    const nombreInput = document.getElementById('nombrePrincipal');
    const nombre = nombreInput?.value.trim() || 'Reingreso';

    const opt = {
        margin: 0,
        filename: `Solicitud_Reingreso_${nombre}.pdf`,
        image: { type: 'jpeg', quality: 0.98 },
        pagebreak: { mode: 'avoid-all' },
        html2canvas: {
            scale: 3,
            useCORS: true,
            scrollY: 0,
            scrollX: 0,
            letterRendering: true,
            width: 793.7
        },
        jsPDF: {
            unit: 'mm',
            format: 'a4',
            orientation: 'portrait',
            compress: true
        }
    };

    html2pdf().set(opt).from(element).save();
}
document.addEventListener("DOMContentLoaded", () => {

    const nombrePrincipal = document.getElementById("nombrePrincipal");
    const cedulaPrincipal = document.getElementById("cedulaPrincipal");

    const nombreFirma = document.getElementById("nombreFirma");
    const cedulaFirma = document.getElementById("cedulaFirma");

    if (nombrePrincipal && nombreFirma) {
        const syncNombre = () => {
            nombreFirma.value = nombrePrincipal.value;
        };

        nombrePrincipal.addEventListener("input", syncNombre);
        nombrePrincipal.addEventListener("change", syncNombre);
    }

    if (cedulaPrincipal && cedulaFirma) {
        const syncCedula = () => {
            cedulaFirma.value = cedulaPrincipal.value;
        };

        cedulaPrincipal.addEventListener("input", syncCedula);
        cedulaPrincipal.addEventListener("change", syncCedula);
    }
});
