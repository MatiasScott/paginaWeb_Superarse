// Borra la línea del addEventListener y deja solo la lógica directa
const frase = document.getElementById("frase-animada");

if (frase) {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                console.log("¡Elemento a la vista! Activando animación...");
                frase.classList.add("activar-palpito");
            }
        });
    }, { threshold: 0.5 });

    observer.observe(frase);
} else {
    console.error("No se encontró el elemento #frase-animada");
}