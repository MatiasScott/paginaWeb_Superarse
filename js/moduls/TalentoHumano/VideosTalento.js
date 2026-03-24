document.addEventListener('DOMContentLoaded', () => {
    // 1. Lógica del carrusel
    const carousels = document.querySelectorAll('.video-carousel-container');

    carousels.forEach(carouselContainer => {
        const carouselWrapper = carouselContainer.querySelector('.video-carousel-wrapper');
        const carouselTrack = carouselContainer.querySelector('.video-carousel-track');
        
        if (!carouselWrapper || !carouselTrack) return;

        const items = Array.from(carouselTrack.querySelectorAll('.video-carousel-item'));
        const totalItems = items.length;
        if (totalItems === 0) return; // Seguridad extra

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
            }, 5000);
        };

        moveCarousel();
        startAutoplay();
    });

    // 2. Lógica para abrir y cerrar el modal de video
    const videoModal = document.getElementById('videoModal');
    const fullVideoPlayer = document.getElementById('fullVideoPlayer');

    // --- VALIDACIÓN CRÍTICA ---
    // Si NO existe el modal o el reproductor, no ejecutamos el resto
    if (!videoModal || !fullVideoPlayer) {
        return; 
    }

    const allVideoItems = document.querySelectorAll('.video-group-item');

    allVideoItems.forEach(videoItem => {
        videoItem.addEventListener('click', () => {
            const videoSource = videoItem.getAttribute('data-video-src');

            if (videoSource) {
                fullVideoPlayer.src = videoSource;
                
                // Asegúrate de que Bootstrap esté cargado
                if (typeof bootstrap !== 'undefined') {
                    const myModal = new bootstrap.Modal(videoModal);
                    myModal.show();
                }
            }
        });
    });

    // Detiene el video al cerrar el modal (Ahora es seguro porque validamos arriba)
    videoModal.addEventListener('hidden.bs.modal', () => {
        fullVideoPlayer.pause();
        fullVideoPlayer.src = ""; // Limpia la fuente para detener la carga
        fullVideoPlayer.currentTime = 0;
    });
});