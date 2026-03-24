// Módulo del Buzón de cumplidos, sugerencias y quejas
// Sin dependencias de datos externos — solo DOM

function inicializarBuzon() {
  const buzonBtn = document.getElementById("buzonBtn");
  const buzonModal = document.getElementById("buzonModal");
  const buzonClose = document.querySelector(".buzon-close");
  const buzonForm = document.getElementById("buzonForm");
  const buzonAlert = document.getElementById("buzonAlert");
  const buzonSubmitBtn = document.getElementById("buzonSubmitBtn");

  if (!buzonBtn || !buzonModal) return;

  buzonBtn.addEventListener("click", function () {
    buzonModal.style.display = "block";
    document.body.style.overflow = "hidden";
  });

  if (buzonClose) {
    buzonClose.addEventListener("click", cerrarModal);
  }

  window.addEventListener("click", function (e) {
    if (e.target === buzonModal) cerrarModal();
  });

  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape" && buzonModal.style.display === "block") {
      cerrarModal();
    }
  });

  function cerrarModal() {
    buzonModal.style.display = "none";
    document.body.style.overflow = "auto";
    resetBuzonForm();
  }

  if (buzonForm) {
    buzonForm.addEventListener("submit", function (e) {
      e.preventDefault();

      const tipo = document.getElementById("buzonTipo").value;
      const mensaje = document.getElementById("buzonMensaje").value.trim();

      if (!tipo || !mensaje) {
        showBuzonAlert("Por favor, completa todos los campos.", "error");
        return;
      }

      buzonSubmitBtn.disabled = true;
      buzonSubmitBtn.innerHTML =
        '<i class="fas fa-spinner fa-spin"></i> Enviando...';

      const formData = new FormData();
      formData.append("tipo", tipo);
      formData.append("mensaje", mensaje);

      fetch("/enviar-buzon.php", { method: "POST", body: formData })
        .then(function (res) {
          return res.json();
        })
        .then(function (data) {
          if (data.success) {
            showBuzonAlert(data.message, "success");
            setTimeout(cerrarModal, 2000);
          } else {
            showBuzonAlert(
              data.message || "Error al enviar el mensaje.",
              "error"
            );
          }
        })
        .catch(function () {
          showBuzonAlert("Error al enviar el mensaje.", "error");
        })
        .finally(function () {
          buzonSubmitBtn.disabled = false;
          buzonSubmitBtn.innerHTML =
            '<i class="fas fa-paper-plane"></i> Enviar mensaje';
        });
    });
  }

  function showBuzonAlert(message, type) {
    const icon =
      type === "success"
        ? '<i class="fas fa-check-circle"></i>'
        : '<i class="fas fa-exclamation-triangle"></i>';
    buzonAlert.className = "buzon-alert buzon-alert-" + type;
    buzonAlert.innerHTML = icon + " " + message;
    buzonAlert.style.display = "flex";

    const modalBody = document.querySelector(".buzon-modal-body");
    if (modalBody) modalBody.scrollTop = 0;

    if (type === "success") {
      setTimeout(function () {
        buzonAlert.style.display = "none";
      }, 5000);
    }
  }

  function resetBuzonForm() {
    if (buzonForm) buzonForm.reset();
    if (buzonAlert) buzonAlert.style.display = "none";
  }
}
