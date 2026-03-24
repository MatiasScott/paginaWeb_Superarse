document.addEventListener('DOMContentLoaded', function() {
    // Referencias a los elementos del DOM
    const canvas = document.getElementById('signature-pad-canvas');
    const signaturePad = new SignaturePad(canvas, { backgroundColor: 'rgb(255, 255, 255)' });
    const clearBtn = document.getElementById('clear-signature');
    const generatePdfBtn = document.getElementById('generate-pdf-btn');
    const becaForm = document.getElementById('becaForm');

    // Función para redimensionar el canvas de la firma
    function resizeCanvas() {
        const ratio = Math.max(window.devicePixelRatio || 1, 1);
        canvas.width = canvas.offsetWidth * ratio;
        canvas.height = canvas.offsetHeight * ratio;
        canvas.getContext("2d").scale(ratio, ratio);
        signaturePad.clear();
    }

    // Inicializar y manejar redimensionamiento
    window.addEventListener("resize", resizeCanvas);
    resizeCanvas();

    // Evento para limpiar la firma
    clearBtn.addEventListener('click', () => signaturePad.clear());

    // Función de validación del formulario
    function validateForm() {
        const requiredFields = ['nombre', 'identificacion', 'periodo', 'carrera', 'nivel', 'telefono'];
        for (const field of requiredFields) {
            const el = document.querySelector(`[name="${field}"]`);
            if (!el.value) {
                alert(`Por favor, complete todos los campos obligatorios.`);
                el.focus();
                return false;
            }
        }
        if (!document.querySelector('input[name="tipo_beca"]:checked')) {
            alert('Por favor, seleccione un tipo de beca.');
            return false;
        }
        if (signaturePad.isEmpty()) {
            alert('Por favor, proporcione su firma.');
            return false;
        }
        return true;
    }

    // Evento del botón de envío
    generatePdfBtn.addEventListener('click', async function() {
        if (!validateForm()) return;

        // Desactivar el botón y cambiar el texto
        generatePdfBtn.disabled = true;
        generatePdfBtn.textContent = 'Generando PDF...';

        // Ocultar elementos de la firma y botón antes de generar el PDF
        const signatureImage = new Image();
        signatureImage.src = signaturePad.toDataURL('image/png');
        signatureImage.style.width = '100%';
        signatureImage.style.display = 'block';

        const canvasContainer = canvas.parentNode;
        canvas.style.display = 'none';
        clearBtn.style.display = 'none';
        canvasContainer.insertBefore(signatureImage, canvas);
        
        document.querySelector('.buttons-container').classList.add('hide-on-pdf');
        const pdfContent = document.getElementById('pdf-content');
        
        try {
            // 1. Generar el PDF en el lado del cliente
            const canvasPdf = await html2canvas(pdfContent, { scale: 2, useCORS: true });
            const imgData = canvasPdf.toDataURL('image/jpeg', 0.98);

            const { jsPDF } = window.jspdf;
            const pdf = new jsPDF({ orientation: 'p', unit: 'mm', format: 'a4' });
            const pdfWidth = pdf.internal.pageSize.getWidth();
            const imgProps = pdf.getImageProperties(imgData);
            const imgHeight = (imgProps.height * pdfWidth) / imgProps.width;
            
            pdf.addImage(imgData, 'JPEG', 0, 0, pdfWidth, imgHeight);
            
            const nombre = document.getElementById('nombre').value.trim().replace(/\s+/g, '_');
            pdf.save(`solicitud_beca_${nombre || 'estudiante'}.pdf`);

            // 2. Enviar los datos del formulario (incluida la firma) al servidor
            generatePdfBtn.textContent = 'Enviando Solicitud...';
            const formData = new FormData(becaForm);
            formData.set('firma_data_base64', signaturePad.toDataURL('image/png'));
            
            const response = await fetch(becaForm.action, { method: 'POST', body: formData });

            if (!response.ok) {
                // Si la respuesta no es 2xx, lanzar un error para el bloque catch
                const errorMessage = await response.text();
                throw new Error(`Error del servidor: ${response.statusText} - ${errorMessage}`);
            }

            const result = await response.text();
            console.log('Respuesta del servidor:', result);
            alert(result); // Mostrar la respuesta del servidor (éxito o error)
            
        } catch (error) {
            console.error('Ocurrió un error:', error);
            alert('El PDF se ha descargado, pero ocurrió un error al enviar los datos al servidor. Por favor, intente de nuevo o contacte a soporte.');
        } finally {
            // Volver a habilitar el botón y mostrar los elementos de la firma
            generatePdfBtn.disabled = false;
            generatePdfBtn.textContent = 'Enviar Solicitud y Descargar PDF';
            document.querySelector('.buttons-container').classList.remove('hide-on-pdf');
            canvas.style.display = 'block';
            clearBtn.style.display = 'block';
            // Eliminar la imagen temporal de la firma si existe
            const tempSignatureImage = canvasContainer.querySelector('img');
            if (tempSignatureImage) {
                canvasContainer.removeChild(tempSignatureImage);
            }
        }
    });
});