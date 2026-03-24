document.addEventListener('DOMContentLoaded', () => {
  const cuadrosTexto = document.querySelectorAll('.cuadro-texto');

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        // Si el elemento entra en la vista, añadimos la clase 'aparece'
        entry.target.classList.add('aparece');
      } else {
        // Si el elemento sale de la vista, quitamos la clase 'aparece'
        entry.target.classList.remove('aparece');
      }
    });
  }, {
    // La animación se activará cuando el 20% del elemento sea visible
    threshold: 0.5
  });

  cuadrosTexto.forEach(cuadro => {
    observer.observe(cuadro);
  });
});