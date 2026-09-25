// Coordinador de layout compartido
// Las funciones generarHeader(), generarFooter() e inicializarBuzon()
// se definen en sus módulos respectivos:
//   → js/moduls/core/header-module.js
//   → js/moduls/core/footer-module.js
//   → js/moduls/core/buzon-module.js

let sharedLayoutInitialized = false;

function initSharedLayout() {
  if (sharedLayoutInitialized) return;
  sharedLayoutInitialized = true;

  try {
    generarHeader();
  } catch (error) {
    console.error("No se pudo generar el header:", error);
  }

  try {
    generarFooter();
  } catch (error) {
    console.error("No se pudo generar el footer:", error);
  }

  try {
    inicializarBuzon();
  } catch (error) {
    console.error("No se pudo inicializar el buzon:", error);
  }
}

window.initSharedLayout = initSharedLayout;

if (document.readyState === "loading") {
  document.addEventListener("DOMContentLoaded", initSharedLayout);
} else {
  initSharedLayout();
}

