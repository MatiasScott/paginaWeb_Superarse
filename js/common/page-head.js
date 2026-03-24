(function () {
  const currentScript = document.currentScript;
  const head = document.head;

  if (!currentScript || !head) {
    return;
  }

  const commonLinks = [
    { rel: "icon", href: "/assets/img/content/logo/superarse_gris.png" },
    {
      rel: "preconnect",
      href: "https://fonts.gstatic.com",
      crossorigin: "anonymous",
    },
    {
      rel: "stylesheet",
      href: "https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap",
    },
    {
      rel: "stylesheet",
      href: "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css",
    },
    { rel: "stylesheet", href: "/lib/flaticon/font/flaticon.css" },
    {
      rel: "stylesheet",
      href: "/lib/owlcarousel/assets/owl.carousel.min.css",
    },
    { rel: "stylesheet", href: "/lib/lightbox/css/lightbox.min.css" },
    { rel: "stylesheet", href: "/css/style.css" },
    { rel: "stylesheet", href: "/css/vistas-internas.css" },
    { rel: "stylesheet", href: "/css/vistas-personalizadas.css" },
    { rel: "stylesheet", href: "/css/MisionVision.css" }
  ];

  const extraStyles = (currentScript.dataset.extraStyles || "")
    .split(",")
    .map((item) => item.trim())
    .filter(Boolean);

  function linkExists(href) {
    return Array.from(head.querySelectorAll("link")).some(
      (link) => link.href === new URL(href, window.location.href).href
    );
  }

  function appendLink(definition) {
    if (!definition.href || linkExists(definition.href)) {
      return;
    }

    const link = document.createElement("link");
    Object.entries(definition).forEach(([key, value]) => {
      link.setAttribute(key, value);
    });
    head.appendChild(link);
  }

  commonLinks.forEach(appendLink);
  extraStyles.forEach((href) => appendLink({ rel: "stylesheet", href }));
})();