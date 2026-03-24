$('#genericModal').on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget);
    let modal = $(this);
    let modalBody = modal.find('.modal-body');
    modalBody.empty(); // Limpia el contenido del modal
    
    // Obtener y asignar el título
    let modalTitle = button.data('title');
    if (modalTitle) {
        modal.find('.modal-title').text(modalTitle);
    }

    // Obtener las rutas de imagen
    let imagePath = button.data('image'); // <-- Nuevo: para la primera tarjeta
    let imagePath1 = button.data('image-1');
    let imagePath2 = button.data('image-2');

    // Añadir las imágenes si existen
    if (imagePath || imagePath1 || imagePath2) {
        let imagesArray = [];
        if (imagePath) imagesArray.push(imagePath.trim()); // <-- Nuevo
        if (imagePath1) imagesArray.push(imagePath1.trim());
        if (imagePath2) imagesArray.push(imagePath2.trim());

        imagesArray.forEach(function(path) {
            let correctedPath = path.replace(/ /g, '%20');
            let img = $('<img>').attr('src', correctedPath).addClass('img-fluid').css('margin-bottom', '15px');
            modalBody.append(img);
        });
    }

    // Obtener y añadir el texto
    let modalText = button.data('text');
    if (modalText) {
        modalBody.append($('<div>').html(modalText));
    }

    // Obtener y añadir el botón de WhatsApp si existe
    let whatsappUrl = button.data('whatsapp-url');
    if (whatsappUrl) {
        let whatsappLinkHtml = '<a href="' + whatsappUrl + '" class="btn btn-success mt-3" target="_blank">' +
                               '<i class="fab fa-whatsapp"></i> Contáctanos por WhatsApp' +
                               '</a>';
        modalBody.append(whatsappLinkHtml);
    }
});
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

        var modalContentHtml = "";

        // Si hay data-text, lo agrega al contenido
        if (modalText) {
          modalContentHtml += `<p class="mt-3">${modalText}</p>`;
        }

        // Si hay un whatsapp-url, agrega el botón al contenido
        if (whatsappUrl) {
          modalContentHtml += `<a href="${whatsappUrl}" class="btn btn-success mt-3" target="_blank">
						<i class="fab fa-whatsapp"></i> Contáctanos por WhatsApp
					</a>`;
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