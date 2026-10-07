(function () {
    function actualizarBoton(cuerpo) {
        var tarjeta = cuerpo.closest(".card");
        if (!tarjeta) { return; }
        var boton = tarjeta.querySelector(".evento-ver-mas");
        if (!boton) { return; }

        var abierto = cuerpo.classList.contains("evento-cuerpo-abierto");
        var desborda = cuerpo.scrollHeight > cuerpo.clientHeight + 4;
        boton.hidden = abierto ? false : !desborda;
        boton.textContent = abierto ? "Ver menos" : "Ver más";
    }

    function configurarEventos() {
        var cuerpos = document.querySelectorAll(".evento-cuerpo");

        cuerpos.forEach(function (cuerpo) {
            if (cuerpo.dataset.configurado !== "1") {
                cuerpo.dataset.configurado = "1";

                var tarjeta = cuerpo.closest(".card");
                var boton = tarjeta ? tarjeta.querySelector(".evento-ver-mas") : null;

                if (boton) {
                    boton.addEventListener("click", function () {
                        var abierto = cuerpo.classList.toggle("evento-cuerpo-abierto");
                        if (!abierto) {
                            tarjeta.scrollIntoView({ behavior: "smooth", block: "nearest" });
                        }
                        actualizarBoton(cuerpo);
                    });
                }
            }

            actualizarBoton(cuerpo);
        });
    }

    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", configurarEventos);
    } else {
        configurarEventos();
    }

    window.addEventListener("load", configurarEventos);
})();
