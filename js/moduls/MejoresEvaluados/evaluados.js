document.addEventListener('DOMContentLoaded', function() {
    const contentDisplayArea = document.getElementById('content-display-area');
    const links = document.querySelectorAll('.list-group-item-action');
// Función para cargar el contenido
function loadContent(contentId) {
    // Limpia el área de visualización
    contentDisplayArea.innerHTML = '';
    
    // Clona el contenido deseado y lo añade al área de visualización
    const contentTemplate = document.getElementById(contentId);
    if (contentTemplate) {
        const clonedContent = contentTemplate.cloneNode(true);
        clonedContent.style.display = 'block'; // Asegura que sea visible
        // Aquí quitamos el ID clonado para evitar duplicados si el template ya tiene uno
        clonedContent.removeAttribute('id'); 
        contentDisplayArea.appendChild(clonedContent);

        // Re-inicializa la lógica de las fotos de perfil si se cargó cualquiera de las secciones de "mejores-evaluados"
        if (contentId === 'content-mejores-evaluados' || contentId === 'content-mejores-evaluadosP' || contentId === 'content-mejores-evaluadosX') {
            initializeProfileClickHandlers();
        }
        // No necesitas un 'else' vacío, simplemente omítelo si no hay otra acción específica.
    }
}

    // Inicializa los manejadores de clic para los enlaces del menú
    links.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Evita que el navegador navegue
            const contentId = this.getAttribute('data-content-id');
            if (contentId) {
                loadContent(contentId);
                // Elimina la clase 'active' de todos los enlaces
                links.forEach(l => l.classList.remove('active'));
                // Añade la clase 'active' al enlace clickeado
                this.classList.add('active');
            }
        });
    });

    // Función para inicializar los manejadores de clic de los perfiles de profesor
    function initializeProfileClickHandlers() {
        // CORREGIDO: Se cambió '.perfil-profesorp' a '.perfil-profesor'
        const perfiles = contentDisplayArea.querySelectorAll('.perfil-profesorp'); 
        const contenedorFotoGrande = contentDisplayArea.querySelector('#contenedor-foto-grande');
        const fotoPrincipal = contentDisplayArea.querySelector('#foto-principal');
        const nombreProfesor = contentDisplayArea.querySelector('#nombre-profesor');

        perfiles.forEach(perfil => {
            perfil.addEventListener('click', function() {
                const largeSrc = this.getAttribute('data-large-src');
                const name = this.getAttribute('data-name');

                if (fotoPrincipal && nombreProfesor && contenedorFotoGrande) {
                    fotoPrincipal.src = largeSrc;
                    nombreProfesor.textContent = name;
                    contenedorFotoGrande.classList.remove('d-none'); // Muestra el contenedor
                }
            });
        });
    }

    // Opcional: Cargar un contenido predeterminado al inicio, por ejemplo, los mejores evaluados
    loadContent('content-mejores-evaluados'); 
    // También activa el enlace correspondiente si cargas un contenido por defecto
    const defaultLink = document.querySelector('[data-content-id="content-mejores-evaluados"]');
    if (defaultLink) {
        defaultLink.classList.add('active');
    }
});