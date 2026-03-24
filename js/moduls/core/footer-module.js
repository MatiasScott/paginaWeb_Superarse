// Módulo de generación del footer
// Depende de: footerData (cargado desde js/moduls/footer.js, que va al inicio de trailingScripts)

function limpiarMensaje() {
  const msg = document.getElementById("mensaje-formulario");
  if (msg) msg.textContent = "Enviando...";
}

window.addEventListener("load", function () {
  const iframe = document.getElementsByName("iframeRespuesta")[0];
  if (!iframe) return;

  iframe.onload = function () {
    try {
      const contenido = iframe.contentDocument.body.innerText;
      const msg = document.getElementById("mensaje-formulario");
      if (msg && contenido) {
        msg.textContent = contenido;
        msg.style.color = contenido.includes("Éxito") ? "#28a745" : "#dc3545";
      }
    } catch (e) {
      console.error("No se pudo leer la respuesta del formulario.");
    }
  };
});

function generarFooter() {
  if (typeof footerData === "undefined") return;

  const footerContainer = document.querySelector(".footer-container");
  if (!footerContainer) return;

  const redesHtml = footerData.info.redes
    .map(
      (red) => `
      <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
         style="width: 38px; height: 38px" href="${red.enlace}">
        <i class="${red.icono}"></i>
      </a>`
    )
    .join("");

  const contactoHtml = footerData.contacto.elementos
    .map(
      (el) => `
      <div class="d-flex">
        <h4 class="fa ${el.icono} text-primary"></h4>
        <div class="pl-3">
          <h5 class="text-white">${el.titulo}</h5>
          <p>${el.texto}</p>
        </div>
      </div>`
    )
    .join("");

  const enlacesHtml = footerData.enlacesRapidos.items
    .map(
      (item) => `
      <a class="text-white mb-2" href="${item.enlace}">
        <i class="fa fa-angle-right mr-2"></i>${item.texto}
      </a>`
    )
    .join("");

  const f = footerData.admisiones.formulario;

  footerContainer.innerHTML = `
    <a href="${footerData.whatsapp.enlace}" target="_blank" class="whatsapp-float">
      <img src="${footerData.whatsapp.imagenSrc}" alt="${footerData.whatsapp.alt}" width="50" height="50" />
    </a>

    <a href="javascript:void(0)" id="${footerData.buzon.id}" class="buzon-float">
      <i class="${footerData.buzon.icon}"></i>
      <span class="buzon-tooltip">${footerData.buzon.tooltip}</span>
    </a>

    <div class="container-fluid bg-secondary text-white mt-5 py-5 px-sm-3 px-md-5">
      <div class="row pt-5">
        <div class="col-lg-3 col-md-6 mb-5">
          <a href="" class="navbar-brand font-weight-bold text-primary m-0 mb-4 p-0"
             style="font-size: 40px; line-height: 40px">
            <img src="${footerData.info.logo}" height="90px" />
          </a>
          <div class="d-flex justify-content-center mt-4">${redesHtml}</div>
        </div>

        <div class="col-lg-3 col-md-6 mb-5">
          <h3 class="text-primary mb-4">${footerData.contacto.titulo}</h3>
          ${contactoHtml}
        </div>

        <div class="col-lg-3 col-md-6 mb-5">
          <h3 class="text-primary mb-4">${footerData.enlacesRapidos.titulo}</h3>
          <div class="d-flex flex-column justify-content-start">${enlacesHtml}</div>
        </div>

        <div class="col-lg-3 col-md-6 mb-5">
          <h3 class="text-primary mb-4">${footerData.admisiones.titulo}</h3>
          <iframe name="iframeRespuesta" style="display:none;"></iframe>
          <form action="../../../enviar-correo.php" method="POST"
                target="iframeRespuesta" onsubmit="limpiarMensaje()">
            <div class="form-group">
              <input type="text" name="nombre" class="form-control border-0 py-4"
                     placeholder="${f.placeholderNombre}" required />
            </div>
            <div class="form-group">
              <input type="email" name="email" class="form-control border-0 py-4"
                     placeholder="${f.placeholderEmail}" required />
            </div>
            <div class="form-group">
              <input type="tel" name="celular" class="form-control border-0 py-4"
                     placeholder="${f.placeholderWhatsapp}" required />
            </div>
            <div class="form-group">
              <textarea name="description" class="form-control textarea-as-input"
                        placeholder="${f.placeholderDescription}" rows="3" required></textarea>
            </div>
            <div>
              <button class="btn btn-primary btn-block border-0 py-3" type="submit">
                ${f.textoBoton}
              </button>
            </div>
            <div id="mensaje-formulario" class="mensaje-formulario"></div>
          </form>
        </div>
      </div>

      <div class="container-fluid pt-5" style="border-top: 1px solid rgba(23, 162, 184, 0.2)">
        <p class="m-0 text-center text-white">${footerData.copyright.texto}</p>
      </div>
    </div>

    <!-- Modal del Buzón -->
    <div id="buzonModal" class="buzon-modal">
      <div class="buzon-modal-content">
        <div class="buzon-modal-header">
          <button class="buzon-close">&times;</button>
          <h2><i class="fas fa-comments"></i> Buzón de cumplidos, sugerencias y quejas</h2>
        </div>
        <div class="buzon-modal-body">
          <div class="buzon-info-card">
            <p><i class="fas fa-user-secret"></i><strong>Tu mensaje es completamente anónimo.</strong></p>
            <p><i class="fas fa-heart"></i>Tus comentarios nos ayudan a mejorar continuamente.</p>
          </div>
          <div id="buzonAlert" style="display: none;"></div>
          <div class="buzon-form-card">
            <form id="buzonForm">
              <div class="buzon-form-group">
                <label for="buzonTipo"><i class="fas fa-tag"></i>Tipo de mensaje:</label>
                <select id="buzonTipo" name="tipo" required>
                  <option value="">Seleccione una opción...</option>
                  <option value="cumplido">👏 Cumplido</option>
                  <option value="sugerencia">💡 Sugerencia</option>
                  <option value="queja">⚠️ Queja</option>
                </select>
              </div>
              <div class="buzon-form-group">
                <label for="buzonMensaje"><i class="fas fa-pencil-alt"></i>Tu mensaje:</label>
                <textarea id="buzonMensaje" name="mensaje"
                  placeholder="Escribe aquí tu mensaje de forma anónima…" required></textarea>
              </div>
              <button type="submit" class="buzon-submit-btn" id="buzonSubmitBtn">
                <i class="fas fa-paper-plane"></i> Enviar mensaje
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <style>
      .mensaje-formulario {
        margin-top: 10px;
        font-size: 14px;
        font-weight: 600;
        color: #28a745;
      }
    </style>
  `;
}
