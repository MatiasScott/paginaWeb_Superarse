// autoridades.js
const dataAutoridades = [
    { id: 'node-rector', name: "Msc. Verónica Tamayo", pos: "Rectora", img: "/assets/img/institucion/autoridades/VERONICA TAMAYO.png", email: "veronica.tamayo@superarse.edu.ec" },
    { id: 'node-secretaria', name: "Téc. Vanessa Salazar", pos: "Secretaría General", img: "/assets/img/institucion/autoridades/VANESSA SALAZAR.png", email: "melany.salazar@superarse.edu.ec" },
    { id: 'node-vicerrector', name: "MBA. Elena Quezada", pos: "Vicerrectora Académica", img: "", email: "elena.quezada@superarse.edu.ec" },
    { id: 'node-dir-docencia', name: "Lic. Carolina Baquero", pos: "Dirección de Docencia", img: "", email: "carolina.baquero@superarse.edu.ec" },
    { id: 'node-dir-invest', name: "Ing. Josue Tello", pos: "Dir. Investigación Desarrollo e Innovación", img: "", email: "josue.tello@superarse.edu.ec" },
    { id: 'node-dir-vinc', name: "Ing. Edison Aucay", pos: "Dir. Vinculación con la Sociedad", img: "", email: "edison.aucay@superarse.edu.ec" },
    { id: 'node-admin', name: "Msc. Ramiro Obando", pos: "Dir. Administrativo Fin.", img: "/assets/img/institucion/autoridades/RAMIRO OBANDOv2.png", email: "ramiro.obando@superarse.edu.ec" },
    { id: 'node-infra', name: "Lic. Iván Tamayo", pos: "Dir. Infraestructura", img: "/assets/img/institucion/autoridades/IVAN TAMAYO.png", email: "ivan.tamayo@superarse.edu.ec" },
    { id: 'node-comer', name: "Mgtr. Israel Proaño", pos: "Dirección Comercial", img: "", email: "israel.proano@nexodigitalmark.com" },
    { id: 'coor-admin', name: "Ing. Katheryn Guaman ", pos: "Coor. Escuela de Administración", img: "", email: "katheryn.guaman@superarse.edu.ec" },
    { id: 'coor-vet', name: "Mvz. Francisco Velastegui", pos: "Coor. Escuela de Veterinaria", img: "", email: "francisco.velastegui@superarse.edu.ec" },
    { id: 'coor-const', name: "Arq. Daniela Tamayo", pos: "Coor. Escuela Const. Sostenible", img: "", email: "daniela.tamayo@superarse.edu.ec" },
    { id: 'coor-salud', name: "Mvz. Francisco Velastegui", pos: "Coor. Escuela de Salud", img: "", email: "francisco.velastegui@superarse.edu.ec" },
    { id: 'coor-edu', name: "Ing. Katheryn Guaman ", pos: "Coor. Escuela de Educación", img: "", email: "katheryn.guaman@superarse.edu.ec" },
    { id: 'coor-diseno', name: "Mgtr. Jenny Siza", pos: "Coor. Diseño Curricular", img: "", email: "jenny.siza@superarse.edu.ec" },
    { id: 'coor-prac', name: "Lic. Ana Flores", pos: "Coor. Prácticas Pre-profesionales", img: "", email: "ana.flores@superarse.edu.ec" },
    { id: 'coor-prog', name: "Por Asignar", pos: "Programas y Proyectos", img: "", email: "proyectos@superarse.edu.ec" },
    { id: 'coor-rel', name: "Arq. Jean Landazuri", pos: "Coor. Relaciones Interinst.", img: "", email: "infraestructura@superarse.edu.ec" },
    { id: 'coor-calidad', name: "Ing. Edison Aucay", pos: "Coor. Aseguramiento Calidad", img: "", email: "calidad@superarse.edu.ec" },
    { id: 'coor-th', name: "Lic. Jessica Flores", pos: "Coor. Talento Humano", img: "", email: "dayana.flores@superarse.edu.ec" },
    { id: 'coor-bien', name: "Lic. Nicolas Ponce", pos: "Coor. Bienestar", img: "", email: "asistencia.bienestar@superarse.edu.ec" },
    { id: 'coor-biblio', name: "Tnlga. Nathaly Ortiz", pos: "Coor. Biblioteca", img: "", email: "nathaly.Ortiz@superarse.edu.ec" },
    { id: 'coor-tics', name: "Tnlgo. Matias Valdivieso", pos: "Coor. TICS", img: "", email: "matias.valdivieso@superarse.edu.ec" },
    { id: 'coor-com-est', name: "Mgtr. Luis Granja", pos: "Coor. Comunicación Estratégica", img: "", email: "luis.granja@superarse.edu.ec" },
    { id: 'coor-fin', name: "Por Asignar", pos: "Coor. Finanzas y Contabilidad", img: "", email: "mariela.anchundia@superarse.edu.ec" },
    { id: 'coor-edu-cont', name: "Lic. Ana Flores", pos: "Coor. Educación Continua", img: "", email: "ana.flores@superarse.edu.ec" },
    { id: 'coor-seg', name: "Por Asignar", pos: "Seguridad y Salud", img: "", email: "seguridad@superarse.edu.ec" },
    { id: 'coor-mant', name: "Por Asignar", pos: "Mantenimiento", img: "", email: "mant@superarse.edu.ec" }
];

function inicializarOrganigrama() {
    dataAutoridades.forEach(p => {
        const container = document.getElementById(p.id);
        if (container) {
            container.innerHTML = `
                <div class="auth-card">
                    <div class="auth-img-container">
                        <img src="${p.img || '/assets/img/placeholder.png'}" 
                             loading="lazy" 
                             onerror="this.src='https://via.placeholder.com/150'">
                    </div>
                    <p class="auth-name">${p.name || 'Por asignar'}</p>
                    <span class="auth-pos">${p.pos}</span>
                    <a href="mailto:${p.email || '#'}" class="auth-email">${p.email || ''}</a>
                </div>
            `;
        }
    });
}

// Ejecutar cuando el HTML esté listo
document.addEventListener("DOMContentLoaded", inicializarOrganigrama);