(function () {
  function buildCarousel(container) {
    if (!container) {
      return;
    }

    // Agrega nuevas fotos aqui cuando las tengas.
    var images = [
      "/assets/img/content/noticias/noticiasheader/prueba1 1920px-1080px.jpg",
      //"/assets/img/content/noticias/noticiasheader/prueba2 900px-506px.jpg",
    ];

    if (!images.length) {
      return;
    }

    var track = document.createElement("div");
    track.className = "noticias-header-carousel-track";

    var dots = document.createElement("div");
    dots.className = "noticias-header-carousel-dots";

    var slides = [];
    var dotButtons = [];

    images.forEach(function (src, index) {
      var img = document.createElement("img");
      img.src = src;
      img.alt = "Noticias destacadas " + (index + 1);
      img.className = "noticias-header-carousel-slide" + (index === 0 ? " is-active" : "");
      track.appendChild(img);
      slides.push(img);

      var dot = document.createElement("button");
      dot.type = "button";
      dot.className = "noticias-header-carousel-dot" + (index === 0 ? " is-active" : "");
      dot.setAttribute("aria-label", "Ir a la imagen " + (index + 1));
      dot.addEventListener("click", function () {
        showSlide(index);
        restartAutoplay();
      });
      dots.appendChild(dot);
      dotButtons.push(dot);
    });

    container.innerHTML = "";
    container.appendChild(track);
    if (images.length > 1) {
      container.appendChild(dots);
    }

    var currentIndex = 0;
    var intervalId = null;

    function showSlide(index) {
      slides[currentIndex].classList.remove("is-active");
      dotButtons[currentIndex].classList.remove("is-active");

      currentIndex = index;

      slides[currentIndex].classList.add("is-active");
      dotButtons[currentIndex].classList.add("is-active");
    }

    function nextSlide() {
      var nextIndex = (currentIndex + 1) % slides.length;
      showSlide(nextIndex);
    }

    function startAutoplay() {
      if (slides.length < 2) {
        return;
      }
      intervalId = setInterval(nextSlide, 4500);
    }

    function restartAutoplay() {
      if (!intervalId) {
        return;
      }
      clearInterval(intervalId);
      startAutoplay();
    }

    startAutoplay();
  }

  function initNoticiasHeaderCarousel() {
    var containers = document.querySelectorAll(".noticias-header-carousel-container");
    if (!containers.length) {
      return;
    }

    containers.forEach(function (container) {
      buildCarousel(container);
    });
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initNoticiasHeaderCarousel);
  } else {
    initNoticiasHeaderCarousel();
  }
})();
