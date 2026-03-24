document.addEventListener("DOMContentLoaded", function() {
    const frase = document.getElementById("frase-animada");

    if (frase) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Agregamos la clase que definimos en el CSS
                    frase.classList.add("activar-palpito");
                }
            });
        }, { threshold: 0.5 });

        observer.observe(frase);
    }
});