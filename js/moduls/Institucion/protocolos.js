  /**
   * Función Unificada para mostrar/ocultar texto
   * @param {string} elementId - El ID del div que contiene el texto extra
   * @param {HTMLElement} button - El botón que dispara la acción (this)
   */
  function toggleText(elementId, button) {
    var x = document.getElementById(elementId);
    
    if (x.style.display === "none" || x.style.display === "") {
      x.style.display = "block";
      button.innerHTML = "Ver menos";
    } else {
      x.style.display = "none";
      button.innerHTML = "Ver más información";
    }
  }

  /**
   * Función para incluir archivos HTML externos (data-include)
   */
  function includeHTML() {
    const elements = document.querySelectorAll("[data-include]");
    elements.forEach((el) => {
      const file = el.getAttribute("data-include");
      fetch(file)
        .then((response) => {
          if (response.ok) return response.text();
          else throw new Error("Archivo no encontrado");
        })
        .then((data) => {
          el.innerHTML = data;
        })
        .catch((error) => {
          console.error("Error al cargar " + file, error);
          el.innerHTML = "<p>Error al cargar " + file + "</p>";
        });
    });
  }

  // Ejecutar carga de componentes al iniciar la página
  document.addEventListener("DOMContentLoaded", includeHTML);