(function ($) {
  "use strict";
  $(document).ready(function () {
    $(".convenios-carousel").owlCarousel({
      loop: true,
      margin: 10,
      nav: false,
      dots: false,
      autoplay: true,
      autoplayTimeout: 3000,
      responsive: {
        0: { items: 1 },
        768: { items: 2 },
        992: { items: 6 },
      },
    });

    $(".otras-fotos-carousel").owlCarousel({
      loop: true,
      margin: 10,
      nav: false,
      dots: false,
      autoplay: true,
      autoplayTimeout: 3000,
      responsive: {
        0: { items: 1 },
        768: { items: 2 },
        992: { items: 6 },
      },
    });

    $(".otras-fotos-carousel2").owlCarousel({
      loop: true,
      margin: 10,
      nav: false,
      dots: false,
      autoplay: true,
      autoplayTimeout: 3000,
      responsive: {
        0: { items: 1 },
        768: { items: 2 },
        992: { items: 3 },
      },
    });
  });
})(jQuery);