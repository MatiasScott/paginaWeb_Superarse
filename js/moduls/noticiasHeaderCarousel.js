(function () {
  function buildCarousel(container) {
    if (!container) return;

    // OBTENER FECHA Y HORA ACTUAL EN TIEMPO REAL
    var hoy = new Date();

    // 1. ESTRUCTURA DE OBJETOS CON FECHAS DE VIGENCIA
    var todasLasPublicaciones = [
      //N3
      {
        src: "/assets/img/content/noticias/noticiasheader/Digital_Future.jpg",
        inicio: "2026-06-23",
        fin: "2026-07-25" // ACTIVO HOY
      },
      //N2
      {
        src: "/assets/img/content/noticias/noticiasheader/PROCESO_ESPECIALES_POST.jpg",
        inicio: "2026-06-22",
        fin: "2026-06-28" // ACTIVO HOY
      },
     //N1
     {
        src: "/assets/img/content/noticias/noticiasheader/Prueba1.jpeg",
        inicio: "2026-06-12", // ACTIVO HOY
        fin: "2040-12-31" 
      }
    ];

    // 2. FILTRAR MÁGICAMENTE SOLO LAS PUBLICACIONES VIGENTES
    var images = todasLasPublicaciones.filter(function (post) {
      if (!post.inicio || !post.fin) return false;

      var partesInicio = post.inicio.split('-');
      var partesFin = post.fin.split('-');

      if (partesInicio.length !== 3 || partesFin.length !== 3) return false;

      var fechaInicio = new Date(partesInicio[0], partesInicio[1] - 1, partesInicio[2], 0, 0, 0);
      var fechaFin = new Date(partesFin[0], partesFin[1] - 1, partesFin[2], 23, 59, 59);

      return hoy >= fechaInicio && hoy <= fechaFin;
    });

    // Si no hay nada vigente, limpiar y salir
    if (!images.length) {
      container.innerHTML = "";
      return;
    }

    // Creación de elementos del DOM
    var track = document.createElement("div");
    track.className = "noticias-header-carousel-track";
    
    var dots = document.createElement("div");
    dots.className = "noticias-header-carousel-dots";

    var slides = [];
    var dotButtons = [];

    // Iteramos sobre las imágenes que SÍ pasaron el filtro de hoy
    images.forEach(function (post, index) {
      var img = document.createElement("img");
      img.src = post.src;
      img.alt = "Noticias destacadas " + (index + 1);
      // Solo el primero tiene la clase activa al inicio
      img.className = "noticias-header-carousel-slide" + (index === 0 ? " is-active" : "");
      
      // Control de visibilidad inicial por CSS en línea para evitar parpadeos
      if (index !== 0) {
        img.style.opacity = "0";
        img.style.pointerEvents = "none";
      } else {
        img.style.opacity = "1";
        img.style.pointerEvents = "auto";
      }
      
      img.style.transition = "opacity 0.8s ease-in-out"; // Transición suave garantizada
      track.appendChild(img);
      slides.push(img);

      var dot = document.createElement("button");
      dot.type = "button";
      dot.className = "noticias-header-carousel-dot" + (index === 0 ? " is-active" : "");
      dot.addEventListener("click", function () {
        showSlide(index);
        restartAutoplay();
      });
      dots.appendChild(dot);
      dotButtons.push(dot);
    });

    container.innerHTML = "";
    container.appendChild(track);
    
    // Solo mostramos los botones de abajo si hay más de 1 publicación activa
    if (images.length > 1) {
      container.appendChild(dots);
    }

    // Indicador de scroll
    var scrollIndicator = document.createElement("a");
    scrollIndicator.href = "#"; 
    scrollIndicator.className = "noticias-scroll-down";
    scrollIndicator.innerHTML = '<i class="fas fa-angle-double-down"></i>'; 
    
    scrollIndicator.addEventListener("click", function (e) {
      e.preventDefault();
      var nextSection = document.querySelector(".container-submenu");
      if (nextSection) {
        nextSection.scrollIntoView({ behavior: "smooth" });
      }
    });
    
    container.appendChild(scrollIndicator);

    var currentIndex = 0;
    var intervalId = null;

    // FUNCIÓN DE CAMBIO REPARADA
    function showSlide(index) {
      if (slides.length === 0) return;
      
      // Apagamos el slide viejo cambiando clases y opacidad
      if (slides[currentIndex]) {
        slides[currentIndex].classList.remove("is-active");
        slides[currentIndex].style.opacity = "0";
        slides[currentIndex].style.pointerEvents = "none";
      }
      if (dotButtons[currentIndex]) {
        dotButtons[currentIndex].classList.remove("is-active");
      }
      
      currentIndex = index;
      
      // Encendemos el nuevo slide visible
      if (slides[currentIndex]) {
        slides[currentIndex].classList.add("is-active");
        slides[currentIndex].style.opacity = "1";
        slides[currentIndex].style.pointerEvents = "auto";
      }
      if (dotButtons[currentIndex]) {
        dotButtons[currentIndex].classList.add("is-active");
      }

      if (scrollIndicator) {
        scrollIndicator.className = "noticias-scroll-down color-index-" + currentIndex;
      }
    }

    function startAutoplay() {
      // CONTROL DE SEGURIDAD CRÍTICO: Si solo hay 1 imagen activa HOY, frena el Autoplay de golpe
      if (slides.length < 2) return;
      
      intervalId = setInterval(function() {
        showSlide((currentIndex + 1) % slides.length);
      }, 4500);
    }

    function restartAutoplay() {
      if (intervalId) {
        clearInterval(intervalId);
        startAutoplay();
      }
    }

    // Encendemos el primer elemento de forma segura
    showSlide(0); 
    startAutoplay();
  }

  function init() {
    var containers = document.querySelectorAll(".noticias-header-carousel-container");
    containers.forEach(buildCarousel);
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }
})();