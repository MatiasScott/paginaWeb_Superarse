const valoresData = [
    {
        nombre: "Proactividad",
        texto: "Valoramos la capacidad de anticiparse a las necesidades, problemas y oportunidades, tomando la iniciativa para mejorar continuamente la organización e investigación.",
        icono: "fas fa-bolt"
    },
    {
        nombre: "Ética y Compromiso",
        texto: "Nos guiamos por principios éticos sólidos y un profundo compromiso con la excelencia educativa, fomentando integridad, honestidad y respeto.",
        icono: "fas fa-handshake"
    },
    {
        nombre: "Calidad",
        texto: "Nos comprometemos a ofrecer una educación de alta calidad que cumpla con los más altos estándares académicos y profesionales.",
        icono: "fas fa-award"
    },
    {
        nombre: "Equidad e Inclusión",
        texto: "Promovemos un entorno donde todos tienen igualdad de oportunidades para aprender y desarrollarse, valorando la diversidad de nuestra comunidad.",
        icono: "fas fa-users"
    },
    {
        nombre: "Sostenibilidad",
        texto: "Integramos prácticas que promuevan el equilibrio entre el crecimiento académico, la responsabilidad social y la protección del medio ambiente.",
        icono: "fas fa-leaf"
    }
];

function renderizarValores() {
    const container = document.getElementById("contenedor-valores-cards");
    if (!container) return;

    // Limpiar contenedor antes de renderizar
    container.innerHTML = "";

    valoresData.forEach(valor => {
        const cardHtml = `
            <div class="card-valor-pro">
                <div class="icon-wrapper-pro">
                    <i class="${valor.icono}"></i>
                </div>
                <h4>${valor.nombre}</h4>
                <p>${valor.texto}</p>
            </div>
        `;
        container.innerHTML += cardHtml;
    });
}

// Ejecutar cuando el DOM esté listo
if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", renderizarValores);
} else {
    renderizarValores();
}