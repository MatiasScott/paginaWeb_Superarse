(function () {
  const currentScript = document.currentScript;

  if (!currentScript) {
    return;
  }

  const commonScripts = [
    "https://code.jquery.com/jquery-3.4.1.min.js",
    "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js",
    "/lib/easing/easing.min.js",
    "/lib/owlcarousel/owl.carousel.min.js",
    "/lib/isotope/isotope.pkgd.min.js",
    "/lib/lightbox/js/lightbox.min.js",
    "/js/moduls/header.js",
  ];

  const pageScripts = (currentScript.dataset.pageScripts || "")
    .split(",")
    .map((item) => item.trim())
    .filter(Boolean);

  const trailingScripts = [
    "/js/moduls/footer.js",          // datos footerData
    "/js/global.js",
    "/js/moduls/core/header-module.js",   // generarHeader()
    "/js/moduls/core/footer-module.js",   // generarFooter(), limpiarMensaje()
    "/js/moduls/core/buzon-module.js",    // inicializarBuzon()
    "/js/moduls/core/layout-functions.js", // coordinador: initSharedLayout()
    "/js/moduls/core/home-functions.js",
    "/js/moduls/core/institucion-functions.js",
    "/js/moduls/core/academico-functions.js",
    "/js/moduls/core/noticias-functions.js",
    "/js/moduls/core/orchestrator.js",
    "/js/main.js",
    "/js/common/internal-view-normalizer.js",
  ];

  const queue = [...commonScripts, ...pageScripts, ...trailingScripts];

  function scriptExists(src) {
    const resolved = new URL(src, window.location.href).href;
    return Array.from(document.querySelectorAll("script[src]")).some(
      (script) => script.src === resolved
    );
  }

  function loadScript(src) {
    return new Promise((resolve, reject) => {
      if (scriptExists(src)) {
        resolve();
        return;
      }

      const script = document.createElement("script");
      script.src = src;
      script.async = false;
      script.onload = () => resolve();
      script.onerror = () => reject(new Error("No se pudo cargar " + src));

      const target = document.body || document.head || document.documentElement;
      target.appendChild(script);
    });
  }

  function loadQueue() {
    queue
      .reduce(
        (promise, src) =>
          promise.then(() =>
            loadScript(src).catch((error) => {
              console.error(
                "No se pudo cargar script, se continúa con el resto:",
                src,
                error
              );
            })
          ),
        Promise.resolve()
      )
      .then(() => {
        if (typeof window.initSharedLayout === "function") {
          window.initSharedLayout();
        }
      })
      .catch((error) => {
        console.error("Error inesperado en el loader de scripts:", error);
      });
  }

  loadQueue();
})();
