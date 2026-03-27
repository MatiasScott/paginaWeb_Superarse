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
    console.error("No se encontraron los contenedores para la Escuela de Veterinaria.");
    return;
  }

  let cardsHTML = "";
  let modalsHTML = "";

  veterinarySchoolData.forEach((career) => {
      cardsHTML += `
      <div class="col-lg-4 col-md-6 mb-5">
        <div class="card h-100 border-0 shadow-lg" style="border-radius: 20px; transition: all 0.4s ease; overflow: hidden; background: #fff; cursor: pointer;" 
             onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 20px 40px rgba(0,0,0,0.15)';" 
             onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 20px rgba(0,0,0,0.1)';">
          
          <div style="position: relative; height: 500px; overflow: hidden;">
            <img src="${career.imagePath}" alt="${career.title}" style="width: 100%; height: 100%; object-fit: cover;">
            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(to bottom, rgba(0,0,0,0) 50%, rgba(0,0,0,0.7) 100%);"></div>
            
            <span style="position: absolute; top: 15px; right: 15px; background: #28a745; color: white; padding: 5px 12px; border-radius: 50px; font-size: 0.7rem; font-weight: bold; text-transform: uppercase; letter-spacing: 1px;">
              Cupos Disponibles
            </span>
          </div>

          <div class="card-body p-4 d-flex flex-column justify-content-between">
            <div>
              <h4 class="font-weight-bold mb-2" style="color: #2c3e50; font-size: 1.25rem; line-height: 1.2;">
                ${career.title}
              </h4>
              <p class="text-muted mb-4" style="font-size: 0.9rem;">
                Explora tu futuro profesional y conviértete en un experto en esta área de alta demanda.
              </p>
            </div>

            <button class="btn btn-block py-2" 
                    style="background: linear-gradient(90deg, #28a745, #20c997); color: white; border-radius: 12px; font-weight: bold; border: none; transition: 0.3s;"
                    data-toggle="modal" data-target="#${career.id}Modal">
              Más Información <i class="fas fa-arrow-right ml-2"></i>
            </button>
          </div>
        </div>
      </div>
    `;
    const profileList = career.profile.map((item) => `<li><i class="fas fa-check-circle text-success mr-2"></i>${item}</li>`).join("");
    const careerPathList = career.careerPath.map((item) => `<li><i class="fas fa-arrow-right text-primary mr-2"></i>${item}</li>`).join("");
    const perfilEgresado = career.perfilEgresado || "El profesional estará capacitado para liderar procesos de salud animal, bienestar y salud pública con excelencia técnica.";

    modalsHTML += `
      <div class="modal fade" id="${career.id}Modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
          <div class="modal-content modal-glass-uniform" style="background-image: url('${career.imagePath}'); border-radius: 20px; overflow: hidden; border: none;">
            
            <style>
              .modal-glass-uniform { position: relative; background-size: cover; background-position: center; }
              .modal-glass-uniform::before {
                content: ""; position: absolute; top: 0; left: 0; right: 0; bottom: 0;
                background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(10px); z-index: 0;
              }
              .content-wrapper-vete { position: relative; z-index: 1; }
              .glass-section-vete {
                background: rgba(255, 255, 255, 0.6); border-radius: 15px; padding: 20px;
                margin-bottom: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border: 1px solid rgba(255,255,255,0.2);
              }
              .vete-label {
                background: linear-gradient(90deg, #28a745, #20c997);
                -webkit-background-clip: text; -webkit-text-fill-color: transparent;
                font-weight: bold; text-transform: uppercase; font-size: 0.85rem; letter-spacing: 1px; display: block; margin-bottom: 10px;
              }
            </style>

            <div class="modal-body content-wrapper-vete p-5">
              <button type="button" class="close" data-dismiss="modal" style="position: absolute; right: 25px; top: 20px; font-size: 30px;">&times;</button>

              <div class="text-center mb-5">
                <h1 class="display-4 font-weight-bold text-dark">${career.title}</h1>
                <div style="width: 60px; height: 4px; background: #28a745; margin: 10px auto; border-radius: 10px;"></div>
              </div>

              <div class="glass-section-vete text-center">
                <span class="vete-label">Resolución Oficial</span>
                <h5 class="mb-0 mt-2 font-weight-bold text-secondary">${career.resolucion}</h5>
              </div>

              <div class="glass-section-vete">
                <span class="vete-label"><i class="fas fa-info-circle mr-2"></i>Sobre la Carrera</span>
                <p class="lead mt-3 text-justify text-dark" style="font-size: 1.05rem;">${career.description}</p>
              </div>

              <div class="row">
                <div class="col-md-6 mb-3">
                  <div class="glass-section-vete h-100">
                    <span class="vete-label"><i class="fas fa-user-md mr-2"></i>Perfil Profesional</span>
                    <ul class="list-unstyled mt-3 text-dark" style="line-height: 1.8;">${profileList}</ul>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <div class="glass-section-vete h-100">
                    <span class="vete-label"><i class="fas fa-graduation-cap mr-2"></i>Perfil de Egreso</span>
                    <p class="mt-3 text-dark text-justify">${perfilEgresado}</p>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4 mb-3">
                  <div class="glass-section-vete h-100 text-center">
                    <span class="vete-label text-center">Campo Laboral</span>
                    <ul class="list-unstyled mt-3 text-left small text-dark">${careerPathList}</ul>
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <div class="glass-section-vete h-100 text-center d-flex flex-column justify-content-center">
                    <span class="vete-label">Duración</span>
                    <h3 class="font-weight-bold mt-2 text-dark">${career.duration}</h3>
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <div class="glass-section-vete h-100 text-center d-flex flex-column justify-content-center">
                    <span class="vete-label font-weight-bold">Modalidad</span>
                    <h3 class="font-weight-bold mt-2 text-success">${career.modality}</h3>
                  </div>
                </div>
              </div>

              <div class="glass-section-vete text-center py-4" style="background: rgba(40, 167, 69, 0.08);">
                <h5 class="font-weight-bold mb-3 text-dark">Plan Académico</h5>
                <a href="${career.curriculumLink}" target="_blank" class="btn btn-success btn-lg px-5 shadow-sm" style="border-radius: 50px;">
                  <i class="fas fa-file-pdf mr-2"></i> Ver Malla Curricular PDF
                </a>
              </div>

              <div class="mt-4 text-center">
                <p class="text-muted mb-1">¿Deseas matricularte?</p>
                <div class="d-flex justify-content-center align-items-center flex-wrap">
                  <a href="#" class="mx-3 text-dark font-weight-bold" style="text-decoration: none;"><i class="fab fa-whatsapp text-success mr-1"></i> WhatsApp Admisiones</a>
                  <a href="#" class="mx-3 text-dark font-weight-bold" style="text-decoration: none;"><i class="fas fa-envelope text-danger mr-1"></i> Correo Electrónico</a>
                </div>
              </div>

            </div>
            
            <div class="modal-footer border-0">
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar Ventana</button>
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

  let linearHTML = "";
  const resumenIds = [
    "modeloInvestigacionVinculacion",
    "normativaInvestigacion",
    "dominiosLineasInvestigacion",
  ];
  const resumenSet = new Set(resumenIds);
  const eventosIds = [
    "congresoTopografia2025",
    "congresoTopografia2023",
    "seminarioEquino",
    "congresoAgrovet2026",
  ];
  const eventosSet = new Set(eventosIds);
  const resumenMap = Object.fromEntries(
    investigacionData
      .filter((entry) => !entry.isSection && resumenSet.has(entry.id))
      .map((entry) => [entry.id, entry])
  );
  const eventosMap = Object.fromEntries(
    investigacionData
      .filter((entry) => !entry.isSection && eventosSet.has(entry.id))
      .map((entry) => [entry.id, entry])
  );
  const publicacionesIds = [
    "publicacionesMayoOctubre2025",
    "publicacionesNoviembreAbril2025",
    "publicacionesMayoOctubre2024",
    "publicacionesNoviembre2023Abril2024",
    "publicacionesMayoOctubre2023",
    "publicacionesMayoOctubre202",
  ];
  const publicacionesSet = new Set(publicacionesIds);
  const publicacionesMap = Object.fromEntries(
    investigacionData
      .filter((entry) => !entry.isSection && publicacionesSet.has(entry.id))
      .map((entry) => [entry.id, entry])
  );
  let resumenRenderizado = false;
  let eventosRenderizados = false;
  let publicacionesRenderizadas = false;

  const quitarPrimerH4 = (html) =>
    html.replace(/^\s*<h4[^>]*>[\s\S]*?<\/h4>\s*/i, "");
  const limpiarTexto = (texto) =>
    texto.replace(/<[^>]+>/g, " ").replace(/\s+/g, " ").trim();
  const obtenerTitulosPublicaciones = (html) => {
    const coincidencias = [...html.matchAll(/<h4[^>]*>([\s\S]*?)<\/h4>/gi)];
    return coincidencias
      .map((match) => limpiarTexto(match[1]))
      .filter((titulo) => titulo.length > 0);
  };

  investigacionData.forEach((item) => {
    if (item.isSection) {
      linearHTML += `
        <h4 class="mt-5 mb-3 text-primary">${item.title}</h4>
      `;
      return;
    }

    if (resumenSet.has(item.id)) {
      if (resumenRenderizado) {
        return;
      }

      const celdasResumen = resumenIds
        .map((id) => {
          const resumen = resumenMap[id];
          if (!resumen) {
            return "";
          }

          return `
            <td style="vertical-align: top; width: 33.33%; min-width: 280px;">
              <h5 class="mb-3">${resumen.title}</h5>
              ${quitarPrimerH4(resumen.content)}
            </td>
          `;
        })
        .join("");

      linearHTML += `
        <div class="table-responsive mb-4">
          <table class="table table-bordered bg-white mb-0">
            <tbody>
              <tr>
                ${celdasResumen}
              </tr>
            </tbody>
          </table>
        </div>
      `;

      resumenRenderizado = true;
      return;
    }

    if (eventosSet.has(item.id)) {
      if (eventosRenderizados) {
        return;
      }

      const eventosDisponibles = eventosIds
        .map((id) => {
          const evento = eventosMap[id];
          if (!evento) {
            return null;
          }

          return `
            <td style="vertical-align: top; width: 50%; min-width: 320px;">
              <h5 class="mb-3">${evento.title}</h5>
              ${quitarPrimerH4(evento.content)}
            </td>
          `;
        })
        .filter(Boolean);

      const fila1 = `${eventosDisponibles[0] || "<td></td>"}${eventosDisponibles[1] || "<td></td>"}`;
      const fila2 = `${eventosDisponibles[2] || "<td></td>"}${eventosDisponibles[3] || "<td></td>"}`;

      linearHTML += `
        <div class="table-responsive mb-4">
          <table class="table table-bordered bg-white mb-0">
            <tbody>
              <tr>
                ${fila1}
              </tr>
              <tr>
                ${fila2}
              </tr>
            </tbody>
          </table>
        </div>
      `;

      eventosRenderizados = true;
      return;
    }

    if (item.id === "simposioAdministracion") {
      return;
    }

    if (publicacionesSet.has(item.id)) {
      if (publicacionesRenderizadas) {
        return;
      }

      const periodosPublicaciones = publicacionesIds
        .map((id) => publicacionesMap[id])
        .filter(Boolean)
        .map((periodo) => {
          const publicaciones = obtenerTitulosPublicaciones(periodo.content).map((titulo, indice) => ({
            titulo,
            llave: `${periodo.id}-${indice}`,
          }));
          return {
            id: periodo.id,
            periodo: periodo.title,
            publicaciones: publicaciones.length
              ? publicaciones
              : [{ titulo: "Sin publicaciones registradas", llave: `${periodo.id}-0` }],
          };
        });

      const totalPublicaciones = periodosPublicaciones.reduce(
        (acumulado, periodo) => acumulado + periodo.publicaciones.length,
        0
      );
      const maximoPublicaciones = Math.max(
        ...periodosPublicaciones.map((periodo) => periodo.publicaciones.length),
        1
      );

      const graficoBarras = periodosPublicaciones
        .map((periodo) => {
          const valor = periodo.publicaciones.length;
          const porcentaje = (valor / maximoPublicaciones) * 100;

          return `
            <div class="mb-3">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <small class="font-weight-bold">${periodo.periodo}</small>
                <small>${valor}</small>
              </div>
              <div class="progress" style="height: 10px;">
                <div class="progress-bar bg-info" role="progressbar" style="width: ${porcentaje}%" aria-valuenow="${valor}" aria-valuemin="0" aria-valuemax="${maximoPublicaciones}"></div>
              </div>
            </div>
          `;
        })
        .join("");

      const filasTablaPublicaciones = periodosPublicaciones
        .map((periodo) => {
          return periodo.publicaciones
            .map((publicacion, indice) => {
              const celdaPeriodo =
                indice === 0
                  ? `<td rowspan="${periodo.publicaciones.length}" style="vertical-align: middle; width: 35%;"><strong>${periodo.periodo}</strong></td>`
                  : "";

              return `
                <tr>
                  ${celdaPeriodo}
                  <td>
                    <button
                      type="button"
                      class="btn btn-link p-0 text-left"
                      onclick="mostrarPublicacionInvestigacion('${periodo.id}')"
                    >
                      ${publicacion.titulo}
                    </button>
                  </td>
                </tr>
              `;
            })
            .join("");
        })
        .join("");

      const detallePublicacionesHTML = publicacionesIds
        .map((id) => publicacionesMap[id])
        .filter(Boolean)
        .map(
          (periodo) => `
            <article class="card border-0 shadow-sm mb-4 d-none" data-publicacion-periodo="${periodo.id}">
              <div class="card-body">
                <h5 class="mb-3">${periodo.title}</h5>
                ${periodo.content}
              </div>
            </article>
          `
        )
        .join("");

      if (typeof window.mostrarPublicacionInvestigacion !== "function") {
        window.mostrarPublicacionInvestigacion = function (periodoId) {
          const contenedor = document.getElementById("publicacionesDetalleDinamico");
          if (!contenedor) {
            return;
          }

          const tarjetas = contenedor.querySelectorAll("[data-publicacion-periodo]");
          tarjetas.forEach((tarjeta) => tarjeta.classList.add("d-none"));

          const tarjetaObjetivo = contenedor.querySelector(`[data-publicacion-periodo="${periodoId}"]`);
          if (tarjetaObjetivo) {
            tarjetaObjetivo.classList.remove("d-none");
            tarjetaObjetivo.scrollIntoView({ behavior: "smooth", block: "start" });
          }
        };
      }

      linearHTML += `
        <div class="card border-0 shadow-sm mb-4">
          <div class="card-body">
            <h5 class="mb-3">Gráfico de Publicaciones por Período</h5>
            <p class="mb-3 text-muted">Total de publicaciones registradas: <strong>${totalPublicaciones}</strong></p>
            ${graficoBarras}
          </div>
        </div>

        <div class="table-responsive mb-4">
          <table class="table table-bordered table-hover bg-white mb-0">
            <thead class="thead-light">
              <tr>
                <th>Período académico</th>
                <th>Publicación</th>
              </tr>
            </thead>
            <tbody>
              ${filasTablaPublicaciones}
            </tbody>
          </table>
        </div>

        <div id="publicacionesDetalleDinamico">
          <div class="alert alert-light border mb-4" role="alert">
            Selecciona una publicación de la tabla para visualizar su contenido.
          </div>
          ${detallePublicacionesHTML}
        </div>
      `;

      publicacionesRenderizadas = true;
      return;
    }

    linearHTML += `
      <article id="${item.id}" class="card border-0 shadow-sm mb-4">
        <div class="card-body">
          <h5 class="mb-3">${item.title}</h5>
          ${item.content}
        </div>
      </article>
    `;
  });

  listContainer.classList.remove("list-group", "list-group-flush");
  listContainer.innerHTML = linearHTML;
  modalsContainer.innerHTML = "";
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

