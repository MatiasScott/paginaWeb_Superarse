<?php

declare(strict_types=1);

namespace App\Models\SubMenu;

final class TalentoHumanoModel
{
    public function kicker(): string
    {
        return 'COORDINACIÓN';
    }

    public function title(): string
    {
        return 'De Talento Humano';
    }

    /**
     * @return array<int, array{id: string, etiqueta: string, aria: string}>
     */
    public function tabs(): array
    {
        return [
            ['id' => 'trabaja',        'etiqueta' => 'Trabaja con nosotros',                  'aria' => 'list-trabaja'],
            ['id' => 'concurso',       'etiqueta' => 'Concurso de Méritos y Oposición',       'aria' => 'list-concurso'],
            ['id' => 'convocatoria',   'etiqueta' => 'Convocatoria',                          'aria' => 'list-convocatoria'],
            ['id' => 'mejores',        'etiqueta' => 'Mejores Evaluados',                     'aria' => 'list-mejores'],
            ['id' => 'infraestructura', 'etiqueta' => 'Infraestructura',                       'aria' => 'list-infraestructura'],
            ['id' => 's.s.o',          'etiqueta' => 'S.S.O',                                'aria' => 'list-s.s.o'],
        ];
    }

    /**
     * @return array<int, array{imagen: string, title: string, descripcion: string, boton: string, modal: string, pdfSrc?: string}>
     */
    public function procesoSeleccion(): array
    {
        return [
            [
                'imagen'      => asset('assets/img/TalentoHumano/ProcesoSeleccion/05. PROCESO DE SELECCION-04.png'),
                'title'       => 'Vacantes Disponibles',
                'descripcion' => 'Revisa nuestras vacantes disponibles',
                'boton'       => 'VER VACANTES',
                'modal'       => '#vacantesModal',
            ],
            [
                'imagen'      => asset('assets/img/TalentoHumano/ProcesoSeleccion/05. PROCESO DE SELECCION-05.png'),
                'title'       => 'Inducción',
                'descripcion' => 'Nuestra inducción',
                'boton'       => 'VER PDF',
                'modal'       => '#pdfModal',
                'pdfSrc'      => asset('assets/docs/TalentoHumano/Induccion/Bienvenido a la familia Superarse.pdf'),
            ],
            [
                'imagen'      => asset('assets/img/TalentoHumano/ProcesoSeleccion/05. PROCESO DE SELECCION-06.png'),
                'title'       => 'Entorno Laboral',
                'descripcion' => 'Conoce nuestras instalaciones y ambiente de trabajo.',
                'boton'       => 'VER ENTORNO',
                'modal'       => '#entornoLaboralModal',
            ],
        ];
    }

    /**
     * @return array<int, array{src: string, alt: string, estilo: string}>
     */
    public function vacantesSlides(): array
    {
        return [
            [
                'src'    => 'https://marketplace.canva.com/EAD0UNr7HyI/1/0/1143w/canva-azul-escala-de-grises-foto-vacante-laboral-anuncio-78a9J2Z_ScQ.jpg',
                'alt'    => 'Vacantes para Docentes Imagen 1',
                'estilo' => 'min-height: 180px; max-height: 250px;',
            ],
            [
                'src'    => asset('assets/img/TalentoHumano/OfertasLaborales/RECLUTAMIENTO PROFESORES 1.jpg'),
                'alt'    => 'Vacantes para Personal Administrativo Imagen 1',
                'estilo' => 'min-height: 250px; max-height: 1000px;',
            ],
            [
                'src'    => asset('assets/img/TalentoHumano/OfertasLaborales/RECLUTAMIENTO PROFESORES 2.jpg'),
                'alt'    => 'Vacantes para Personal Administrativo Imagen 2',
                'estilo' => 'min-height: 250px; max-height: 1000px;',
            ],
            [
                'src'    => asset('assets/img/TalentoHumano/OfertasLaborales/RECLUTAMIENTO PROFESORES 3.jpg'),
                'alt'    => 'Vacantes para Personal Administrativo Imagen 3',
                'estilo' => 'min-height: 250px; max-height: 1000px;',
            ],
            [
                'src'    => asset('assets/img/TalentoHumano/OfertasLaborales/RECLUTAMIENTO PROFESORES 4.jpg'),
                'alt'    => 'Vacantes para Personal Administrativo Imagen 4',
                'estilo' => 'min-height: 250px; max-height: 1000px;',
            ],
        ];
    }

    /**
     * @return array<int, array{src: string, alt: string, titulo: string, caption: string}>
     */
    public function entornoLaboralSlides(): array
    {
        return [
            [
                'src'     => asset('assets/img/TalentoHumano/PausasActivas/DESAYUNO BIENVENIDA.jpeg'),
                'alt'     => 'Oficinas modernas',
                'titulo'  => 'Desayuno de Bienvenida',
                'caption' => 'Nuestros colaboradores disfrutan su primer día con un desayuno..',
            ],
            [
                'src'     => asset('assets/img/TalentoHumano/PausasActivas/DIA DEL MAESTRO FRANCISCO V.jpeg'),
                'alt'     => 'Campus Tecnológico',
                'titulo'  => 'Día del Maestro',
                'caption' => 'Celebración a nuestros maestros con alegria y entuciasmo.',
            ],
            [
                'src'     => asset('assets/img/TalentoHumano/PausasActivas/RECONOCIMIENTO DIA DEL MAESTRO I.jpeg'),
                'alt'     => 'Equipo colaborativo',
                'titulo'  => 'Cumpleaños',
                'caption' => 'Homenajeamos a nuestro personal.',
            ],
        ];
    }

    /**
     * @return array<int, array{encabezado: string, items: array<int, array{label: string, pdfSrc: string, canvasId: string}>}>
     */
    public function concursoGrupos(): array
    {
        return [
            [
                'encabezado' => 'Período Académico (mayo - octubre 2024)',
                'items' => [
                    [
                        'label'    => 'Convocatoria',
                        'pdfSrc'   => asset('assets/docs/TalentoHumano/Merito/2.1. CONVOCATORIA_CONCURSO_MERITOS_Y_OPOSICION.pdf'),
                        'canvasId' => 'pdf-viewer-concurso',
                    ],
                ],
            ],
            [
                'encabezado' => 'Acta de Resultados Fase de Méritos',
                'items' => [
                    [
                        'label'    => 'ACTA DEL OCS APROBACION DEL CONCURSO MÉRITOS Y OPOSICIÓN',
                        'pdfSrc'   => asset('assets/docs/TalentoHumano/Merito/ACTA_DEL_OCS_APROBACION_DEL_CONCURSO_MERITOS_Y_OPOSICION.pdf'),
                        'canvasId' => 'pdf-viewer-concurso',
                    ],
                ],
            ],
        ];
    }

    /**
     * @return array<int, array{encabezado: string, items: array<int, array{label: string, pdfSrc: string, canvasId: string}>}>
     */
    public function convocatoriaGrupos(): array
    {
        return [
            [
                'encabezado' => 'Convocatoria II-MAY-OCT 2025',
                'items' => [
                    [
                        'label'    => 'CONVOCATORIO I_PAO_MAY_OCT2025',
                        'pdfSrc'   => asset('assets/docs/TalentoHumano/convocatoria/CONVOCATORIO I_PAO_MAY_OCT2025.pdf'),
                        'canvasId' => 'pdf-viewer-igualdad',
                    ],
                    [
                        'label'    => 'CONVOCATORIA II_MAY_OCT_2025',
                        'pdfSrc'   => asset('assets/docs/TalentoHumano/convocatoria/CONVOCATORIA_MAY_OCT2025_II.pdf'),
                        'canvasId' => 'pdf-viewer-igualdad',
                    ],
                ],
            ],
            [
                'encabezado' => 'Resultados',
                'items' => [
                    [
                        'label'    => 'INFORME I_PAO_MAY_OCT2025',
                        'pdfSrc'   => asset('assets/docs/TalentoHumano/convocatoria/INFORME SELECCION FINAL I_PAO_MAYO_OCT_2025.pdf'),
                        'canvasId' => 'pdf-viewer-igualdad',
                    ],
                    [
                        'label'    => 'INFORME II_MAY_OCT_2025',
                        'pdfSrc'   => asset('assets/docs/TalentoHumano/convocatoria/INFORME SELECCION FINAL II_MAY_OCT_2025.pdf'),
                        'canvasId' => 'pdf-viewer-igualdad',
                    ],
                ],
            ],
        ];
    }

    /**
     * @return array<int, array{src: string, alt: string}>
     */
    public function mejoresEvaluados(): array
    {
        return [
            ['src' => asset('assets/img/TalentoHumano/CarrucelMejoresEvaluados/DSC_0063.png'), 'alt' => 'Presencia en la comunidad 1'],
            ['src' => asset('assets/img/TalentoHumano/CarrucelMejoresEvaluados/DSC00870.png'), 'alt' => 'Presencia en la comunidad 2'],
            ['src' => asset('assets/img/TalentoHumano/CarrucelMejoresEvaluados/DSC00877.png'), 'alt' => 'Presencia en la comunidad 3'],
            ['src' => asset('assets/img/TalentoHumano/CarrucelMejoresEvaluados/DSC00883.png'), 'alt' => 'Presencia en la comunidad 4'],
            ['src' => asset('assets/img/TalentoHumano/CarrucelMejoresEvaluados/DSC00893.png'), 'alt' => 'Presencia en la comunidad 5'],
        ];
    }

    /**
     * @return array<int, array{src: string, nombre: string}>
     */
    public function docentes(): array
    {
        return [
            ['src' => asset('assets/img/bienestarEstudiantil/mejoresEvaluados/PeridosNoviembre2024-Abril2025/MejorEvaluado1.jpg'), 'nombre' => 'CRISTIAN LEÓN'],
            ['src' => asset('assets/img/bienestarEstudiantil/mejoresEvaluados/PeridosNoviembre2024-Abril2025/MejorEvaluado2.jpg'), 'nombre' => 'IVÁN YÁNEZ'],
            ['src' => asset('assets/img/bienestarEstudiantil/mejoresEvaluados/PeridosNoviembre2024-Abril2025/MejorEvaluado3.jpg'), 'nombre' => 'KARINA FABARA'],
            ['src' => asset('assets/img/bienestarEstudiantil/mejoresEvaluados/PeridosNoviembre2024-Abril2025/MejorEvaluado5.jpg'), 'nombre' => 'DENNYS ENRIQUEZ'],
        ];
    }

    /**
     * @return array<int, array{titulo: string, descripcion: string, slides: array<int, array<int, string>>}>
     */
    public function infraestructura(): array
    {
        $base = asset('assets/img/');

        return [
            [
                'titulo'      => 'Campus Matriz',
                'descripcion' => 'El Campus Matriz del Instituto Superior Tecnológico Superarse es el centro académico y administrativo de la institución. Dispone de aulas modernas, biblioteca, salas de lectura y espacios administrativos, además de laboratorios especializados en estética canina y clínica veterinaria, que fortalecen la formación práctica y responden a altos estándares de calidad académica.',
                'slides' => [
                    ["{$base}Infreaestructura/Matriz/Matriz1.png", "{$base}Infreaestructura/Matriz/Matriz2.png", "{$base}Infreaestructura/Matriz/Matriz3.png", "{$base}Infreaestructura/Matriz/Matriz4.jpg"],
                    ["{$base}Infreaestructura/Matriz/Matriz5.jpg", "{$base}Infreaestructura/Matriz/Matriz6.jpg", "{$base}Infreaestructura/Matriz/Matriz7.jpg", "{$base}Infreaestructura/Matriz/Matriz9.jpg"],
                    ["{$base}Infreaestructura/Matriz/Matriz10.jpg", "{$base}Infreaestructura/Matriz/Matriz11.jpg", "{$base}Infreaestructura/Matriz/Matriz12.jpg", "{$base}Infreaestructura/Matriz/Matriz13.jpg"],
                    ["{$base}Infreaestructura/Matriz/Matriz14.jpg", "{$base}Infreaestructura/Matriz/Matriz15.jpg"],
                ],
            ],
            [
                'titulo'      => 'Campus Hacienda Agusbella',
                'descripcion' => 'La Hacienda Agusbella es un laboratorio vivo de aprendizaje que integra docencia, investigación y vinculación en un entorno productivo real. Sus instalaciones incluyen caballerizas, laboratorios de alimentos y microbiología, así como galpones para cuyes y aves, donde los estudiantes fortalecen competencias en manejo animal, reproducción, nutrición y sanidad. Este espacio fomenta la innovación aplicada, la sostenibilidad y el desarrollo rural.',
                'slides' => [
                    ["{$base}Infreaestructura/Hacienda/Hacienda1.jpg", "{$base}Infreaestructura/Hacienda/Hacienda2.jpg", "{$base}Infreaestructura/Hacienda/Hacienda3.jpg", "{$base}Infreaestructura/Hacienda/Hacienda4.jpg"],
                    ["{$base}Infreaestructura/Hacienda/Hacienda5.jpg", "{$base}Infreaestructura/Hacienda/Hacienda6.jpg", "{$base}Infreaestructura/Hacienda/Hacienda7.jpg", "{$base}Infreaestructura/Hacienda/Hacienda8.png"],
                    ["{$base}Infreaestructura/Hacienda/Hacienda9.png", "{$base}Infreaestructura/Hacienda/Hacienda10.png"],
                ],
            ],
            [
                'titulo'      => 'Eko campus',
                'descripcion' => 'El Eko Campus La Armenia es un espacio académico y recreativo sostenible que combina canchas deportivas, actualmente en funcionamiento, con un futuro complejo de aulas y laboratorios. Su diseño promueve metodologías activas, la convivencia y la innovación educativa, formando profesionales que valoran el equilibrio entre conocimiento, recreación y sostenibilidad.',
                'slides' => [
                    ["{$base}Infreaestructura/Ekocampus/Eko1.jpg", "{$base}Infreaestructura/Ekocampus/Eko2.jpg", "{$base}Infreaestructura/Ekocampus/Eko3.jpg", "{$base}Infreaestructura/Ekocampus/Eko4.jpg"],
                    ["{$base}Infreaestructura/Ekocampus/Eko5.jpg", "{$base}Infreaestructura/Ekocampus/Eko6.jpg", "{$base}Infreaestructura/Ekocampus/Eko7.jpg"],
                ],
            ],
            [
                'titulo'      => 'Nuestros espacios son Inclusivos',
                'descripcion' => 'En el Tecnológico Superarse encontrarás espacios inclusivos diseñados para que todos puedan aprender, compartir y crecer sin límites.',
                'slides' => [
                    ["{$base}Infreaestructura/Adecuaciones/001.png", "{$base}Infreaestructura/Adecuaciones/002.png", "{$base}Infreaestructura/Adecuaciones/003.png", "{$base}Infreaestructura/Adecuaciones/004.png"],
                    ["{$base}Infreaestructura/Adecuaciones/005.png", "{$base}Infreaestructura/Adecuaciones/006.png", "{$base}Infreaestructura/Adecuaciones/007.png", "{$base}Infreaestructura/Adecuaciones/008.png"],
                    ["{$base}Infreaestructura/Adecuaciones/009.png", "{$base}Infreaestructura/Adecuaciones/010.png", "{$base}Infreaestructura/Adecuaciones/011.png", "{$base}Infreaestructura/Adecuaciones/012.png"],
                ],
            ],
        ];
    }

    /**
     * @return array<int, array{label: string, enlace: string}>
     */
    public function ssoBotones(): array
    {
        return [
            ['label' => 'Reglamentos',        'enlace' => '/REGLAMENTO'],
            ['label' => 'Matriz de Riesgos',  'enlace' => '/MATRIZ_DE_RIESGO'],
            ['label' => 'Plan de Emergencias', 'enlace' => '/PLAN_DE_EMERGENCIA'],
        ];
    }

    /**
     * @return array<int, array<int, string>> slides de imágenes de pausas activas.
     */
    public function ssoPausasActivas(): array
    {
        $base = asset('assets/img/S.S.O/PausaActiva/');

        return [
            ["{$base}pausa1.jpeg", "{$base}pausa2.jpeg", "{$base}pausa3.jpeg"],
            ["{$base}pausa4.jpeg", "{$base}pausa5.jpeg", "{$base}pausa6.jpeg"],
            ["{$base}pausa7.jpeg", "{$base}pausa8.jpeg", "{$base}pausa9.jpeg"],
        ];
    }

    /**
     * @return array<int, array<int, string>> slides de imágenes de simulacros.
     */
    public function ssoSimulacros(): array
    {
        $base = asset('assets/img/S.S.O/Simulacro/');

        return [
            ["{$base}Simulacro1.png", "{$base}Simulacro2.png", "{$base}Simulacro3.png"],
            ["{$base}Simulacro4.png", "{$base}Simulacro5.png"],
        ];
    }
}