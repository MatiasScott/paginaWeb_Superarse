
    
    // Asegúrate de que este script ya esté en tu página una vez
    // Inicialización del carrusel cuando el modal de vacantes se abre
    $('#vacantesModal').on('shown.bs.modal', function () {
        $('#vacantesCarousel').carousel();
    });

    // Carga del PDF en el modal cuando el modal de PDF se abre
    $('#pdfModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var pdfSrc = button.data('pdf-src');
        var modal = $(this);
        modal.find('#pdfFrame').attr('src', pdfSrc);
    });

    // Inicialización del carrusel cuando el modal de entorno laboral se abre
    $('#entornoLaboralModal').on('shown.bs.modal', function () {
        $('#entornoCarousel').carousel();
    });




    //modal
$("#genericModal").on("show.bs.modal", function (event) {
  var button = $(event.relatedTarget);
  var imageUrl = button.data("image");
  var modalTitle = button.data("title");
  var modalText = button.data("text");
  var whatsappUrl = button.data("whatsapp-url");

  var modal = $(this);
  modal.find(".modal-title").text(modalTitle);
  
  // Lógica para mostrar u ocultar la imagen
  var modalImage = modal.find("#modalImage");
  if (imageUrl) {
    // Si hay una URL, la asigna y la muestra
    modalImage.attr("src", imageUrl).show();
  } else {
    // Si no hay URL, oculta la imagen
    modalImage.hide();
  }

  var modalContentHtml = '';

  // Si hay data-text, lo agrega al contenido
  if (modalText) {
    modalContentHtml += `<p class="mt-3">${modalText}</p>`;
  }
  
  // Inserta todo el contenido en el área de texto del modal.
  modal.find("#modalText").html(modalContentHtml);
});

// Resetea el modal cuando se esconde
$("#genericModal").on("hidden.bs.modal", function () {
  var modal = $(this);
  modal.find("#modalImage").attr("src", "").show(); // Restaura la imagen y la muestra para la próxima vez
  modal.find(".modal-title").text("");
  modal.find("#modalText").html("");
});
// para hacer grande el modal en canva 

