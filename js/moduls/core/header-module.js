// Módulo de generación del header de navegación
// Depende de: headerData (cargado desde js/moduls/header.js, que va en commonScripts)

function generarHeader() {
  if (typeof headerData === "undefined") return;

  const headerContainer = document.querySelector(
    "body > .container-fluid.bg-light"
  );
  if (!headerContainer) return;

  const resolvePath = typeof window.resolveSuperarsePath === "function"
    ? window.resolveSuperarsePath
    : (path) => path;

  const generarDropdownMenu = (items) => {
    let menuHtml = "";
    items.forEach((item) => {
      if (item.items) {
        menuHtml += `
          <div class="dropdown dropright">
            <a class="dropdown-item dropdown-toggle"
               href="${resolvePath(item.enlace || "#")}"
               id="${item.id || ""}"
               aria-haspopup="true"
               aria-expanded="false">
              ${item.texto}
            </a>
            <div class="dropdown-menu rounded-0 m-0" aria-labelledby="${item.id || ""}">
              ${generarDropdownMenu(item.items)}
            </div>
          </div>`;
      } else {
        menuHtml += `<a href="${resolvePath(item.enlace)}" class="dropdown-item"
          ${item.target ? `target="${item.target}"` : ""}>${item.texto}</a>`;
      }
    });
    return menuHtml;
  };

  let topbarHtml = `
    <nav class="navbar navbar-expand-lg py-1 px-0 px-lg-1 fixed-top bg-dark navbar-dark"
         style="font-size: 0.9rem; z-index: 1030">
      <button type="button" class="navbar-toggler"
              data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="d-flex justify-content-start w-100">`;

  headerData.topbar.slice(0, 2).forEach((item) => {
    topbarHtml += `<a href="${resolvePath(item.enlace)}" class="navbar-link ${item.clases}">
      <i class="${item.icono}"></i>${item.texto}</a>`;
  });

  topbarHtml += `</div><div class="navbar-nav ml-auto" style="margin-right: 10%">`;

  headerData.topbar.slice(2).forEach((item) => {
    if (item.items) {
      topbarHtml += `
        <div class="nav-item dropdown">
          <a href="#" class="${item.clases}" data-toggle="dropdown">${item.texto}</a>
          <div class="dropdown-menu rounded-0 m-0">
            ${generarDropdownMenu(item.items)}
          </div>
        </div>`;
    } else {
      topbarHtml += `<a href="${resolvePath(item.enlace)}" class="${item.clases}"
        ${item.target ? `target="${item.target}"` : ""}>${item.texto}</a>`;
    }
  });

  topbarHtml += `</div></nav>`;

  let mainNavHtml = `
    <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-1 fixed-top"
         style="margin-top: 28px; z-index: 1020">
      <a href="${resolvePath('/index.html')}" class="navbar-brand" style="width: min-content; height: min-content">
        <img src="${resolvePath('/assets/img/content/logo/superarse_gris.png')}" alt="logo" width="140rem" />
      </a>
      <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
        <div class="navbar-nav font-weight-bold mx-auto py-0">`;

  headerData.mainNav.forEach((item) => {
    if (item.items) {
      mainNavHtml += `
        <div class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">${item.texto}</a>
          <div class="dropdown-menu rounded-0 m-0">
            ${generarDropdownMenu(item.items)}
          </div>
        </div>`;
    } else {
      mainNavHtml += `<a href="${resolvePath(item.enlace)}" class="nav-item nav-link">${item.texto}</a>`;
    }
  });

  mainNavHtml += `
        </div>
        <a href="${resolvePath(headerData.finalLink.enlace)}"
           class="${headerData.finalLink.clases}"
           ${headerData.finalLink.target ? `target="${headerData.finalLink.target}"` : ""}>
          ${headerData.finalLink.texto}
        </a>
      </div>
    </nav>`;

  headerContainer.innerHTML = topbarHtml + mainNavHtml;
}
