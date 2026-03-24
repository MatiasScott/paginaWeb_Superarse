document.addEventListener('DOMContentLoaded', () => {

  const animateNumbers = (element) => {
    const numberElement = element.querySelector('.number');

    // ⚠️ Evitar que se ejecute más de una vez
    if (numberElement.classList.contains('animated')) return;
    numberElement.classList.add('animated');

    const finalValue = parseInt(numberElement.textContent, 10);
    const duration = 1500; // duración en ms
    let startTime = null;

    const animate = (currentTime) => {
      if (!startTime) startTime = currentTime;

      const progress = currentTime - startTime;
      const percentage = Math.min(progress / duration, 1);

      const value = Math.floor(percentage * finalValue);
      numberElement.textContent = value;

      if (percentage < 1) {
        requestAnimationFrame(animate);
      } else {
        // ✅ Asegurar valor final exacto
        numberElement.textContent = finalValue;
      }
    };

    requestAnimationFrame(animate);
  };

  const observer = new IntersectionObserver((entries, obs) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        animateNumbers(entry.target);

        // 🔥 Dejar de observar para evitar re-ejecución
        obs.unobserve(entry.target);
      }
    });
  }, {
    threshold: 0.5
  });

  document.querySelectorAll('.stat-item').forEach(item => {
    observer.observe(item);
  });

});