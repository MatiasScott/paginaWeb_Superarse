// valoresData.js

const modalidadesData = [
  {
    nombre: "CONVENIOS INSTITUCIONALES",
    id: "list-calidad",
    texto:
      "El Instituto Superior Tecnológico Superarse mantiene convenios con instituciones públicas y privadas que están dispuestas a recibir estudiantes para que realicen sus prácticas preprofesionales. Estas prácticas deben estar relacionadas con la carrera del estudiante y pueden llevarse a cabo tanto dentro como fuera del instituto.",
  },
  {
    nombre: "AUTOGESTIÓN",
    id: "list-Autogestion",
    texto:
      "El Instituto Superior Tecnológico Superarse también permite que los estudiantes realicen sus prácticas preprofesionales de forma independiente. Esta opción es para aquellos que, por cualquier razón, no deseen utilizar los convenios que ofrece la institución. Las prácticas autogestionadas deben ser formativas y permitir al estudiante aplicar e integrar los conocimientos y habilidades que ha adquirido durante su formación académica. ",
  },
  {
    nombre: "AYUDANTÍAS EN INVESTIGACIÓN",
    id: "list-Ayudantias",
    texto:
      " Los estudiantes del Instituto Superior Tecnológico Superarse pueden realizar sus prácticas preprofesionales a través de ayudantías de investigación o pasantías.Para ser seleccionado, se evalúa el desempeño académico del estudiante y las necesidades de investigación del instituto. Para postular, el estudiante debe enviar una solicitud formal al Coordinador de Prácticas Preprofesionales, quien se encargará de analizar y aprobar la petición."
  },
  {
    nombre: "HOMOLOGABLES LABORALES",
    id: "list-Homologaciones",
    texto:
      "Los estudiantes del Instituto Superior Tecnológico Superarse que tengan más de un año de experiencia laboral comprobable pueden solicitar que esas horas de trabajo sean reconocidas como prácticas preprofesionales.Para esto, el estudiante debe presentar una solicitud formal de homologación al Coordinador de Prácticas Preprofesionales. El coordinador analizará y verificará que.las actividades que el estudiante realiza en su trabajo son formativas y que se alinean con los conocimientos y competencias de su carrera.",
  },

];

document.addEventListener("DOMContentLoaded", () => {
  const listTab = document.getElementById("list-tab");
  const tabContent = document.getElementById("nav-tabContent");

  modalidadesData.forEach((modalidad, index) => {
    // Crear botón (lado izquierdo)
    const button = document.createElement("a");
    button.className = `list-group-item list-group-item-action ${index === 0 ? "active" : ""}`;
    button.id = `${modalidad.id}-list`;
    button.setAttribute("data-bs-toggle", "list");
    button.href = `#${modalidad.id}`;
    button.role = "tab";
    button.textContent = modalidad.nombre;

    listTab.appendChild(button);

    // Crear contenido (lado derecho)
    const content = document.createElement("div");
    content.className = `tab-pane fade ${index === 0 ? "show active" : ""}`;
    content.id = modalidad.id;
    content.role = "tabpanel";
    content.innerHTML = `
      <h5>${modalidad.nombre}</h5>
      <p class="texto-justificado">${modalidad.texto}</p>
    `;

    tabContent.appendChild(content);
  });
});
