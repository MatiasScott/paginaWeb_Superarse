function descargarPDF() {
    window.scrollTo(0, 0);

    const element = document.getElementById('documento');
    const nombre = document.getElementById('nombreEstudiante')?.value || 'Estudiante';

    const opt = {
        margin: 0,
        filename: `Retiro_Asignaturas_${nombre}.pdf`,
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
