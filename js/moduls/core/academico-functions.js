// Funciones de gestion academica, vinculacion y titulacion

function generarEscuelaDeSalud() {
  const cardsContainer = document.querySelector("#schoolOfHealthCards");
  const modalsContainer = document.querySelector("#schoolOfHealthModals");

  if (!cardsContainer || !modalsContainer) {
    console.error(
      "No se encontraron los contenedores para las tarjetas o modales de la Escuela de Salud. Revisa los IDs."
    );
    return;
  }

  let cardsHTML = "";
  let modalsHTML = "";

  schoolOfHealthData.forEach((career) => {
    // Generar la tarjeta de la carrera
    cardsHTML += `
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="career-card text-center p-4 border rounded shadow-sm h-100 d-flex flex-column justify-content-between">
          <h3 class="mb-3">${career.title}</h3>
          <a
            href="#"
            class="d-block mb-3"
            data-toggle="modal"
            data-target="#${career.id}Modal"
          >
            <img
              src="${career.imagePath}"
              alt="Imagen de ${career.title}"
              class="img-fluid rounded"
            />
          </a>
          <p class="text-muted">
            Haz clic en la imagen para ver más detalles de la carrera.
          </p>
        </div>
      </div>
    `;

    // Generar el modal de la carrera
    const profileList = career.profile
      .map((item) => `<li>${item}</li>`)
      .join("");
    const careerPathList = career.careerPath
      .map((item) => `<li>${item}</li>`)
      .join("");

    modalsHTML += `
      <div
        class="modal fade"
        id="${career.id}Modal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="${career.id}ModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="${career.id}ModalLabel">
                ${career.title}
              </h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
           <h4><i class="fas fa-file-alt"></i> Resolución</h4>
            <strong><p>${career.resolucion}</p></strong>
             <h4><i class="fas fa-file-alt"></i> Descripción de la Carrera</h4>
              <p style="text-align: justify;">${career.description}</p>

             <h4><i class="fas fa-user"></i> Perfil Profesional</h4>
              <ul style="text-align: justify;">${profileList}</ul>

             <h4><i class="fas fa-briefcase"></i> Campo Laboral</h4>
              <p>Los  ${career.title} pueden desempeñarse en:</p>
              <ul>${careerPathList}</ul>

              <h4><i class="fas fa-clock"></i> Duración de la Carrera</h4>
              <p>
                La carrera tiene una duración de <strong>${career.duration}</strong>.
              </p>

              <h4><i class="fas fa-laptop-code"></i> Modalidad</h4>
              <p>
                <strong>${career.modality}</strong>
              </p>

              <hr />
              <h4><i class="fas fa-list-ol"></i> Malla Curricular</h4>
              <p style="text-align: justify;">
                Consulta el plan de estudios detallado para esta carrera. Aquí podrás ver la distribución de asignaturas por semestre, créditos y requisitos.
              </p>
              <div class="text-center">
                <a
                  href="${career.curriculumLink}"
                  target="_blank"
                  class="btn btn-info py-2 px-4"
                >
                  <i class="fa fa-file-pdf mr-2"></i> Ver Malla Curricular PDF
                </a>
              </div>

              <hr />
              <p class="text-muted text-center">
                Para más detalles sobre requisitos de admisión o si tienes alguna pregunta adicional, por favor contacta a la secretaría académica.
              </p>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-dismiss="modal"
              >
                Cerrar
              </button>
            </div>
          </div>
        </div>
      </div>
    `;
  });

  cardsContainer.innerHTML = cardsHTML;
  modalsContainer.innerHTML = modalsHTML;
}

// Esta función puede ir en tu main.js o en un archivo aparte

function generarEducacionYHumanidades() {
  const cardsContainer = document.querySelector("#educationAndHumanitiesCards");
  const modalsContainer = document.querySelector(
    "#educationAndHumanitiesModals"
  );

  if (!cardsContainer || !modalsContainer) {
    console.error(
      "No se encontraron los contenedores para las tarjetas o modales de la Escuela de Educación y Humanidades. Revisa los IDs."
    );
    return;
  }

  let cardsHTML = "";
  let modalsHTML = "";

  educationAndHumanitiesData.forEach((career) => {
    // Generar la tarjeta de la carrera
    cardsHTML += `
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="career-card text-center p-4 border rounded shadow-sm h-100 d-flex flex-column justify-content-between">
          <h3 class="mb-3">${career.title}</h3>
          <a
            href="#"
            class="d-block mb-3"
            data-toggle="modal"
            data-target="#${career.id}Modal"
          >
            <img
              src="${career.imagePath}"
              alt="Imagen de ${career.title}"
              class="img-fluid rounded"
            />
          </a>
          <p class="text-muted">
            Haz clic en la imagen para ver más detalles de la carrera.
          </p>
        </div>
      </div>
    `;

    // Generar el modal de la carrera
    const profileList = career.profile
      .map((item) => `<li>${item}</li>`)
      .join("");
    const careerPathList = career.careerPath
      .map((item) => `<li>${item}</li>`)
      .join("");

    modalsHTML += `
      <div
        class="modal fade"
        id="${career.id}Modal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="${career.id}ModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="${career.id}ModalLabel">
                ${career.title}
              </h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <h4><i class="fas fa-file-alt"></i> Resolución</h4>
            <strong><p>${career.resolucion}</p></strong>
              <h4><i class="fas fa-file-alt"></i> Descripción de la Carrera</h4>
              <p style="text-align: justify;">${career.description}</p>

              <h4><i class="fas fa-user"></i> Perfil Profesional</h4>
              <ul style="text-align: justify;" >${profileList}</ul>

              <h4><i class="fas fa-briefcase"></i> Campo Laboral</h4>
              <p>Los  ${career.title} pueden desempeñarse en:</p>
              <ul style="text-align: justify;">${careerPathList}</ul>

              <h4><i class="fas fa-clock"></i> Duración de la Carrera</h4>
              <p style="text-align: justify;">
                La carrera tiene una duración de <strong>${career.duration}</strong>, incluyendo prácticas preprofesionales supervisadas.
              </p>

              <h4><i class="fas fa-laptop-code"></i> Modalidad</h4>
              <p>
                <strong>${career.modality}</strong>
              </p>

              <hr />
              <h4><i class="fas fa-list-ol"></i> Malla Curricular</h4>
              <p style="text-align: justify;">
                Consulta el plan de estudios detallado para esta carrera. Aquí podrás ver la distribución de asignaturas por semestre, créditos y requisitos.
              </p>
              <div class="text-center">
                <a
                  href="${career.curriculumLink}"
                  target="_blank"
                  class="btn btn-info py-2 px-4"
                >
                  <i class="fa fa-file-pdf mr-2"></i> Ver Malla Curricular PDF
                </a>
              </div>

              <hr />
              <p class="text-muted text-center">
                Para más detalles sobre requisitos de admisión o si tienes alguna pregunta adicional, por favor contacta a la secretaría académica.
              </p>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-dismiss="modal"
              >
                Cerrar
              </button>
            </div>
          </div>
        </div>
      </div>
    `;
  });

  cardsContainer.innerHTML = cardsHTML;
  modalsContainer.innerHTML = modalsHTML;
}

// Esta función puede ir en tu main.js o en un archivo aparte

function generarEscuelaDeVeterinaria() {
  const cardsContainer = document.querySelector("#veterinarySchoolCards");
  const modalsContainer = document.querySelector("#veterinarySchoolModals");

  if (!cardsContainer || !modalsContainer) {
    console.error(
      "No se encontraron los contenedores para las tarjetas o modales de la Escuela de Veterinaria. Revisa los IDs."
    );
    return;
  }

  let cardsHTML = "";
  let modalsHTML = "";

  veterinarySchoolData.forEach((career) => {
    // Generar la tarjeta de la carrera
    cardsHTML += `
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="career-card text-center p-4 border rounded shadow-sm h-100 d-flex flex-column justify-content-between">
          <h3 class="mb-3">${career.title}</h3>
          <a
            href="#"
            class="d-block mb-3"
            data-toggle="modal"
            data-target="#${career.id}Modal"
          >
            <img
              src="${career.imagePath}"
              alt="Imagen de ${career.title}"
              class="img-fluid rounded"
            />
          </a>
          <p class="text-muted">
            Haz clic en la imagen para ver más detalles de la carrera.
          </p>
        </div>
      </div>
    `;

    // Generar el modal de la carrera
    const profileList = career.profile
      .map((item) => `<li>${item}</li>`)
      .join("");
    const careerPathList = career.careerPath
      .map((item) => `<li>${item}</li>`)
      .join("");

    modalsHTML += `
      <div
        class="modal fade"
        id="${career.id}Modal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="${career.id}ModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="${career.id}ModalLabel">
                ${career.title}
              </h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

            <h4><i class="fas fa-file-alt"></i> Resolución</h4>
            <strong><p>${career.resolucion}</p></strong>
              <h4><i class="fas fa-file-alt"></i> Descripción de la Carrera</h4>
              <p style="text-align: justify;">${career.description}</p>

              <h4><i class="fas fa-user"></i> Perfil Profesional</h4>
              <ul style="text-align: justify;">${profileList}</ul>

              <h4><i class="fas fa-briefcase"></i> Campo Laboral</h4>
              <p style="text-align: justify;">Los  ${career.title} pueden desempeñarse en:</p>
              <ul style="text-align: justify;">${careerPathList}</ul>

              <h4><i class="fas fa-clock"></i> Duración de la Carrera</h4>
              <p style="text-align: justify;">
                La carrera tiene una duración de <strong>${career.duration}</strong>, incluyendo prácticas preprofesionales supervisadas.
              </p>

              <h4><i class="fas fa-laptop-code"></i> Modalidad</h4>
              <p>
                <strong>${career.modality}</strong>
              </p>

              <hr />
              <h4><i class="fas fa-list-ol"></i> Malla Curricular</h4>
              <p style="text-align: justify;">
                Consulta el plan de estudios detallado para esta carrera. Aquí podrás ver la distribución de asignaturas por semestre, créditos y requisitos.
              </p>
              <div class="text-center">
                <a
                  href="${career.curriculumLink}"
                  target="_blank"
                  class="btn btn-info py-2 px-4"
                >
                  <i class="fa fa-file-pdf mr-2"></i> Ver Malla Curricular PDF
                </a>
              </div>

              <hr />
              <p class="text-muted text-center">
                Para más detalles sobre requisitos de admisión o si tienes alguna pregunta adicional, por favor contacta a la secretaría académica.
              </p>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-dismiss="modal"
              >
                Cerrar
              </button>
            </div>
          </div>
        </div>
      </div>
    `;
  });

  cardsContainer.innerHTML = cardsHTML;
  modalsContainer.innerHTML = modalsHTML;
}

// Esta función puede ir en tu main.js o en un archivo aparte

function generarAdministracionEIndustria() {
  const cardsContainer = document.querySelector(
    "#administrationAndIndustryCards"
  );
  const modalsContainer = document.querySelector(
    "#administrationAndIndustryModals"
  );

  if (!cardsContainer || !modalsContainer) {
    console.error(
      "No se encontraron los contenedores para las tarjetas o modales de la Escuela de Administración e Industria. Revisa los IDs."
    );
    return;
  }

  let cardsHTML = "";
  let modalsHTML = "";

  administrationAndIndustryData.forEach((career) => {
    // Generar la tarjeta de la carrera
    cardsHTML += `
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="career-card text-center p-4 border rounded shadow-sm h-100 d-flex flex-column justify-content-between">
          <h3 class="mb-3">${career.title}</h3>
          <a
            href="#"
            class="d-block mb-3"
            data-toggle="modal"
            data-target="#${career.id}Modal"
          >
            <img
              src="${career.imagePath}"
              alt="Imagen de ${career.title}"
              class="img-fluid rounded"
            />
          </a>
          <p class="text-muted">
            Haz clic en la imagen para ver más detalles de la carrera.
          </p>
        </div>
      </div>
    `;

    // Generar el modal de la carrera
    const profileList = career.profile
      .map((item) => `<li>${item}</li>`)
      .join("");
    const careerPathList = career.careerPath
      .map((item) => `<li>${item}</li>`)
      .join("");

    modalsHTML += `
      <div
        class="modal fade"
        id="${career.id}Modal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="${career.id}ModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="${career.id}ModalLabel">
                ${career.title}
              </h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <h4><i class="fas fa-file-alt"></i> Resolución</h4>
            <strong><p>${career.resolucion}</p></strong>
             <h4><i class="fas fa-file-alt"></i> Descripción de la Carrera</h4>
              <p style="text-align: justify;">${career.description}</p>

              <h4><i class="fas fa-user"></i> Perfil Profesional</h4>
              <ul style="text-align: justify;">${profileList}</ul>

              <h4><i class="fas fa-briefcase"></i> Campo Laboral</h4>
              <p style="text-align: justify;">Los tecnólogos en ${career.title} pueden desempeñarse en:</p>
              <ul style="text-align: justify;">${careerPathList}</ul>

              <h4><i class="fas fa-clock"></i> Duración de la Carrera</h4>
              <p>
                La carrera tiene una duración de <strong>${career.duration}</strong>, incluyendo prácticas preprofesionales supervisadas.
              </p>

              <h4><i class="fas fa-laptop-code"></i> Modalidad</h4>
              <p >
                <strong>${career.modality}</strong>
              </p>

              <hr />
              <h4><i class="fas fa-list-ol"></i> Malla Curricular</h4>
              <p style="text-align: justify;">
                Consulta el plan de estudios detallado para esta carrera. Aquí podrás ver la distribución de asignaturas por semestre, créditos y requisitos.
              </p>
              <div class="text-center">
                <a
                  href="${career.curriculumLink}"
                  target="_blank"
                  class="btn btn-info py-2 px-4"
                >
                  <i class="fa fa-file-pdf mr-2"></i> Ver Malla Curricular PDF
                </a>
              </div>

              <hr />
              <p class="text-muted text-center">
                Para más detalles sobre requisitos de admisión o si tienes alguna pregunta adicional, por favor contacta a la secretaría académica.
              </p>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-dismiss="modal"
              >
                Cerrar
              </button>
            </div>
          </div>
        </div>
      </div>
    `;
  });

  cardsContainer.innerHTML = cardsHTML;
  modalsContainer.innerHTML = modalsHTML;

}
//*************************************************************************************************************** */
// BALANCE GENERALL balancegeneral.js
/* /js/main.js */
document.addEventListener("DOMContentLoaded", function () {
  const balancesList = document.getElementById("balances-list");

  // Aseguramos que el contenedor existe y que el array de datos está disponible
  if (balancesList && typeof balancesData !== 'undefined') {
    // Sort data by year in descending order
    balancesData.sort((a, b) => b.year - a.year);

    balancesData.forEach((balance) => {
      const listItem = document.createElement("li");
      listItem.className = "list-group-item d-flex justify-content-between align-items-center";

      const yearSpan = document.createElement("span");
      yearSpan.textContent = `BALANCE GENERAL ${balance.year}`;

      const link = document.createElement("a");
      link.href = balance.file;
      link.target = "_blank";
      link.className = "btn btn-sm btn-primary";

      const icon = document.createElement("i");
      icon.className = "fa fa-file-pdf mr-2";

      link.appendChild(icon);
      link.appendChild(document.createTextNode(" Ver PDF"));
      listItem.appendChild(yearSpan);
      listItem.appendChild(link);
      balancesList.appendChild(listItem);
    });
  }
});
// ARANCELES . aranceles.js
/* arancelesLogic.js */

document.addEventListener('DOMContentLoaded', () => {
  // 1. Selecciona el div donde se mostrará la información
  const contenedorAranceles = document.querySelector('.row.justify-content-center');

  // Asegúrate de que el contenedor y los datos existen
  if (contenedorAranceles && typeof arancelesData !== 'undefined') {
    // 2. Itera sobre el arreglo de arancelesData
    arancelesData.forEach(arancel => {
      // 3. Crea el HTML para cada elemento
      const htmlArancel = `
        <div class="col-lg-6 mb-4">
          <div class="d-flex align-items-center bg-light p-4 rounded">
            <div class="bg-primary text-white text-center rounded-circle p-3" style="width: 65px; height: 65px;">
              <i class="fa fa-file-pdf fa-2x"></i>
            </div>
            <div class="ml-4">
              <h4>${arancel.titulo}</h4>
              <p class="m-0">${arancel.descripcion}</p>
              <a href="${arancel.url}" class="btn btn-sm btn-outline-primary mt-2" download>
                Descargar
              </a>
            </div>
          </div>
        </div>
      `;
      // 4. Inserta el HTML en el contenedor
      contenedorAranceles.innerHTML += htmlArancel;
    });
  }
});
// BALANCE DE AUDITORIA balanceAuditoria.js
/* balancesAuditadosLogic.js */
document.addEventListener("DOMContentLoaded", function () {
  const balancesList = document.getElementById("balances-auditados-list");

  // Verificar si el contenedor y los datos existen antes de continuar
  if (balancesList && typeof balancesAuditadosData !== 'undefined') {
    // Ordenar los datos por año de forma descendente
    balancesAuditadosData.sort((a, b) => b.year - a.year);

    balancesAuditadosData.forEach((balance) => {
      const listItem = document.createElement("li");
      listItem.className = "list-group-item d-flex justify-content-between align-items-center";

      const yearSpan = document.createElement("span");
      yearSpan.textContent = `BALANCE AUDITADO ${balance.year}`;

      const link = document.createElement("a");
      link.href = balance.file;
      link.target = "_blank";
      link.className = "btn btn-sm btn-primary";

      const icon = document.createElement("i");
      icon.className = "fa fa-file-pdf mr-2";

      link.appendChild(icon);
      link.appendChild(document.createTextNode(" Ver PDF"));
      listItem.appendChild(yearSpan);
      listItem.appendChild(link);
      balancesList.appendChild(listItem);
    });
  }
});

//BIENESTAR ESTUDIANTIL bienestarEstudiantil.js
/* bienestarCarruselLogic.js */

// Función para generar un carrusel

function generarConstruccionYExtraccion() {
  const cardsContainer = document.querySelector("#constructionAndExtractionCards");
  const modalsContainer = document.querySelector("#constructionAndExtractionModals");

  if (!cardsContainer || !modalsContainer) {
    console.error("No se encontraron los contenedores para las tarjetas o modales de la Escuela de Construcción y Extracción Sostenible. Revisa los IDs.");
    return;
  }

  let cardsHTML = "";
  let modalsHTML = "";

  constructionAndExtractionData.forEach((career) => {
    // Generar la tarjeta de la carrera
    cardsHTML += `
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="career-card text-center p-4 border rounded shadow-sm h-100 d-flex flex-column justify-content-between">
          <h3 class="mb-3">${career.title}</h3>
          <a
            href="#"
            class="d-block mb-3"
            data-toggle="modal"
            data-target="#${career.id}Modal"
          >
            <img
              src="${career.imagePath}"
              alt="Imagen de ${career.title}"
              class="img-fluid rounded"
            />
          </a>
          <p class="text-muted">
            Haz clic en la imagen para ver más detalles de la carrera.
          </p>
        </div>
      </div>
    `;

    // Generar el modal de la carrera
    const profileList = career.profile.map(item => `<li>${item}</li>`).join("");
    const careerPathList = career.careerPath.map(item => `<li>${item}</li>`).join("");

    modalsHTML += `
      <div
        class="modal fade"
        id="${career.id}Modal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="${career.id}ModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="${career.id}ModalLabel">
                ${career.title}
              </h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h4><i class="fas fa-file-alt"></i> Resolución</h4>
              <strong><p>${career.resolucion}</p></strong>
              <h4><i class="fas fa-file-alt"></i> Descripción de la Carrera</h4>
              <p style="text-align: justify;">${career.description}</p>

              <h4><i class="fas fa-user"></i> Perfil Profesional</h4>
              <ul style="text-align: justify;">${profileList}</ul>

              <h4><i class="fas fa-briefcase"></i> Campo Laboral</h4>
              <p>Los tecnólogos en ${career.title} pueden desempeñarse en:</p>
              <ul>${careerPathList}</ul>

              <h4><i class="fas fa-clock"></i> Duración de la Carrera</h4>
              <p style="text-align: justify;">
                La carrera tiene una duración de <strong>${career.duration}</strong>, incluyendo prácticas preprofesionales supervisadas.
              </p>

              <h4><i class="fas fa-laptop-code"></i> Modalidad</h4>
              <p>
                <strong>${career.modality}</strong>
              </p>

              <hr />
              <h4><i class="fas fa-list-ol"></i> Malla Curricular</h4>
              <p style="text-align: justify;">
                Consulta el plan de estudios detallado para esta carrera. Aquí podrás ver la distribución de asignaturas por semestre, créditos y requisitos.
              </p>
              <div class="text-center">
                <a
                  href="${career.curriculumLink}"
                  target="_blank"
                  class="btn btn-info py-2 px-4"
                >
                  <i class="fa fa-file-pdf mr-2"></i> Ver Malla Curricular PDF
                </a>
              </div>

              <hr />
              <p class="text-muted text-center">
                Para más detalles sobre requisitos de admisión o si tienes alguna pregunta adicional, por favor contacta a la secretaría académica.
              </p>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-dismiss="modal"
              >
                Cerrar
              </button>
            </div>
          </div>
        </div>
      </div>
    `;
  });

  cardsContainer.innerHTML = cardsHTML;
  modalsContainer.innerHTML = modalsHTML;
}

// Modulo de Vinculacion

function generarAreasDeVinculacion() {
  const listContainer = document.querySelector("#vinculacionList");
  const modalsContainer = document.querySelector("#vinculacionModals");

  if (!listContainer || !modalsContainer) {
    console.error("No se encontraron los contenedores para la lista o modales de Vinculación. Revisa los IDs.");
    return;
  }

  let listHTML = "";
  let modalsHTML = "";

  areasDeVinculacionData.forEach((area) => {
    // Generar el ítem de la lista
    listHTML += `
      <a
        href="#"
        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
        data-toggle="modal"
        data-target="#${area.id}Modal"
      >
        <span>${area.title}</span>
        <i class="fa fa-arrow-right"></i>
      </a>
    `;

    // Generar el modal de la carrera
    modalsHTML += `
      <div
        class="modal fade"
        id="${area.id}Modal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="${area.id}ModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="${area.id}ModalLabel">
                ${area.title}
              </h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ${area.content}
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-dismiss="modal"
              >
                Cerrar
              </button>
            </div>
          </div>
        </div>
      </div>
    `;
  });

  listContainer.innerHTML = listHTML;
  modalsContainer.innerHTML = modalsHTML;
}

// Esta función puede ir en tu main.js o en un archivo aparte

function generarInvestigacionIDi() {
  const listContainer = document.querySelector("#investigacionList");
  const modalsContainer = document.querySelector("#investigacionModals");

  if (!listContainer || !modalsContainer) {
    console.error("No se encontraron los contenedores para la lista o modales de I+D+i. Revisa los IDs.");
    return;
  }

  let listHTML = "";
  let modalsHTML = "";

  investigacionData.forEach((item) => {
    if (item.isSection) {
      // Generar el encabezado de sección
      listHTML += `
        <h5 class="mt-4 mb-2 ml-3">${item.title}</h5>
      `;
    } else {
      // Generar el ítem de la lista (enlace)
      listHTML += `
        <a
          href="#"
          class="list-group-item list-group-item-action d-flex justify-content-between align-items-center ${item.isSection ? 'ml-3' : ''}"
          data-toggle="modal"
          data-target="#${item.id}Modal"
        >
          <span>${item.title}</span>
          <i class="fa fa-arrow-right"></i>
        </a>
      `;

      // Generar el modal del ítem
      modalsHTML += `
        <div
          class="modal fade"
          id="${item.id}Modal"
          tabindex="-1"
          role="dialog"
          aria-labelledby="${item.id}ModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="${item.id}ModalLabel">
                  ${item.title}
                </h5>
                <button
                  type="button"
                  class="close"
                  data-dismiss="modal"
                  aria-label="Close"
                >
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                ${item.content}
              </div>
              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-dismiss="modal"
                >
                  Cerrar
                </button>
              </div>
            </div>
          </div>
        </div>
      `;
    }
  });

  listContainer.innerHTML = listHTML;
  modalsContainer.innerHTML = modalsHTML;
}

// En tu archivo main.js o practicas.js

function generarPracticasData() {
  const container = document.getElementById("practicasContainer");

  if (!container) {
    console.error("El contenedor con ID 'practicasContainer' no fue encontrado.");
    return;
  }

  let htmlContent = "";

  practicasData.forEach((item) => {
    if (item.type === "section") {
      htmlContent += `
        <div class="mb-5">
          <h4 class="mb-3">${item.title}</h4>
          <p class="text-muted">${item.description.trim()}</p>
          <div class="text-center">
            <a
              href="${item.link}"
              target="_blank"
              class="btn btn-primary py-2 px-4"
            >
              <i class="fa fa-file-pdf mr-2"></i> ${item.buttonText}
            </a>
          </div>
        </div>
      `;
    } else if (item.type === "list") {
      let listItems = "";
      item.items.forEach((listItem) => {
        listItems += `
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <span>${listItem.text}</span>
            <a
              href="${listItem.link}"
              target="_blank"
              class="btn btn-sm btn-primary"
            >
              <i class="fa fa-file-pdf mr-2"></i> Descargar PDF
            </a>
          </li>
        `;
      });

      htmlContent += `
        <div class="mb-5">
          <h4 class="mb-3">${item.title}</h4>
          <p class="text-muted">${item.description.trim()}</p>
          <ul class="list-group list-group-flush">
            ${listItems}
          </ul>
        </div>
      `;
    }
  });

  // Eliminar el padding-bottom del último elemento
  htmlContent = htmlContent.replace(/<div class="mb-5"/g, '<div class="mb-5"');
  if (htmlContent.includes('<div class="mb-5"')) {
    htmlContent = htmlContent.replace(/<div class="mb-5"(?![\s\S]*<div class="mb-5")/, '<div class="mb-0"');
  }

  container.innerHTML = htmlContent;
}

// Esta función puede ir en tu main.js o en un archivo separado

function generarTitulacionData() {
  const container = document.getElementById("titulacionContainer");

  if (!container) {
    console.error("El contenedor con ID 'titulacionContainer' no fue encontrado.");
    return;
  }

  let htmlContent = "";

  titulacionData.forEach((item, index) => {
    // Determinar la clase para el margin-bottom
    const marginBottomClass = index === titulacionData.length - 1 ? "mb-0" : "mb-5";

    htmlContent += `<div class="${marginBottomClass}">`;
    htmlContent += `<h4 class="mb-3">${item.title}</h4>`;
    htmlContent += `<p class="text-muted">${item.description.trim()}</p>`;
    htmlContent += `<div class="text-center mt-4">`;

    // --- Lógica condicional para manejar botones individuales o múltiples ---
    if (item.buttons) {
      // Caso 1: El objeto tiene un array de botones
      item.buttons.forEach(button => {
        htmlContent += `
          <a
            href="${button.link}"
            target="_blank"
            class="btn btn-primary py-2 px-4 m-2"
            rel="noopener noreferrer"
          >
            <i class="${button.buttonIcon}"></i> ${button.buttonText}
          </a>
        `;
      });
    } else {
      // Caso 2: El objeto tiene un solo botón
      htmlContent += `
        <a
          href="${item.link}"
          target="_blank"
          class="btn btn-primary py-2 px-4"
          rel="noopener noreferrer"
        >
          <i class="${item.buttonIcon}"></i> ${item.buttonText}
        </a>
      `;
    }

    htmlContent += `</div></div>`;
  });

  container.innerHTML = htmlContent;
}

// La función que genera y agrega el HTML

