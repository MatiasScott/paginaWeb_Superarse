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
        correo?.classList.add('border-red-500');
        correo?.focus();
        return;
    }

    // 🔁 SINCRONIZACIÓN FINAL DE DATOS
    const nombrePrincipal = document.getElementById("nombrePrincipal");
    const cedulaPrincipal = document.getElementById("cedulaPrincipal");
    const nombreFirma = document.getElementById("nombreFirma");
    const cedulaFirma = document.getElementById("cedulaFirma");

    if (nombrePrincipal && nombreFirma) {
        nombreFirma.value = nombrePrincipal.value;
    }
    if (cedulaPrincipal && cedulaFirma) {
        cedulaFirma.value = cedulaPrincipal.value;
    }

    // 3️⃣ GENERAR PDF
    window.scrollTo({ top: 0, behavior: 'instant' });

    const element = document.getElementById('documento');
    if (!element) {
        alert('Error interno al generar el documento');
        return;
    }

    const nombre = nombrePrincipal?.value.trim() || 'Estudiante';

    const opt = {
        margin: 0,
        filename: `Homologacion_${nombre}.pdf`,
        image: { type: 'jpeg', quality: 1 },
        pagebreak: { mode: ['avoid-all', 'css', 'legacy'] },
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

    html2pdf().set(opt).from(element).toPdf().get('pdf').then(pdf => {
        const totalPages = pdf.internal.getNumberOfPages();
        for (let i = totalPages; i > 1; i--) {
            pdf.deletePage(i);
        }
    }).save();
}

// 🔁 COPIA AUTOMÁTICA EN TIEMPO REAL
document.addEventListener("DOMContentLoaded", () => {

    const nombrePrincipal = document.getElementById("nombrePrincipal");
    const cedulaPrincipal = document.getElementById("cedulaPrincipal");
    const nombreFirma = document.getElementById("nombreFirma");
    const cedulaFirma = document.getElementById("cedulaFirma");

    if (nombrePrincipal && nombreFirma) {
        const syncNombre = () => nombreFirma.value = nombrePrincipal.value;
        nombrePrincipal.addEventListener("input", syncNombre);
        nombrePrincipal.addEventListener("change", syncNombre);
    }

    if (cedulaPrincipal && cedulaFirma) {
        const syncCedula = () => cedulaFirma.value = cedulaPrincipal.value;
        cedulaPrincipal.addEventListener("input", syncCedula);
        cedulaPrincipal.addEventListener("change", syncCedula);
    }
});
