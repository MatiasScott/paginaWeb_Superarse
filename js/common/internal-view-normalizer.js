(function () {
  function esVistaInterna() {
    const path = window.location.pathname.toLowerCase();
    return (
      path.includes("/moduls/") &&
      !path.includes("/vendor/") &&
      !path.includes("/content/menus/")
    );
  }

  function crearColorBar() {
    const wrapper = document.createElement("div");
    wrapper.className = "color-bar-container";
    wrapper.innerHTML = `
      <div class="color-stripe color-stripe-1"></div>
      <div class="color-stripe color-stripe-2"></div>
      <div class="color-stripe color-stripe-3"></div>
      <div class="color-stripe color-stripe-4"></div>
    `;
    return wrapper;
  }

  function normalizarHeaderYMain() {
    const header = document.querySelector(
      "body > .container-fluid.bg-light.position-relative.shadow"
    );

    if (!header) return;

    if (header.classList.contains("container-top")) {
      header.classList.remove("container-top");
    }

    const siguiente = header.nextElementSibling;
    if (
      siguiente &&
      siguiente.classList &&
      siguiente.classList.contains("container-fluid") &&
      siguiente.classList.contains("py-5") &&
      !siguiente.classList.contains("container-top")
    ) {
      siguiente.classList.add("container-top");
    }
  }

  function normalizarShells() {
    const shells = document.querySelectorAll(
      ".container-fluid.py-5.container-top > .container"
    );

    shells.forEach((shell) => {
      shell.classList.add("vista-shell");
    });
  }

  function normalizarHeaders() {
    const shells = document.querySelectorAll(
      ".container-fluid.py-5.container-top > .container.vista-shell"
    );

    shells.forEach((shell) => {
      if (shell.querySelector(":scope > .vista-head")) return;

      const children = Array.from(shell.children);
      const headerNodes = [];

      for (const child of children) {
        if (
          child.matches(
            ".section-title, h1, h2, p.text-center, p.px-lg-5, p.mb-5, p.mb-4, .h1-plataforma"
          )
        ) {
          headerNodes.push(child);
          continue;
        }

        if (
          headerNodes.length > 0 &&
          child.tagName === "P" &&
          !child.classList.contains("section-title")
        ) {
          headerNodes.push(child);
          continue;
        }

        break;
      }

      if (headerNodes.length === 0) return;

      const head = document.createElement("div");
      head.className = "vista-head text-center";
      shell.insertBefore(head, headerNodes[0]);
      headerNodes.forEach((node) => head.appendChild(node));
    });
  }

  function filaEsContenido(row) {
    if (!row || row.id) return false;
    if (row.closest(".vista-head")) return false;
    if (row.closest(".graduados-panel, .bib-panel, .servicios-panel")) return false;
    return true;
  }

  function tienePanelInterno(columna) {
    return Boolean(
      columna.querySelector(
        ".servicios-panel, .graduados-panel, .bib-panel, .border.rounded, .card, .vista-panel, .table-responsive"
      )
    );
  }

  function normalizarFilasYPaneles() {
    const shells = document.querySelectorAll(
      ".container-fluid.py-5.container-top > .container.vista-shell"
    );

    shells.forEach((shell) => {
      const directRows = Array.from(shell.children).filter(
        (child) => child.tagName === "DIV" && child.classList.contains("row")
      );

      directRows.forEach((row) => {
        if (!filaEsContenido(row)) return;
        row.classList.add("vista-grid");

        const columnas = Array.from(row.children).filter((child) =>
          /(^|\s)col-/.test(child.className)
        );

        columnas.forEach((columna) => {
          if (!tienePanelInterno(columna)) {
            columna.classList.add("vista-column-panel");
          }
        });
      });
    });

    document
      .querySelectorAll(".container-top .border.rounded")
      .forEach((panel) => panel.classList.add("vista-panel"));
  }

  function asegurarColorBar() {
    const footer = document.querySelector(".footer-container");
    if (!footer) return;

    const hasColorBar = Boolean(
      document.querySelector(".color-bar-container")
    );

    if (!hasColorBar) {
      footer.parentNode.insertBefore(crearColorBar(), footer);
    }
  }

  function init() {
    if (!esVistaInterna()) return;

    document.body.classList.add("vista-interna");
    normalizarHeaderYMain();
    normalizarShells();
    normalizarHeaders();
    normalizarFilasYPaneles();
    asegurarColorBar();
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }
})();
