window.mostrarPublicacionInvestigacion = function (id) {
  var contenedor = document.getElementById("publicacionesDetalleDinamico");
  if (!contenedor) return;
  contenedor.querySelectorAll("[data-publicacion-periodo]").forEach(function (t) {
    t.classList.add("d-none");
  });
  var target = contenedor.querySelector('[data-publicacion-periodo="' + id + '"]');
  if (target) {
    target.classList.remove("d-none");
    target.scrollIntoView({ behavior: "smooth", block: "center" });
  }
};