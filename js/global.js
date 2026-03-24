// js/global.js

/**
 * Carga contenido HTML externo en elementos con atributo [data-include]
 * Ejemplo: <div data-include="/components/header.html"></div>
 */

async function includeHTML() {
  const elements = document.querySelectorAll("[data-include]");

  if (!elements.length) return;

  try {
    const requests = Array.from(elements).map(async (el) => {
      const file = el.getAttribute("data-include");

      // Validación básica
      if (!file) return;

      // Evitar recargar si ya fue cargado
      if (el.getAttribute("data-loaded") === "true") return;

      try {
        const response = await fetch(file);

        if (!response.ok) {
          throw new Error(`No se pudo cargar: ${file} (${response.status})`);
        }

        const html = await response.text();

        el.innerHTML = html;

        // Marcar como cargado
        el.setAttribute("data-loaded", "true");

      } catch (error) {
        console.error("Include error:", error.message);

        el.innerHTML = `
          <div style="color:red; font-size:14px;">
            Error al cargar: ${file}
          </div>
        `;
      }
    });

    // Esperar a que todo termine
    await Promise.all(requests);

  } catch (globalError) {
    console.error("Error general en includeHTML:", globalError);
  }
}

/**
 * Inicialización automática cuando el DOM esté listo
 */
document.addEventListener("DOMContentLoaded", () => {
  includeHTML();
});