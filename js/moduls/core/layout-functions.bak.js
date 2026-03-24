// Coordinador de layout compartido
// Las funciones generarHeader(), generarFooter() e inicializarBuzon()
// se definen en sus módulos respectivos (header-module.js, footer-module.js, buzon-module.js)

// --- INICIO MARCADOR PARA ELIMINACIÓN ---
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
      console.error("No se pudo leer la respuesta");
    }
  };
});

function generarHeader() {
  const headerContainer = document.querySelector(
    "body > .container-fluid.bg-light"
  );
  if (!headerContainer) {
    console.error("No se encontró el contenedor principal del header.");
    return;
  }

  // Función auxiliar para generar submenús de forma recursiva
  const generarDropdownMenu = (items) => {
    let menuHtml = "";
    items.forEach((item) => {
      if (item.items) {
        // Si el ítem tiene sub-ítems, genera otro dropdown (dropright)
        menuHtml += `
                    <div class="dropdown dropright">
                        <a class="dropdown-item dropdown-toggle" href="${item.enlace || "#"
          }" id="${item.id
          }" aria-haspopup="true" aria-expanded="false">
                            ${item.texto}
                        </a>
                        <div class="dropdown-menu rounded-0 m-0" aria-labelledby="${item.id
          }">
                            ${generarDropdownMenu(item.items)}
                        </div>
                    </div>
                `;
      } else {
        // Si es un ítem simple, genera un enlace
        menuHtml += `<a href="${item.enlace}" class="dropdown-item" ${item.target ? `target="${item.target}"` : ""
          }>${item.texto}</a>`;
      }
    });
    return menuHtml;
  };

  // Construye la barra superior
  let topbarHtml = `
        <nav class="navbar navbar-expand-lg py-1 px-0 px-lg-1 fixed-top bg-dark navbar-dark" style="font-size: 0.9rem; z-index: 1030">
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="d-flex justify-content-start w-100">
    `;
  headerData.topbar.slice(0, 2).forEach((item) => {
    topbarHtml += `<a href="${item.enlace}" class="navbar-link ${item.clases}"><i class="${item.icono}"></i>${item.texto}</a>`;
  });
  topbarHtml += `</div><div class="navbar-nav ml-auto" style="margin-right: 10%">`;
  headerData.topbar.slice(2).forEach((item) => {
    if (item.items) {
      topbarHtml += `
                <div class="nav-item dropdown">
                    <a href="#" class="${item.clases}" data-toggle="dropdown">${item.texto
        }</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        ${generarDropdownMenu(item.items)}
                    </div>
                </div>
            `;
    } else {
      topbarHtml += `<a href="${item.enlace}" class="${item.clases}" ${item.target ? `target="${item.target}"` : ""
        }>${item.texto}</a>`;
    }
  });
  topbarHtml += `</div></nav>`;

  // Construye la barra de navegación principal
  let mainNavHtml = `
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-1 fixed-top" style="margin-top: 28px; z-index: 1020">
            <a href="/index.html" class="navbar-brand" style="width: min-content; height: min-content">
                <img src="/assets/img/content/logo/superarse_gris.png" alt="logo" width="140rem" />
            </a>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav font-weight-bold mx-auto py-0">
    `;
  headerData.mainNav.forEach((item) => {
    if (item.items) {
      mainNavHtml += `
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">${item.texto
        }</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        ${generarDropdownMenu(item.items)}
                    </div>
                </div>
            `;
    } else {
      mainNavHtml += `<a href="${item.enlace}" class="nav-item nav-link">${item.texto}</a>`;
    }
  });
  // Añade el enlace final de "Plataformas"
  mainNavHtml += `
                </div>
                <a href="${headerData.finalLink.enlace}" class="${headerData.finalLink.clases
    }" ${headerData.finalLink.target ? `target="${headerData.finalLink.target}"` : ""
    }>
                    ${headerData.finalLink.texto}
                </a>
            </div>
        </nav>
    `;

  // Inserta el HTML completo en el contenedor del header
  headerContainer.innerHTML = topbarHtml + mainNavHtml;
}

// Función para generar y renderizar las tarjetas de aranceles

function generarFooter() {
  const footerContainer = document.querySelector(".footer-container");
  if (!footerContainer) {
    console.error("No se encontró el contenedor del footer.");
    return;
  }

  let footerHtml = `
        

        <a href="${footerData.whatsapp.enlace
    }" target="_blank" class="whatsapp-float">
            <img src="${footerData.whatsapp.imagenSrc}" alt="${footerData.whatsapp.alt
    }" width="50" height="50" />
        </a>
        
<a href="javascript:void(0)"
   id="${footerData.buzon.id}"
   class="buzon-float">

  <i class="${footerData.buzon.icon}"></i>

  <span class="buzon-tooltip">
    ${footerData.buzon.tooltip}
  </span>
</a>


        <div class="container-fluid bg-secondary text-white mt-5 py-5 px-sm-3 px-md-5">
            <div class="row pt-5">
                <div class="col-lg-3 col-md-6 mb-5">
                    <a href="" class="navbar-brand font-weight-bold text-primary m-0 mb-4 p-0" style="font-size: 40px; line-height: 40px">
                        <img src="${footerData.info.logo}" height="90px" />
                    </a>
                    
                    <div class="d-flex justify-content-center mt-4 ">
                        ${footerData.info.redes
      .map(
        (red) => `
                            <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px" href="${red.enlace}">
                                <i class="${red.icono}"></i>
                            </a>
                        `
      )
      .join("")}
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-5">
                    <h3 class="text-primary mb-4">${footerData.contacto.titulo
    }</h3>
                    ${footerData.contacto.elementos
      .map(
        (el) => `
                        <div class="d-flex">
                            <h4 class="fa ${el.icono} text-primary"></h4>
                            <div class="pl-3">
                                <h5 class="text-white">${el.titulo}</h5>
                                <p>${el.texto}</p>
                            </div>
                        </div>
                    `
      )
      .join("")}
                </div>

                <div class="col-lg-3 col-md-6 mb-5">
                    <h3 class="text-primary mb-4">${footerData.enlacesRapidos.titulo
    }</h3>
                    <div class="d-flex flex-column justify-content-start">
                        ${footerData.enlacesRapidos.items
      .map(
        (item) => `
                            <a class="text-white mb-2" href="${item.enlace}">
                                <i class="fa fa-angle-right mr-2"></i>${item.texto}
                            </a>
                        `
      )
      .join("")}
                    </div>
                </div>
            <div class="col-lg-3 col-md-6 mb-5">
    <h3 class="text-primary mb-4">${footerData.admisiones.titulo}</h3>

    <!-- iframe oculto -->
    <iframe name="iframeRespuesta" style="display:none;"></iframe>

    <form 
        action="../../../enviar-correo.php" 
        method="POST"
        target="iframeRespuesta"
        onsubmit="limpiarMensaje()"
    >
        <div class="form-group">
            <input 
                type="text" 
                name="nombre" 
                class="form-control border-0 py-4" 
                placeholder="${footerData.admisiones.formulario.placeholderNombre}" 
                required
            />
        </div>

        <div class="form-group">
            <input 
                type="email"
                name="email"
                class="form-control border-0 py-4"
                placeholder="${footerData.admisiones.formulario.placeholderEmail}"
                required
            />
        </div>

        <div class="form-group">
            <input 
                type="tel"
                name="celular"
                class="form-control border-0 py-4"
                placeholder="${footerData.admisiones.formulario.placeholderWhatsapp}"
                required
            />
        </div>

        <div class="form-group">
            <textarea 
                name="description" 
                class="form-control textarea-as-input"
                placeholder="${footerData.admisiones.formulario.placeholderDescription}" 
                rows="3" 
                required></textarea>
        </div>

        <div>
            <button class="btn btn-primary btn-block border-0 py-3" type="submit">
                ${footerData.admisiones.formulario.textoBoton}
            </button>
        </div>

        <!-- MENSAJE DE RESPUESTA -->
        <div id="mensaje-formulario" class="mensaje-formulario"></div>
    </form>
</div>
<style>
.mensaje-formulario {
    margin-top: 10px;
    font-size: 14px;
    font-weight: 600;
    color: #28a745; /* verde éxito */
}
</style>

            </div>
            

            <div class="container-fluid pt-5" style="border-top: 1px solid rgba(23, 162, 184, 0.2)">
                <p class="m-0 text-center text-white">
                    ${footerData.copyright.texto}
                </p>
            </div>
        </div>
<!-------------------------------- INICIO BUZÓN ------------------------------->
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
                    <label for="buzonTipo">
                      <i class="fas fa-tag"></i>Tipo de mensaje:
                    </label>
                    <select id="buzonTipo" name="tipo" required>
                      <option value="">Seleccione una opción...</option>
                      <option value="cumplido">👏 Cumplido</option>
                      <option value="sugerencia">💡 Sugerencia</option>
                      <option value="queja">⚠️ Queja</option>
                    </select>
                  </div>
                  <div class="buzon-form-group">
                    <label for="buzonMensaje">
                      <i class="fas fa-pencil-alt"></i>Tu mensaje:
                    </label>
                    <textarea 
                      id="buzonMensaje" 
                      name="mensaje" 
                      placeholder="Escribe aquí tu mensaje de forma anónima. Sé claro y específico para que podamos entender mejor tu punto de vista..." 
                      required
                    ></textarea>
                  </div>
                  <button type="submit" class="buzon-submit-btn" id="buzonSubmitBtn">
                    <i class="fas fa-paper-plane"></i> Enviar mensaje
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
<!-------------------------------FIN BUZON ------------------------------------>
    `;

  footerContainer.innerHTML = footerHtml;
}

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
      console.error("No se pudo leer la respuesta");
    }
  };
});

function inicializarBuzon() {
  const buzonBtn = document.getElementById('buzonBtn');
  const buzonModal = document.getElementById('buzonModal');
  const buzonClose = document.querySelector('.buzon-close');
  const buzonForm = document.getElementById('buzonForm');
  const buzonAlert = document.getElementById('buzonAlert');
  const buzonSubmitBtn = document.getElementById('buzonSubmitBtn');

  if (!buzonBtn || !buzonModal) return;

  // Abrir modal
  buzonBtn.addEventListener('click', () => {
    buzonModal.style.display = 'block';
    document.body.style.overflow = 'hidden';
  });

  // Cerrar modal
  if (buzonClose) {
    buzonClose.addEventListener('click', cerrarModal);
  }
  window.addEventListener('click', e => { if (e.target === buzonModal) cerrarModal(); });
  document.addEventListener('keydown', e => { if (e.key === 'Escape' && buzonModal.style.display === 'block') cerrarModal(); });

  function cerrarModal() {
    buzonModal.style.display = 'none';
    document.body.style.overflow = 'auto';
    resetBuzonForm();
  }

  // Envío del formulario
  if (buzonForm) {
    buzonForm.addEventListener('submit', function (e) {
      e.preventDefault();
      const tipo = document.getElementById('buzonTipo').value;
      const mensaje = document.getElementById('buzonMensaje').value.trim();
      if (!tipo || !mensaje) return showBuzonAlert('Por favor, completa todos los campos.', 'error');

      buzonSubmitBtn.disabled = true;
      buzonSubmitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enviando...';

      const formData = new FormData();
      formData.append('tipo', tipo);
      formData.append('mensaje', mensaje);

      fetch('/enviar-buzon.php', { method: 'POST', body: formData })
        .then(res => res.json())
        .then(data => {
          if (data.success) {
            showBuzonAlert(data.message, 'success');
            setTimeout(cerrarModal, 2000);
          } else showBuzonAlert(data.message || 'Error al enviar el mensaje.', 'error');
        })
        .catch(() => showBuzonAlert('Error al enviar el mensaje.', 'error'))
        .finally(() => {
          buzonSubmitBtn.disabled = false;
          buzonSubmitBtn.innerHTML = '<i class="fas fa-paper-plane"></i> Enviar mensaje';
        });
    });
  }

  function showBuzonAlert(message, type) {
    const icon = type === 'success' ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-exclamation-triangle"></i>';
    buzonAlert.className = `buzon-alert buzon-alert-${type}`;
    buzonAlert.innerHTML = icon + ' ' + message;
    buzonAlert.style.display = 'flex';
    const modalBody = document.querySelector('.buzon-modal-body');
    if (modalBody) modalBody.scrollTop = 0;
    if (type === 'success') setTimeout(() => buzonAlert.style.display = 'none', 5000);
  }

  function resetBuzonForm() {
    if (buzonForm) buzonForm.reset();
    if (buzonAlert) buzonAlert.style.display = 'none';
  }
}

let sharedLayoutInitialized = false;

function initSharedLayout() {
  if (sharedLayoutInitialized) {
    return;
  }
  sharedLayoutInitialized = true;

  try {
    generarHeader();
  } catch (error) {
    console.error("No se pudo generar el header:", error);
  }

  try {
    generarFooter();
  } catch (error) {
    console.error("No se pudo generar el footer:", error);
  }

  try {
    inicializarBuzon();
  } catch (error) {
    console.error("No se pudo inicializar el buzon:", error);
  }
}

window.initSharedLayout = initSharedLayout;

if (document.readyState === "loading") {
  document.addEventListener("DOMContentLoaded", initSharedLayout);
} else {
  initSharedLayout();
}



// Esta función puede ir en tu main.js o en un archivo aparte.

