// Definición de los colores
const colores = {
  azul: "rgb(0, 102, 169)",
  gris: "gray",
  verde: "rgb(105, 163, 62)",
  naranja: "rgb(249, 168, 38)",
  mnaranja: "rgba(239, 178, 79, 1)"
};

// Frases a animar
const frasesAnimadas = [
  // SENESCYT azul, AVAL gris
  () => {
    const senescytSpan = document.createElement("span");
    senescytSpan.textContent = "REGISTRO";
    senescytSpan.style.color = colores.azul;
    
    const avalSpan = document.createElement("span");
    avalSpan.textContent = " SENESCYT";
    avalSpan.style.color = colores.gris;
    
    return [senescytSpan, avalSpan];
  },
  
  // MODALIDADES verde, DE ESTUDIO gris
  () => {
    const modalidadesSpan = document.createElement("span");
    modalidadesSpan.textContent = "MODALIDADES";
    modalidadesSpan.style.color = colores.verde;
    
    const estudioSpan = document.createElement("span");
    estudioSpan.textContent = " DE ESTUDIO";
    estudioSpan.style.color = colores.gris;
    
    return [modalidadesSpan, estudioSpan];
  },
  
  // HIBRIDA gris, EN LINEA naranja
  () => {
    const hibridaSpan = document.createElement("span");
    hibridaSpan.textContent = "HÍBRIDA O ";
    hibridaSpan.style.color = colores.gris; 
    
    const lineaSpan = document.createElement("span");
    lineaSpan.textContent = "EN LÍNEA";
    lineaSpan.style.color = colores.naranja;
    
    return [hibridaSpan, lineaSpan];
  },
  
  // GRADUATE gris, 1 O 2 naranja, AÑOS gris
  () => {
    const graduateSpan = document.createElement("span");
    graduateSpan.textContent = "GRADÚATE EN ";
    graduateSpan.style.color = colores.gris; 
    
    const anosSpan = document.createElement("span");
    anosSpan.textContent = "1 O 2";
    anosSpan.style.color = colores.mnaranja;

    const anosParte2Span = document.createElement("span");
    anosParte2Span.textContent = " AÑOS";
    anosParte2Span.style.color = colores.gris;
    
    return [graduateSpan, anosSpan, anosParte2Span];
  },

  // TALLERES gris, 100% azul, PRACTICAS gris
  () => {
    const talleresSpan = document.createElement("span");
    talleresSpan.textContent = "TALLERES ";
    talleresSpan.style.color = colores.gris; 
    
    const practicosSpan = document.createElement("span");
    practicosSpan.textContent = "100%";
    practicosSpan.style.color = colores.azul;
    
    const practicasParte2Span = document.createElement("span");
    practicasParte2Span.textContent = " PRÁCTICOS";
    practicasParte2Span.style.color = colores.gris;
    
    return [talleresSpan, practicosSpan, practicasParte2Span];
  }
];

// Variable para llevar la cuenta de la posición actual
let indice = 0;

// La función que se ejecuta en el intervalo
setInterval(() => {
  const elemento = document.getElementById('texto-animado');
  
  // Limpia el contenido anterior del elemento
  elemento.textContent = '';

  // Obtiene y añade los nuevos elementos <span> con los colores correctos
  const fragmentos = frasesAnimadas[indice]();
  fragmentos.forEach(fragmento => {
    elemento.appendChild(fragmento);
  });
  
  // Incrementa el índice para la próxima iteración
  indice = (indice + 1) % frasesAnimadas.length;
}, 2000); // 2000 milisegundos = 2 segundos