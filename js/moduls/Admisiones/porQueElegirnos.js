document.addEventListener('DOMContentLoaded', () => {
  const cuadrosTexto = document.querySelectorAll('.cuadro-texto');
  if (!cuadrosTexto.length) { return; }

  function aparece(cuadro) {
    cuadro.classList.add('aparece');
  }

  if (!('IntersectionObserver' in window)) {
    cuadrosTexto.forEach(aparece);
    return;
  }

  // Revela de inmediato los que ya están dentro de la ventana (evita paneles invisibles al cargar).
  const alto = window.innerHeight || document.documentElement.clientHeight || 0;
  cuadrosTexto.forEach((cuadro) => {
    if (cuadro.getBoundingClientRect().top < alto) {
      aparece(cuadro);
    }
  });

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        aparece(entry.target);
      } else {
        entry.target.classList.remove('aparece');
      }
    });
  }, {
    threshold: 0.1,
  });

  cuadrosTexto.forEach((cuadro) => observer.observe(cuadro));
});