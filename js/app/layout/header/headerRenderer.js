// Módulo de generación del header de navegación
// Depende de: headerData (cargado desde js/moduls/header.js, que va en commonScripts)

function generarHeader() {
  if (typeof headerData === "undefined") return;

  const headerContainer = document.querySelector(
    "#header-container, body > .container-fluid.bg-light"
  );
  if (!headerContainer) return;
  if (headerContainer.dataset.headerRendered === "true") return;

  const generarDropdownMenu = (items) => {
    let menuHtml = "";
    items.forEach((item) => {
      const tooltip = item.descripcion ? `title="${item.descripcion}"` : "";
      if (item.items) {
        menuHtml += `
            <div class="dropdown dropright">
                <a class="dropdown-item dropdown-toggle" href="${item.enlace || "#"}" id="${item.id || ""}" aria-haspopup="true" aria-expanded="false" ${tooltip}>
                    ${item.texto}
                </a>
                <div class="dropdown-menu rounded-0 m-0" aria-labelledby="${item.id || ""}">
                    ${generarDropdownMenu(item.items)}
                </div>
            </div>`;
      } else {
        menuHtml += `<a href="${item.enlace}" class="dropdown-item" ${item.target ? `target="${item.target}"` : ""} ${tooltip}>${item.texto}</a>`;
      }
    });
    return menuHtml;
  };

  let topbarHtml = `
    <nav class="navbar navbar-dark bg-dark py-1 px-4 fixed-top d-none d-lg-block" style="font-size: 0.85rem; z-index: 1030; height: 33px;">
        <div class="d-flex justify-content-between align-items-center w-100">
            <div class="d-flex align-items-center">
    `;

  headerData.topbar.slice(0, 1).forEach((item) => {
    topbarHtml += `<a href="${item.enlace}" class="text-white mr-4" style="text-decoration:none;"><i class="${item.icono} mr-1"></i>${item.texto}</a>`;
  });

  topbarHtml += `
            </div>
            <div class="d-flex align-items-center">`;

  headerData.topbar.slice(1).forEach((item) => {
    if (item.items) {
      topbarHtml += `
            <div class="dropdown ml-3">
                <a href="#" class="text-white dropdown-toggle" data-toggle="dropdown" style="text-decoration:none;">${item.texto}</a>
                <div class="dropdown-menu dropdown-menu-right rounded-0 m-0">
                    ${generarDropdownMenu(item.items)}
                </div>
            </div>`;
    } else {
      topbarHtml += `<a href="${item.enlace}" class="text-white ml-3" style="text-decoration:none;" ${item.target ? `target="${item.target}"` : ""}>${item.texto}</a>`;
    }
  });

  topbarHtml += `</div></div></nav>`;

  let mainNavHtml = `
    <nav class="navbar navbar-expand-lg bg-light navbar-light py-2 py-lg-0 px-3 fixed-top custom-nav-responsive" style="z-index: 1020">
        <a href="${APP.url('')}" class="navbar-brand">
            <img src="${APP.asset('assets/img/content/logo/superarse_gris.png')}" alt="logo" style="height: 45px; width: auto;" />
        </a>
        
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#mainNavbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="mainNavbarCollapse">
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
      mainNavHtml += `<a href="${item.enlace}" class="nav-item nav-link">${item.texto}</a>`;
    }
  });

  mainNavHtml += `
            </div>
            <a href="${headerData.finalLink.enlace}" class="${headerData.finalLink.clases} mt-3 mt-lg-0" ${headerData.finalLink.target ? `target="${headerData.finalLink.target}"` : ""}>
                ${headerData.finalLink.texto}
            </a>
        </div>
    </nav>`;

  headerContainer.innerHTML = topbarHtml + mainNavHtml;
  headerContainer.dataset.headerRendered = "true";
}
