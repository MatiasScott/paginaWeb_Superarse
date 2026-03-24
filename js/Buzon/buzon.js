document.addEventListener('DOMContentLoaded', () => {

    // ==============================
    // CONTADOR DE CARACTERES
    // ==============================
    const mensajeTextarea = document.getElementById('mensaje');
    const charCount = document.getElementById('charCount');

    if (mensajeTextarea && charCount) {
        mensajeTextarea.addEventListener('input', function () {
            charCount.textContent = this.value.length;
        });
    }

    // ==============================
    // FORMULARIO
    // ==============================
    const form = document.getElementById('buzonForm');
    const alertBox = document.getElementById('alertBox');
    const submitBtn = document.getElementById('submitBtn');

    if (!form) return;

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const tipo = document.getElementById('tipo').value;
        const mensaje = mensajeTextarea.value;

        // ==============================
        // VALIDACIONES
        // ==============================
        if (!tipo || !mensaje.trim()) {
            showAlert('Por favor, completa todos los campos.', 'error');
            return;
        }

        if (mensaje.trim().length < 10) {
            showAlert('El mensaje debe tener al menos 10 caracteres.', 'error');
            return;
        }

        try {
            // ==============================
            // ESTADO DE CARGA
            // ==============================
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enviando...';

            const formData = new FormData();
            formData.append('tipo', tipo);
            formData.append('mensaje', mensaje);

            // ==============================
            // FETCH CON CONTROL DE ERROR
            // ==============================
            const controller = new AbortController();
            const timeout = setTimeout(() => controller.abort(), 10000);

            const response = await fetch('backend/enviar-buzon.php', {
                method: 'POST',
                body: formData,
                signal: controller.signal
            });

            clearTimeout(timeout);

            if (!response.ok) {
                throw new Error('Error en el servidor');
            }

            const data = await response.json();

            // ==============================
            // RESPUESTA
            // ==============================
            if (data.success) {
                showAlert(data.message || 'Mensaje enviado correctamente.', 'success');
                form.reset();
                charCount.textContent = '0';

                window.scrollTo({ top: 0, behavior: 'smooth' });
            } else {
                showAlert(data.message || 'Error al enviar el mensaje.', 'error');
            }

        } catch (error) {
            console.error('Error:', error);

            if (error.name === 'AbortError') {
                showAlert('El servidor tardó demasiado en responder.', 'error');
            } else {
                showAlert('Error al enviar el mensaje. Verifica tu conexión.', 'error');
            }
        } finally {
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<i class="fas fa-paper-plane"></i> Enviar mensaje';
        }
    });

    // ==============================
    // ALERTAS
    // ==============================
    function showAlert(message, type) {
        if (!alertBox) return;

        alertBox.className = `alert alert-${type}`;
        alertBox.style.display = 'block';

        const icon = type === 'success'
            ? 'fa-check-circle'
            : 'fa-exclamation-triangle';

        alertBox.innerHTML = `<i class="fas ${icon}"></i> ${message}`;

        if (type === 'success') {
            setTimeout(() => {
                alertBox.style.display = 'none';
            }, 5000);
        }
    }

});