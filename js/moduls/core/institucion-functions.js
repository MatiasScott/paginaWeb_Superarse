// Funciones de vistas institucionales

function generarValores() {
  const listGroupContainer = document.querySelector("#list-tab");
  const tabContentContainer = document.querySelector("#nav-tabContent");

  if (!listGroupContainer || !tabContentContainer) {
    console.error(
      "No se encontraron los contenedores para los Valores. Revisa los IDs."
    );
    return;
  }

  // Mapea y crea el HTML para los botones de la lista
  const listGroupHTML = valoresData
    .map((valor, index) => {
      const isActive = index === 0 ? "active" : "";
      return `
      <a class="list-group-item list-group-item-action ${isActive}"
         id="${valor.id}-list"
         data-bs-toggle="list"
         href="#${valor.id}"
         role="tab"
         aria-controls="${valor.id}">
        ${valor.nombre}
      </a>
    `;
    })
    .join("");

  // Mapea y crea el HTML para el contenido de las pestañas
  const tabContentHTML = valoresData
    .map((valor, index) => {
      const isActive = index === 0 ? "show active" : "";
      return `
      <div class="tab-pane fade ${isActive}"
           id="${valor.id}"
           role="tabpanel"
           aria-labelledby="${valor.id}-list">
           <h4>${valor.nombre}</h4>
        <p>${valor.texto}</p>
      </div>
    `;
    })
    .join("");

  // Inserta el HTML generado en los contenedores respectivos
  listGroupContainer.innerHTML = listGroupHTML;
  tabContentContainer.innerHTML = tabContentHTML;
}

// Esta función puede ir en tu main.js o en un archivo aparte.

function generarPlanesAcademicos() {
  // Encuentra el contenedor principal donde se insertarán las tarjetas
  const container = document.querySelector("#academic-plans-container");

  if (!container) {
    console.error("No se encontró el contenedor para los planes académicos.");
    return;
  }

  // Genera el HTML de las tarjetas usando el array de datos
  const cardsHTML = academicPlansData
    .map(
      (item) => `
    <div class="col-md-6 mb-3">
      <div class="card p-3">
        <i class="${item.icon} mb-2 text-primary"></i>
        <h5 class="card-title">${item.title}</h5>
        <p class="card-text">
          ${item.description}
        </p>
      </div>
    </div>
  `
    )
    .join("");

  // Inserta el HTML completo en el contenedor
  container.innerHTML = cardsHTML;
}
// Esta función puede ir en tu main.js o en un archivo aparte.

function generarEquipoDirectivo() {
  const container = document.querySelector("#equipo-directivo-container");
  if (!container) {
    console.error(
      "No se encontró el contenedor para el equipo directivo. Revisa el ID."
    );
    return;
  }

  const peopleById = authoritiesData.reduce((acc, person) => {
    acc[person.id] = person;
    return acc;
  }, {});

  const renderPerson = (roleId) => {
    if (!roleId || !peopleById[roleId]) {
      return '<p class="authority-vacant mb-0">Cargo institucional</p>';
    }

    const person = peopleById[roleId];
    return `
      <div class="authority-person">
        <img
          class="img-fluid-autoridades rounded-circle"
          src="${person.image}"
          alt="${person.altText}"
        />
        <p class="authority-person-name mb-1">${person.name}</p>
        <p class="authority-person-email mb-0">
          <a href="mailto:${person.email}">${person.email}</a>
        </p>
      </div>
    `;
  };

  const renderUnitsTree = (units) => {
    if (!units || !units.length) {
      return "";
    }

    const nodes = units
      .map(
        (unit) => `
      <li>
        <article class="authority-unit-card">
          <h5 class="authority-unit-title">${unit.title}</h5>
          ${renderPerson(unit.roleId)}
        </article>
        ${renderUnitsTree(unit.children)}
      </li>
    `
      )
      .join("");

    return `<ul class="authority-tree">${nodes}</ul>`;
  };

  const renderBranchChildren = (dependency) => {
    if (!dependency.children || !dependency.children.length) {
      return "";
    }

    if (dependency.roleId === "vicerrectorado_academico") {
      const columns = dependency.children
        .map(
          (unit) => `
        <div class="col-12 col-lg-4 mb-4 d-flex">
          <div class="authority-subbranch w-100">
            <article class="authority-unit-card authority-unit-card--inner h-100">
              <h5 class="authority-unit-title">${unit.title}</h5>
              ${renderPerson(unit.roleId)}
              ${renderUnitsTree(unit.children)}
            </article>
          </div>
        </div>
      `
        )
        .join("");

      return `<div class="row authority-subbranches mt-4">${columns}</div>`;
    }

    return renderUnitsTree(dependency.children);
  };

  const governingHTML = authoritiesOrgChart.gobierno
    .map(
      (item) => `
    <div class="col-12 col-md-6 col-lg-3 mb-3 d-flex">
      <article class="authority-unit-card authority-unit-card--top w-100">
        <h4 class="authority-unit-title mb-0">${item.title}</h4>
      </article>
    </div>
  `
    )
    .join("");

  const rectorado = authoritiesOrgChart.rectorado;
  const rectoradoApoyoHTML = rectorado.apoyo
    .map(
      (item) => `
    <div class="col-12 col-md-6 col-lg-3 mb-3 d-flex">
      <article class="authority-unit-card w-100">
        <h5 class="authority-unit-title">${item.title}</h5>
        ${renderPerson(item.roleId)}
      </article>
    </div>
  `
    )
    .join("");

  const vicerrectorado = authoritiesOrgChart.dependencias.find(
    (dependency) => dependency.roleId === "vicerrectorado_academico"
  );

  const secondaryDependencies = authoritiesOrgChart.dependencias.filter(
    (dependency) => dependency.roleId !== "vicerrectorado_academico"
  );

  const vicerrectoradoHTML = vicerrectorado
    ? `
    <div class="col-12 mb-5 d-flex">
      <article class="authority-branch authority-branch--primary w-100">
        <h4 class="authority-branch-title">${vicerrectorado.title}</h4>
        ${renderPerson(vicerrectorado.roleId)}
        ${renderBranchChildren(vicerrectorado)}
      </article>
    </div>
  `
    : "";

  const dependenciesHTML = secondaryDependencies
    .map(
      (dependency) => `
    <div class="col-12 mb-4 d-flex justify-content-center authority-secondary-col">
      <article class="authority-branch w-100">
        <h4 class="authority-branch-title">${dependency.title}</h4>
        ${renderPerson(dependency.roleId)}
        ${renderBranchChildren(dependency)}
      </article>
    </div>
  `
    )
    .join("");

  container.innerHTML = `
    <section class="authority-org">
      <div class="row justify-content-center mb-2">
        ${governingHTML}
      </div>

      <div class="row justify-content-center mb-3">
        <div class="col-12 col-lg-6">
          <article class="authority-branch authority-branch--rectorado text-center">
            <h3 class="authority-branch-title">${rectorado.title}</h3>
            ${renderPerson(rectorado.roleId)}
          </article>
        </div>
      </div>

      <div class="row justify-content-center mb-3">
        ${rectoradoApoyoHTML}
      </div>

      <div class="row justify-content-center">
        ${vicerrectoradoHTML}
      </div>

      <div class="row justify-content-center authority-secondary-row">
        ${dependenciesHTML}
      </div>
    </section>
  `;
}

// Esta función puede ir en tu main.js o en un archivo aparte.

function generarModelosAcordeon() {

  // Encuentra el contenedor principal del acordeón por su ID
  const accordionContainer = document.querySelector("#modelsAccordion");
  if (!accordionContainer) {
    console.error("No se encontró el contenedor del acordeón. Revisa el ID.");
    return;
  }
  // Genera el HTML completo del acordeón usando el array de datos

  const accordionHTML = modelsData
    .map((model, index) => {
      // Determina si es el primer elemento para aplicar la clase 'active'
      const isActive = index === 0 ? "show" : "";
      const isCollapsed = index === 0 ? "" : "collapsed";
      return `
<div class="card">
<div class="card-header" id="heading${model.id}">
<h2 class="mb-0">
<button
 class="btn btn-block text-left d-flex justify-content-between align-items-center ${isCollapsed}"
type="button"
data-toggle="collapse"
data-target="#collapse${model.id}"
aria-expanded="${index === 0 ? "true" : "false"}"
aria-controls="collapse${model.id}">
<span>${model.title}</span>
<i class="fa fa-chevron-down"></i>
</button>
</h2>
</div>
<div
id="collapse${model.id}"
class="collapse ${isActive}"
aria-labelledby="heading${model.id}"
data-parent="#modelsAccordion"
>
<div class="card-body text-center">
<div
class="embed-responsive embed-responsive-4by3 w-100 mb-3"
style="height: 500px"
>
<iframe
class="embed-responsive-item"
src="${model.filePath}"
style="width: 100%; height: 100%; border: 0"
frameborder="0"
allowfullscreen
 ></iframe>
</div>
</div>
</div>
</div>
 `;
    })

  // Inserta el HTML completo en el contenedor del acordeón

  accordionContainer.innerHTML = accordionHTML;

}


// Esta función puede ir en tu main.js o en un archivo aparte.

function generarReglamentosAcordeon() {
  const accordionContainer = document.querySelector("#regulationsAccordion");

  if (!accordionContainer) {
    console.error("No se encontró el contenedor del acordeón. Revisa el ID.");
    return;
  }

  const accordionHTML = regulationsData
    .map((regulation, index) => {
      // Determina si es el primer elemento para que esté abierto por defecto
      const isFirst = index === 0;
      const isActive = isFirst ? "show" : "";
      const isCollapsed = isFirst ? "" : "collapsed";

      return `
      <div class="card">
        <div class="card-header" id="heading${regulation.id}">
          <h2 class="mb-0">
            <button
              class="btn btn-block text-left d-flex justify-content-between align-items-center ${isCollapsed}"
              type="button"
              data-toggle="collapse"
              data-target="#collapse${regulation.id}"
              aria-expanded="${isFirst ? "true" : "false"}"
              aria-controls="collapse${regulation.id}"
            >
              <span>${regulation.title}</span>
              <i class="fa fa-chevron-down"></i>
            </button>
          </h2>
        </div>
        <div
          id="collapse${regulation.id}"
          class="collapse ${isActive}"
          aria-labelledby="heading${regulation.id}"
          data-parent="#regulationsAccordion"
        >
          <div class="card-body text-center">
            <div class="embed-responsive embed-responsive-4by3 w-100 mb-3" style="height: 600px;">
              <iframe
                class="embed-responsive-item"
                src="${regulation.filePath}"
                style="width:100%; height:100%; border:0;"
                frameborder="0"
                allowfullscreen
              ></iframe>
            </div>
          </div>
        </div>
      </div>
    `;
    })
    .join("");

  accordionContainer.innerHTML = accordionHTML;
}

// menu de gestion academica
// Esta función puede ir en tu main.js o en un archivo aparte

function generarModalidades() {
  const listGroupContainer = document.querySelector("#list-tab");
  const tabContentContainer = document.querySelector("#nav-tabContent");

  if (!listGroupContainer || !tabContentContainer) {
    console.error(
      "No se encontraron los contenedores para los Valores. Revisa los IDs."
    );
    return;
  }

  // Mapea y crea el HTML para los botones de la lista
  const listGroupHTML = modalidadesData
    .map((modalidad, index) => {
      const isActive = index === 0 ? "active" : "";
      return `
      <a class="list-group-item list-group-item-action ${isActive}"
          id="${modalidad.id}-list"
          data-bs-toggle="list"
          href="#${modalidad.id}"
          role="tab"
          aria-controls="${modalidad.id}">
        ${modalidad.nombre}
      </a>
    `;
    })
    .join("");

  // Mapea y crea el HTML para el contenido de las pestañas
  const tabContentHTML = modalidadesData
    .map((modalidad, index) => {
      const isActive = index === 0 ? "show active" : "";
      return `
      <div class="tab-pane fade ${isActive}"
           id="${modalidad.id}"
           role="tabpanel"
           aria-labelledby="${modalidad.id}-list">
        <h5>${modalidad.nombre}</h5>
        <p class="texto-justificado">${modalidad.texto}</p>
      </div>
    `;
    })
    .join("");

  // Inserta el HTML generado en los contenedores respectivos
  listGroupContainer.innerHTML = listGroupHTML;
  tabContentContainer.innerHTML = tabContentHTML;
}

