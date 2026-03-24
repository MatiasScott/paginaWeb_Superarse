document.addEventListener('DOMContentLoaded', () => {
    // Código para la animación de volteo (si lo usas)
    const flipCard = document.querySelector('.flip-card');
    if (flipCard) {
        flipCard.addEventListener('click', () => {
            flipCard.classList.toggle('active');
        });
    }

    // Código para inicializar múltiples carruseles de IMÁGENES
    const imageCarousels = document.querySelectorAll('.image-carousel-container');
    imageCarousels.forEach(carouselContainer => {
        setupCarousel(carouselContainer, '.image-carousel-wrapper', '.image-carousel-track', '.image-carousel-item');
    });

    // Código para inicializar múltiples carruseles de VIDEO
    const videoCarousels = document.querySelectorAll('.video-carousel-container');
    videoCarousels.forEach(carouselContainer => {
        setupCarousel(carouselContainer, '.video-carousel-wrapper', '.video-carousel-track', '.video-carousel-item');
    });

    // Función genérica para configurar cualquier carrusel
    function setupCarousel(container, wrapperClass, trackClass, itemClass) {
        const carouselWrapper = container.querySelector(wrapperClass);
        const carouselTrack = container.querySelector(trackClass);
        if (!carouselWrapper || !carouselTrack) return;

        const items = Array.from(carouselTrack.querySelectorAll(itemClass));
        const totalItems = items.length;
        if (totalItems === 0) return;
        
        let currentIndex = 0;

        const moveCarousel = () => {
            const itemWidth = carouselWrapper.offsetWidth;
            const offset = -currentIndex * itemWidth;
            carouselTrack.style.transform = `translateX(${offset}px)`;
        };

        const startAutoplay = () => {
            setInterval(() => {
                currentIndex = (currentIndex < totalItems - 1) ? currentIndex + 1 : 0;
                moveCarousel();
            }, 5000); // 5 segundos
        };

        moveCarousel();
        startAutoplay();
        window.addEventListener('resize', moveCarousel);
    }
});