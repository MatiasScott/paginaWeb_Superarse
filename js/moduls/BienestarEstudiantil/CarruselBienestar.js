document.addEventListener('DOMContentLoaded', () => {
    // Código para la animación de volteo
    const flipCard = document.querySelector('.flip-card');
    if (flipCard) {
        flipCard.addEventListener('click', () => {
            flipCard.classList.toggle('active');
        });
    }

    // Código para inicializar múltiples carruseles
    const carousels = document.querySelectorAll('.custom-carousel-wrapper');
    if (carousels.length === 0) return;

    carousels.forEach(carouselWrapper => {
        const carouselTrack = carouselWrapper.querySelector('.custom-carousel-track');
        if (!carouselTrack) return;

        const items = Array.from(carouselTrack.querySelectorAll('.custom-carousel-item'));
        const dotsContainer = carouselWrapper.querySelector('.custom-dots-container');
        const totalItems = items.length;
        let currentIndex = 0;

        // Función para actualizar los puntos (dots)
        const updateDots = () => {
            if (!dotsContainer) return;
            dotsContainer.innerHTML = '';
            items.forEach((_, index) => {
                const dot = document.createElement('span');
                dot.classList.add('custom-dot');
                if (index === currentIndex) {
                    dot.classList.add('active');
                }
                dot.addEventListener('click', () => {
                    currentIndex = index;
                    updateCarousel();
                });
                dotsContainer.appendChild(dot);
            });
        };

        // Función para centrar la diapositiva activa
        const centerActiveSlide = () => {
            if (items.length === 0) return;
            const itemWidth = items[0].offsetWidth;
            const totalOffset = -currentIndex * itemWidth;
            carouselTrack.style.transform = `translateX(${totalOffset}px)`;
        };
        
        // Función para actualizar el carrusel
        const updateCarousel = () => {
            items.forEach(item => item.classList.remove('active'));
            items[currentIndex].classList.add('active');
            updateDots();
            centerActiveSlide();
        };

        // Lógica para el movimiento automático
        const startAutoplay = () => {
            setInterval(() => {
                currentIndex = (currentIndex < totalItems - 1) ? currentIndex + 1 : 0;
                updateCarousel();
            }, 3000); // Mueve la diapositiva cada 5 segundos
        };

        // Iniciar el carrusel y el movimiento automático
        updateCarousel();
        startAutoplay();

        // Actualizar al redimensionar la ventana
        window.addEventListener('resize', centerActiveSlide);
    });
});