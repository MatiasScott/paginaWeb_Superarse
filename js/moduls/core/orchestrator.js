// Orquestador de inicializacion de modulos por vista

let coreModulesInitialized = false;

function safeCall(fnName) {
  const fn = window[fnName];

  if (typeof fn !== "function") {
    return;
  }

  try {
    fn();
  } catch (error) {
    console.error("Error ejecutando", fnName, error);
  }
}

function hasAnySelector(selectors) {
  return selectors.some((selector) => document.querySelector(selector));
}

function runIfPresent(fnName, selectors, condition = true) {
  if (!condition) {
    return;
  }

  if (Array.isArray(selectors) && selectors.length && !hasAnySelector(selectors)) {
    return;
  }

  safeCall(fnName);
}

function initCoreModules() {
  if (coreModulesInitialized) {
    return;
  }
  coreModulesInitialized = true;

  // Priorizar layout comun para garantizar header/footer incluso si falla un modulo de vista.
  safeCall("initSharedLayout");

  runIfPresent("iniciarNoticias", ["#buscadorNoticias", "#noticias-grid"]);
  runIfPresent("generarEscuelaDeSalud", ["#schoolOfHealthCards", "#schoolOfHealthModals"]);
  runIfPresent("generarEducacionYHumanidades", ["#educationAndHumanitiesCards", "#educationAndHumanitiesModals"]);
  runIfPresent("generarEscuelaDeVeterinaria", ["#veterinarySchoolCards", "#veterinarySchoolModals"]);
  runIfPresent("generarAdministracionEIndustria", ["#administrationAndIndustryCards", "#administrationAndIndustryModals"]);
  runIfPresent("generarConstruccionYExtraccion", ["#constructionAndExtractionCards", "#constructionAndExtractionModals"]);
  runIfPresent("generarAreasDeVinculacion", ["#vinculacionList", "#vinculacionModals"]);
  runIfPresent("generarInvestigacionIDi", ["#investigacionList", "#investigacionModals"]);
  runIfPresent("generarPracticasData", ["#practicasContainer"]);
  runIfPresent("generarTitulacionData", ["#titulacionContainer"]);
  runIfPresent("generarValores", ["#list-tab", "#nav-tabContent"]);
  runIfPresent("generarModalidades", ["#list-tab", "#nav-tabContent"]);
  runIfPresent("generarReglamentosAcordeon", ["#regulationsAccordion"]);
  runIfPresent("generarEquipoDirectivo", ["#equipo-directivo-container"]);
  runIfPresent("generarPlanesAcademicos", ["#academic-plans-container"]);
  runIfPresent("generarFacilities", [".container-submenu .row"]);
  runIfPresent("generarOfertaAcademica", [".owl-carousel.ofertaA-carousel"]);
  runIfPresent("generarModalesOfertaAcademica", ["body"]);
  runIfPresent("generarSelloUnico", [".owl-carousel.selloU-carousel"]);
  runIfPresent("generarNoticias", [".owl-carousel.noticias-carousel"]);
  runIfPresent("generarTestimonios", [".owl-carousel.testimonial-carousel"]);
  runIfPresent("generarAranceles", ["#aranceles-container"]);
  runIfPresent("generarModuloNoticias", ["#noticias-grid"]);
}

if (document.readyState === "loading") {
  document.addEventListener("DOMContentLoaded", initCoreModules);
} else {
  initCoreModules();
}
