// autoridades.js
const dataAutoridades = [
    { id: 'node-rector', name: "Msc. Verónica Tamayo", pos: "Rectora", img: "/assets/img/institucion/autoridades/VERONICA-TAMAYO.png", email: "veronica.tamayo@superarse.edu.ec" },
    { id: 'node-secretaria', name: "Tnlga. Vanessa Salazar", pos: "Secretaría General", img: "/assets/img/institucion/autoridades/VANNESA-SALAZAR.png", email: "melany.salazar@superarse.edu.ec" },
    { id: 'node-vicerrector', name: "MBA. Elena Quezada", pos: "Vicerrectora Académica", img: "/assets/img/institucion/autoridades/ELENA-QUEZADA.png", email: "elena.quezada@superarse.edu.ec" },
    { id: 'node-dir-docencia', name: "Lic. Carolina Baquero", pos: "Dirección de Docencia", img: "/assets/img/institucion/autoridades/CAROLINA-BAQUERO.png", email: "carolina.baquero@superarse.edu.ec" },
    { id: 'node-dir-invest', name: "Ing. Josue Tello", pos: "Dir. Investigación Desarrollo e Innovación", img: "/assets/img/institucion/autoridades/JOSUE-TELLO.png", email: "josue.tello@superarse.edu.ec" },
    { id: 'node-dir-vinc', name: "Ing. Edison Aucay", pos: "Dir. Vinculación con la Sociedad", img: "/assets/img/institucion/autoridades/EDISON-AUCAY.png", email: "aseguramiento.calidad@superarse.edu.ec" },
    { id: 'node-admin', name: "Msc. Ramiro Obando", pos: "Dir. Administrativo Fin.", img: "/assets/img/institucion/autoridades/RAMIRO-OBANDO.png", email: "ramiro.obando@superarse.edu.ec" },
    { id: 'node-infra', name: "Lic. Iván Tamayo", pos: "Dir. Infraestructura", img: "/assets/img/institucion/autoridades/Ivan_Tamayo.png", email: "ivan.tamayo@superarse.edu.ec" },
    { id: 'node-comer', name: "Mgtr. Israel Proaño", pos: "Dirección Comercial", img: "/assets/img/institucion/autoridades/ISRAEL-PROANO.png", email: "israel.proano@nexodigitalmark.com" },
    { id: 'coor-comer', name: "Mgtr. Israel Proaño", pos: "Coor. Comunicación Estratégica", img: "/assets/img/institucion/autoridades/ISRAEL-PROANO.png", email: "israel.proano@nexodigitalmark.com" },
    { id: 'coor-admin', name: "Ing. Katheryn Guaman ", pos: "Coor. Escuela de Ciencias Sociales, Empresariales y Tecnológicas ECSET", img: "/assets/img/institucion/autoridades/KATHERINE- GUAMAN.png", email: "katheryn.guaman@superarse.edu.ec" },
    { id: 'coor-vet', name: "Mvz. Francisco Velastegui", pos: "Coor. Escuela de Ciencias Agropecuarias y Veterinarias ECAVET", img: "/assets/img/institucion/autoridades/FRANCISCO-VELASTEGUI.png", email: "francisco.velastegui@superarse.edu.ec" },
    { id: 'coor-const', name: "Arq. Daniela Tamayo", pos: "Coor. Escuela Construcción y Extracción Sostenible ECSOS", img: "/assets/img/institucion/autoridades/DANIELA-TAMAYO.png", email: "daniela.tamayo@superarse.edu.ec" },
    { id: 'coor-diseno', name: "Mgtr. Jenny Siza", pos: "Coor. Diseño Curricular", img: "/assets/img/institucion/autoridades/JENNY-SIZA.png", email: "jenny.siza@superarse.edu.ec" },
    { id: 'coor-prac', name: "Lic. Ana Flores", pos: "Coor. Prácticas Pre-profesionales", img: "", email: "ana.flores@superarse.edu.ec" },
    { id: 'coor-prog', name: "Por Asignar", pos: "Programas y Proyectos", img: "", email: "proyectos@superarse.edu.ec" },
    { id: 'coor-rel', name: "Arq. Jean Landazuri", pos: "Coor. Relaciones Interinst.", img: "/assets/img/institucion/autoridades/JEAN-PAUL.png", email: "infraestructura@superarse.edu.ec" },
    { id: 'coor-calidad', name: "Ing. Edison Aucay", pos: "Coor. Aseguramiento Calidad", img: "/assets/img/institucion/autoridades/EDISON-AUCAY.png", email: "aseguramiento.calidad@superarse.edu.ec" },
    { id: 'coor-th', name: "Lic. Jessica Flores", pos: "Coor. Talento Humano", img: "/assets/img/institucion/autoridades/JESSICA-FLORES.png", email: "dayana.flores@superarse.edu.ec" },
    { id: 'coor-bien', name: "Lic. Nicolas Ponce", pos: "Coor. Bienestar", img: "/assets/img/institucion/autoridades/NICOLAS-PONCE.png", email: "asistencia.bienestar@superarse.edu.ec" },
    { id: 'coor-biblio', name: "Tnlga. Nathaly Ortiz", pos: "Coor. Biblioteca", img: "/assets/img/institucion/autoridades/NATALY-ORTIZ.png", email: "nathaly.Ortiz@superarse.edu.ec" },
    { id: 'coor-tics', name: "Tnlgo. Matias Valdivieso", pos: "Coor. TICS", img: "/assets/img/institucion/autoridades/MATIAS-VALDIVIEZO.png", email: "matias.valdivieso@superarse.edu.ec" },
    { id: 'coor-com-est', name: "Mgtr. Luis Granja", pos: "Coor. Admisiones", img: "/assets/img/institucion/autoridades/LUIS-GRANJA.png", email: "luis.granja@superarse.edu.ec" },
    { id: 'coor-fin', name: "Tnlga.Mariela Anchundia ", pos: "Finanzas y Contabilidad", img: "/assets/img/institucion/autoridades/Mariela-Anchundia.png", email: "mariela.anchundia@superarse.edu.ec" },
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
                        <img class="auth-img"
                             src="${p.img || '/assets/img/user-default.png'}" 
                             loading="lazy">
                    </div>
                    <p class="auth-name">${p.name || 'Por asignar'}</p>
                    <span class="auth-pos">${p.pos}</span>
                    <a href="mailto:${p.email || '#'}" class="auth-email">${p.email || ''}</a>
                </div>
            `;

            const img = container.querySelector('.auth-img');

            img.onerror = () => {
                img.onerror = null; // 🔥 CLAVE
                img.src = '/assets/img/user-default.png';
            };
        }
    });
}
// Ejecutar cuando el HTML esté listo
document.addEventListener("DOMContentLoaded", inicializarOrganigrama);