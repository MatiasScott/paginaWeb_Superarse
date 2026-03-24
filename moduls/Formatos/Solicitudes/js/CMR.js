function descargarPDF() {

    // 1️⃣ VALIDACIÓN DE CAMPOS
    const campos = document.querySelectorAll(
        '#documento input, #documento select'
    );

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
        return; // ⛔ BLOQUEA DESCARGA
    }

    // 2️⃣ VALIDACIÓN DE CORREO
    const correo = document.querySelector('input[type="email"]');
    const regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!regexCorreo.test(correo.value)) {
        alert('⚠️ Ingrese un correo electrónico válido.');
        correo.classList.add('border-red-500');
        correo.focus();
        return;
    }

    // 3️⃣ SI TODO ESTÁ OK → TU PDF ORIGINAL
    window.scrollTo(0, 0);

    const element = document.getElementById('documento');

    const opt = {
        margin: 0,
        filename: 'Solicitud_Cambio_Malla.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        pagebreak: { mode: 'avoid-all' },
        html2canvas: {
            scale: 2,
            useCORS: true,
            scrollY: 0,
            letterRendering: true
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
// 🔁 COPIA AUTOMÁTICA DE DATOS A FIRMA DEL ESTUDIANTE
document.addEventListener("DOMContentLoaded", () => {
    const nombrePrincipal = document.getElementById("nombrePrincipal");
    const cedulaPrincipal = document.getElementById("cedulaPrincipal");

    const nombreFirma = document.getElementById("nombreFirma");
    const cedulaFirma = document.getElementById("cedulaFirma");

    if (nombrePrincipal && nombreFirma) {
        nombrePrincipal.addEventListener("input", () => {
            nombreFirma.value = nombrePrincipal.value;
        });
    }

    if (cedulaPrincipal && cedulaFirma) {
        cedulaPrincipal.addEventListener("input", () => {
            cedulaFirma.value = cedulaPrincipal.value;
        });
    }
});
