// areasDeVinculacionData.js

const areasDeVinculacionData = [
 
{
  id: "equipoTrabajo",
  title: "Equipo de Trabajo de Vinculación",
  content: `
    <div class="d-flex justify-content-center">
      <div class="card-container">
        <div class="flip-cardp" style="min-height: 450px; max-width: 400px;">
          <div class="flip-cardp-inner">
            <div class="flip-cardp-front">
              <i class="fas fa-sync-alt flip-icon"></i>
              <img src="/assets/img/Vinculacion/07 - CONTACTO RELACIONES INSTITUCIONALES-01.png" alt="Imagen Principal" width="100%" height="100%">
            </div>
            <div class="flip-cardp-back" style="background-color: #5069A1;">
              <div class="back-content">
                <div class="icon-section">
                  <i class="fas fa-envelope icon"></i>
                  <p class="style text-center">
                  <a href="mailto:vinculacion@superarse.edu.ec">vinculacion@superarse.edu.ec</a>
                  </p>
                
                </div>
                <a href="https://wa.me/593983974688?text=Hola,%20me%20gustaría%20más%20información%20Sobre%20el%20tema%20de%20Vinculación" class="whatsapp-link">
                  <div class="icon-section">
                    <i class="fas fa-mobile-alt icon"></i>
                    <p class="style text-center">0998409293</p>
                  </div>
                </a>
                <i class="fas fa-sync-alt flip-icon"></i>
              </div>
            </div>
          </div>
        </div>
        <p class="text-center">La Coordinación de Vinculación</p>
      </div>
    </div>
  `,
},

  {
    id: "modelodevinculacion",
    title: "Modelo de vinculación",
    content: `
    <h4><strong>Modelo de Gestión: Investigación, Innovación y Vinculación con la Sociedad </strong></h4>
      <p>
        El Instituto Superior Tecnológico Superarse impulsa un modelo de gestión que articula 
        de manera estratégica sus funciones sustantivas: Docencia, Investigación y Vinculación. 
        Nuestro objetivo es aplicar el conocimiento para ofrecer soluciones concretas a los desafíos del entorno. 
      </p>
      <h5><strong>¿Cómo lo logramos?</strong></h5>
      <ul>
      <li><strong>Integración Estratégica:</strong>Alineamos la docencia con las necesidades de investigación y
       las demandas de la sociedad. Este modelo responde directamente a nuestra misión institucional y a los 
       objetivos del Plan Estratégico de Desarrollo Institucional (PEDI).</li><br>
      <li><strong>Aplicación Práctica del Conocimiento: </strong>Fomentamos proyectos que transfieren innovación 
      tecnológica y académica a los sectores productivos y sociales, generando un impacto medible</li><br>
      <li><strong>Desarrollo de Alianzas: </strong> Construimos y fortalecemos redes de colaboración con actores clave 
      para potenciar el alcance de nuestras iniciativas y asegurar su pertinencia</li>
      </ul>
      <div class="d-flex justify-content-center">
  <a
    href="/Vinculacion"
    target="_blank"
    class="btn btn-sm btn-info mr-2"
  >
    <i class="fa fa-file-pdf mr-2"></i> Modelo de gestión
  </a>
</div>
      
    `,
  },
 {
  id: "programasProyectos",
  title: "Programas y Proyectos de Vinculación",
  content: `
    <h4>Listado de Programas</h4>
<p>Accede a nuestros programas. El carrusel de muestras pasa automáticamente.</p>
 <div class="main-image-container mb-3" style="text-align: center;">
 <img id="matematicas-main-img" src="/assets/img/Vinculacion/CARRUSEL 03 - VINCULACION-01.jpg" alt="Portada del programa Integra animal" style="max-width: 100%; height: 400px; object-fit: contain; border: 1px solid #ccc;">
 </div>

<div class="form-group">
 <label for="libroSelector">Selecciona un Programa para visualizar:</label>
  <select class="form-control" id="libroSelector" onchange="
    document.querySelectorAll('.image-viewer').forEach(viewer => viewer.style.display = 'none');
    const selectedViewerId = this.value;
    if (selectedViewerId) {
      document.getElementById(selectedViewerId).style.display = 'block';
    }
  ">
    <option value="">-- Elige un Programa --</option>
    <option value="matematicas-viewer">INTEGRANIMAL</option>
   <option value="publicidad-viewer">CUENTOS QUE CONECTAN</option>
   <option value="reglamento-viewer"> ECOHUELLA</option>
  </select>
</div>

<div id="matematicas-viewer" class="image-viewer" style="display:none; margin-top: 15px;">
 <h4>INTEGRANIMAL: De la investigación a la práctica comunitaria</h4>
 
 <div class="main-image-container mb-3" style="text-align: center;">
  <img id="matematicas-main-img" src="/assets/img/Vinculacion/IntegraAnimal/CARRUSEL 03 - VINCULACION-04.jpg" alt="Portada del programa Integra animal" style="max-width: 100%; height: 400px; object-fit: contain; border: 1px solid #ccc;">
  </div>
 
     <div id="carouselIntegranimal" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
 <div class="carousel-inner">
 
      <div class="carousel-item active">
      <div class="d-flex justify-content-around">
         <img src="/assets/img/Vinculacion/IntegraAnimal/BIENESTAR 5.jpg" alt="Muestra 1" class="img-thumbnail" style="width: 50%; height: 150px; object-fit: cover; cursor: default;">
         <img src="/assets/img/Vinculacion/IntegraAnimal/BIENESTAR 4.jpg" alt="Muestra 2" class="img-thumbnail" style="width: 50%; height: 150px; object-fit: cover; cursor: default;">
         <img src="/assets/img/Vinculacion/IntegraAnimal/BIENESTAR 3.jpg" alt="Muestra 3" class="img-thumbnail" style="width: 50%; height: 150px; object-fit: cover; cursor: default;">
      </div>
     </div>

          <div class="carousel-item">
     <div class="d-flex justify-content-around">
         <img src="/assets/img/Vinculacion/IntegraAnimal/BIENESTAR ANIMAL2.jpg" alt="Muestra 4" class="img-thumbnail" style="width: 50%; height: 150px; object-fit: cover; cursor: default;">
         <img src="/assets/img/Vinculacion/IntegraAnimal/BIENESTAR ANMIAL 1.jpg" alt="Muestra 5" class="img-thumbnail" style="width: 50%; height: 150px; object-fit: cover; cursor: default;">
         
      </div>
     </div>
  </div>
 </div>
</div>


<div id="publicidad-viewer" class="image-viewer" style="display:none; margin-top: 15px;">
 <h4>CUENTOS QUE CONECTAN: Fomento de la lectura</h4>
 
  <div class="main-image-container mb-3" style="text-align: center;">
  <img id="publicidad-main-img" src="/assets/img/Vinculacion/Cuentos/CARRUSEL 03 - VINCULACION-02.jpg" alt="Portada de Cuentos que Conectan" style="max-width: 100%; height: 400px; object-fit: contain; border: 1px solid #ccc;">
 </div>
 
     <div id="carouselCuentos" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
  <div class="carousel-inner">
     
          <div class="carousel-item active">
      <div class="d-flex justify-content-around">
         <img src="/assets/img/Vinculacion/Cuentos/Cuentos que conectan.jpeg" alt="Muestra 1" class="img-thumbnail" style="width: 50%; height: 150px; object-fit: cover; cursor: default;">
         <img src="/assets/img/Vinculacion/Cuentos/CUENTOS 3.jpg" alt="Muestra 2" class="img-thumbnail" style="width: 50%; height: 150px; object-fit: cover; cursor: default;">
         
      </div>
     </div>

          <div class="carousel-item">
      <div class="d-flex justify-content-around">
         <img src="/assets/img/Vinculacion/Cuentos/Cuentos que conectan.jpeg" alt="Muestra 4" class="img-thumbnail" style="width: 50%; height: 150px; object-fit: cover; cursor: default;">
         <img src="/assets/img/Vinculacion/Cuentos/CUENTOS 4.jpg" alt="Muestra 3" class="img-thumbnail" style="width: 50%; height: 150px; object-fit: cover; cursor: default;">
      </div>
     </div>
  </div>
 </div>
</div>
<div id="reglamento-viewer" class="image-viewer" style="display:none; margin-top: 15px;">
 <h4>ECOHUELLA: Herramienta de sostenibilidad</h4>
 
  <div class="main-image-container mb-3" style="text-align: center;">
  <img id="reglamento-main-img" src="/assets/img/Vinculacion/RSE/CARRUSEL 03 - VINCULACION-03.jpg" alt="Portada de Ecohuella" style="max-width: 100%; height: 400px; object-fit: contain; border: 1px solid #ccc;">
 </div>

     <div id="carouselEcohuella" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
 <div class="carousel-inner">
     
          <div class="carousel-item active">
      <div class="d-flex justify-content-around">
         <img src="/assets/img/Vinculacion/RSE/Participacion de estudiante en proyecto ecohuella.jpeg" alt="Muestra 1" class="img-thumbnail" style="width: 30%; height: 150px; object-fit: cover; cursor: default;">
         <img src="/assets/img/Vinculacion/RSE/Proyecto de Ecohuella.jpeg" alt="Muestra 2" class="img-thumbnail" style="width: 50%; height: 150px; object-fit: cover; cursor: default;">
         <img src="/assets/img/Vinculacion/RSE/Proyecto Ecohuella 2.jpeg" alt="Muestra 3" class="img-thumbnail" style="width: 50%; height: 150px; object-fit: cover; cursor: default;">
      </div>
     </div>

          <div class="carousel-item">
      <div class="d-flex justify-content-around">
         <img src="/assets/img/Vinculacion/RSE/Mercado Cesar Chiriboga.jpeg" alt="Muestra 4" class="img-thumbnail" style="width: 50%; height: 150px; object-fit: cover; cursor: default;">
         <img src="/assets/img/Vinculacion/RSE/Gestion mercado Cesar Chiriboga.jpeg" alt="Muestra 5" class="img-thumbnail" style="width: 50%; height: 150px; object-fit: cover; cursor: default;">
      </div>
     </div>
  </div>
  
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselEcohuella" data-bs-slide="prev" style="width: 5%;">
 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
 <span class="visually-hidden">Previous</span>
 </button>
 <button class="carousel-control-next" type="button" data-bs-target="#carouselEcohuella" data-bs-slide="next" style="width: 5%;">
 <span class="carousel-control-next-icon" aria-hidden="true"></span>
 <span class="visually-hidden">Next</span>
 </button>
</div>
</div>
 `,
}, 
];