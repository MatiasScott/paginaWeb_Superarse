// Paginación y buscador de la sección Noticias (trabaja sobre el HTML renderizado en el servidor)
(function () {
  var grid = document.getElementById("noticias-grid");
  var paginacion = document.getElementById("paginacionNoticias");
  var buscador = document.getElementById("buscadorNoticias");

  if (!grid || !paginacion) return;

  var NOTICIAS_POR_PAGINA = 6;
  var tarjetas = Array.prototype.slice.call(grid.querySelectorAll(".noticia-card"));
  var tarjetasFiltradas = tarjetas;
  var paginaActual = 1;

  var mensajeVacio = document.createElement("div");
  mensajeVacio.className = "text-center w-100 py-5";
  mensajeVacio.style.display = "none";
  mensajeVacio.innerHTML = '<p class="text-muted lead">No se encontraron noticias con ese criterio de búsqueda.</p>';
  grid.appendChild(mensajeVacio);

  function renderizarPagina() {
    tarjetas.forEach(function (t) { t.style.display = "none"; });
    mensajeVacio.style.display = "none";

    if (tarjetasFiltradas.length === 0) {
      mensajeVacio.style.display = "";
      paginacion.innerHTML = "";
      return;
    }

    var indiceInicial = (paginaActual - 1) * NOTICIAS_POR_PAGINA;
    var deLaPagina = tarjetasFiltradas.slice(indiceInicial, indiceInicial + NOTICIAS_POR_PAGINA);
    deLaPagina.forEach(function (t) { t.style.display = ""; });

    crearControlesPaginacion();
  }

  function crearControlesPaginacion() {
    paginacion.innerHTML = "";
    var totalPaginas = Math.ceil(tarjetasFiltradas.length / NOTICIAS_POR_PAGINA);

    if (totalPaginas <= 1) return;

    var btnAnt = document.createElement("button");
    btnAnt.innerHTML = '<i class="fas fa-chevron-left"></i>';
    btnAnt.disabled = paginaActual === 1;
    btnAnt.addEventListener("click", function () {
      if (paginaActual > 1) { paginaActual--; actualizarVista(); }
    });
    paginacion.appendChild(btnAnt);

    for (var i = 1; i <= totalPaginas; i++) {
      (function (pagina) {
        var btnNum = document.createElement("button");
        btnNum.innerText = pagina;
        if (pagina === paginaActual) btnNum.className = "active";
        btnNum.addEventListener("click", function () {
          paginaActual = pagina;
          actualizarVista();
        });
        paginacion.appendChild(btnNum);
      })(i);
    }

    var btnSig = document.createElement("button");
    btnSig.innerHTML = '<i class="fas fa-chevron-right"></i>';
    btnSig.disabled = paginaActual === totalPaginas;
    btnSig.addEventListener("click", function () {
      if (paginaActual < totalPaginas) { paginaActual++; actualizarVista(); }
    });
    paginacion.appendChild(btnSig);
  }

  function actualizarVista() {
    renderizarPagina();
    var contenedor = document.querySelector(".container-top");
    if (contenedor) contenedor.scrollIntoView({ behavior: "smooth" });
  }

  if (buscador) {
    buscador.addEventListener("input", function () {
      var texto = this.value.toLowerCase().trim();
      tarjetasFiltradas = tarjetas.filter(function (t) {
        return t.getAttribute("data-busqueda").indexOf(texto) !== -1;
      });
      paginaActual = 1;
      renderizarPagina();
    });
  }

  renderizarPagina();
})();