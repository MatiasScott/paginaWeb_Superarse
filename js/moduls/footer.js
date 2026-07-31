var footerData = {
    // Enlace flotante de WhatsApp
    whatsapp: {
        enlace: "https://wa.me/593995901732?text=Hola%2C%20quisiera%20más%20información%20sobre%20sus%20carreras.",
        imagenSrc: "https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg",
        alt: "WhatsApp"
    },
     buzon: {
        id: "buzonBtn",
        tooltip: "Buzón de cumplidos, sugerencias y quejas",
        icon: "fas fa-comments"
    },
    // Contenido de la primera columna
    info: {
        logo: "/assets/img/content/logo/superarse_gris.png",
        descripcion: "#",
        redes: [
            { enlace: "https://twitter.com/superarse1", icono: "fab fa-twitter" },
            { enlace: "https://www.facebook.com/superarse1/", icono: "fab fa-facebook-f" },
            { enlace: "https://ec.linkedin.com/company/superarse1", icono: "fab fa-linkedin-in" },
            { enlace: "https://www.instagram.com/superarse1?igsh=MWJmNmNlNW5qZThtZA==", icono: "fab fa-instagram" }
        ]
    },
    // Contenido de la segunda columna (Contacto)
    contacto: {
        titulo: "Póngase en contacto",
        elementos: [
            { icono: "fa fa-map-marker-alt", titulo: "Dirección", "texto": "<a href=\"https://www.google.com/maps/search/?api=1&query=Av.+General+Rumiñahui+e+Isla+Pinta+1111,+Sangolqui\" target=\"_blank\" style=\"color: white;\">Av. General Rumiñahui e Isla Pinta 1111, Sangolqui</a>"},
            { icono: "fa fa-envelope", titulo: "Email", texto: "matriculas@superarse.edu.ec" },
       
        ]
    },
    // Contenido de la tercera columna (Enlaces rápidos)
    enlacesRapidos: {
        titulo: "Enlaces rápidos estudiantes",
        items: [
            { texto: "SUPERARSE CONECTADOS ", enlace: "https://superarse.ec/" },
            { texto: "BECAUSE HE IS NICE ", enlace: "https://becasuperarse.ec/" },
            { texto: "II CTM 2025", enlace: "https://2ctm2025.superarse.ec/" },
             { texto: "CONGRESO AGROVET", enlace: "https://agrovet.superarse.ec/" },
             { texto: "CURSOS EDUCACIÓN CONTINUA E INGLÉS", enlace: "https://eci.superarse.ec/" },
              { texto: "BECAS SUPERARSE", enlace: "https://becas.superarse.ec/" }
            
        ]
    },
    
    enlacesRapidos2:{
        titulo:"Enlaces rápidos administrativos",
        items:[
                { texto: "SGPRO", enlace: "https://sgpro.superarse.ec/" },
                { texto: "SIG", enlace: "https://sig.superarse.ec/" },
                { texto: "CONECTADOS ADMINISTRATIVOS", enlace: "https://superarse.ec/admin/login"},
                { texto: "ATLAS", enlace: "https://atlas.superarse.ec/"},
            ]
    },
 
    // Texto del pie de página
    copyright: {
        texto: "&copy; <a class='text-primary font-weight-bold' href='#'>Superarse.edu.ec</a>. All Rights Reserved. Designed by <a class='text-primary font-weight-bold' href='https://superarse.edu.ec/'>Instituto Superarse</a>"
    }
};