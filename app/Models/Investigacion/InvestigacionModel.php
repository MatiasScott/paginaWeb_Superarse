<?php

declare(strict_types=1);

namespace App\Models\Investigacion;

final class InvestigacionModel
{
    public function kicker(): string
    {
        return 'CONOCIMIENTO E INNOVACIÓN';
    }

    public function title(): string
    {
        return 'Investigación Desarrollo e Innovación (I+D+i)';
    }

    /**
     * @return array<int, array{section?: true, id?: string, title: string, content?: string}>
     */
    public function items(): array
    {
        // Prefijo de la aplicación ('' o '/PaginaWebMVC'), resuelto desde el .env
        $b = base();

        return [
            [
                'id' => 'quienesSomosIDi',
                'title' => 'Quiénes Somos',
                'content' => <<<HTML
                    <div class="row align-items-start g-4">
                      <div class="col-12 col-lg-7">
                        <h4 class="fw-bold mb-4" style="color: #003366;">La Dirección de Investigación, Desarrollo e Innovación (I+D+i)</h4>
                        <p class="text-justify">
                          La Dirección de Investigación, Desarrollo e Innovación del Tecnológico Superarse está conformada por un equipo multidisciplinario de docentes e investigadores comprometidos con la generación de conocimiento relevante y la búsqueda de soluciones innovadoras para los desafíos actuales.
                        </p>
                        <p class="text-justify">
                          Nuestra misión es fomentar la investigación aplicada, el desarrollo tecnológico y la innovación, promoviendo la participación activa de estudiantes y fortaleciendo las capacidades investigativas de la institución.
                        </p>
                      </div>

                      <div class="col-lg-5 d-flex justify-content-center">
                        <div class="card-container bienestar-equipo-card d-flex flex-column align-items-center p-4">
                          <div class="bienestar-equipo-imagen mb-6 text-center">
                            <img src="{$b}/assets/img/Investigacion/07 - CONTACTO RELACIONES INSTITUCIONALES-02.png"
                                 alt="Director de Investigación Desarrollo e Innovación"
                                 class="img-fluid img-reflect-center" />
                          </div>

                          <div class="bienestar-contacto-panel w-100 text-center mb-3" style="max-width: 500px;">
                            <h5 class="fw-bold mb-3 text-primary text-uppercase">Contacto</h5>
                            <div class="contact-info-list text-start d-inline-block">
                              <p class="mb-2">
                                <i class="fas fa-envelope text-primary me-2"></i>
                                josue.tello@superarse.edu.ec
                              </p>
                              <p class="mb-2">
                                <i class="fas fa-clock text-primary me-2"></i>
                                Lunes a viernes de 08:00 a 17:00
                              </p>
                            </div>
                          </div>

                          <p class="text-center fw-bold text-muted">Director de Investigación Desarrollo e Innovación</p>

                          <a href="https://wa.me/593998836452?text=Hola,%20me%20gustaría%20más%20información%20sobre%20Investigación"
                             class="btn btn-success mb-2"
                             target="_blank">
                            <i class="fab fa-whatsapp me-2"></i>Chatear por WhatsApp
                          </a>
                        </div>
                      </div>
                    </div>
                HTML,
            ],
            [
                'id' => 'modeloInvestigacionVinculacion',
                'title' => 'Modelo de Investigación y Vinculación',
                'content' => <<<HTML
                    <h4>Modelo de Investigación y Vinculación</h4>
                    <p>
                      Este modelo describe la estrategia que integra la investigación con la vinculación con la sociedad. Explica cómo la investigación del Tecnológico Superarse se orienta a resolver problemas reales de la comunidad y cómo los resultados se transfieren para generar impacto social y productivo.
                    </p>
                    <p>
                      Nuestro enfoque se basa en la co-creación de soluciones, la interdisciplinariedad y la sostenibilidad de los proyectos, asegurando que el conocimiento generado sea pertinente y aplicable.
                    </p>
                    <a
                      href="{$b}/MODELO_INVESTIGACION"
                      target="_blank"
                      class="btn btn-sm btn-info mt-3"
                    >
                      <i class="fa fa-file-pdf mr-2"></i> Ver Modelo
                    </a>
                HTML,
            ],
            [
                'id' => 'normativaInvestigacion',
                'title' => 'Reglamento',
                'content' => <<<HTML
                    <h4>Reglamento de Investigación</h4>
                    <p>
                      Accede a los reglamentos, políticas y procedimientos que rigen las actividades de investigación, desarrollo e innovación en el Tecnológico Superarse. Estos documentos aseguran la calidad, la ética y la transparencia en todos nuestros procesos investigativos.
                    </p>
                    <p>
                      Es fundamental que toda la comunidad investigadora conozca y aplique esta normativa.
                    </p>
                    <a
                      href="{$b}/REGLAMENTO_DE_INVESTIGACION"
                      target="_blank"
                      class="btn btn-sm btn-info mt-3"
                    >
                      <i class="fa fa-file-pdf mr-2"></i> Ver Normativa Vigente
                    </a>
                HTML,
            ],
            [
                'id' => 'dominiosLineasInvestigacion',
                'title' => 'Dominios Académicos y Líneas de Investigación Institucionales',
                'content' => <<<HTML
                    <h4>Dominios Académicos y Líneas de Investigación Institucionales</h4>
                    <p>
                      Conoce los dominios académicos estratégicos del Tecnológico Superarse y las líneas de investigación prioritarias que orientan la producción científica de la institución. Estas líneas reflejan nuestra experticia y las áreas de mayor impacto potencial.
                    </p>
                    <p>
                      Nuestras líneas de investigación son el marco sobre el cual construimos conocimiento relevante y aplicable, alineado con las necesidades del desarrollo nacional y regional.
                    </p>
                    <a
                      href="{$b}/DOMINIOS_ACADEMICOS"
                      target="_blank"
                      class="btn btn-sm btn-info mt-3"
                    >
                      <i class="fa fa-file-pdf mr-2"></i> Ver Dominios y Líneas
                    </a>
                HTML,
            ],
            ['section' => true, 'title' => 'Eventos'],
             [
                'id' => 'SeminarioMineris2026',
                'title' => 'Seminario de Minería 2026',
                'content' => <<<HTML
                    <div>
                      <img src="{$b}/assets/img/Investigacion/Seminario-ECSOS.png" alt="Mineria" class="evento-portada">
                    </div>
                    <h4>Seminario de Minería 2026</h4>
                    <p>
                      El Seminario de Minería 2026 fue un espacio académico organizado por el Instituto Superior Tecnológico Superarse, a través de la Escuela de Ciencias de la Tierra, Minería y afines (ECSOS), orientado al fortalecimiento de conocimientos y al intercambio de experiencias relacionadas con la actividad minera y sus principales desafíos en el contexto actual.
                    </p>
                    <p>
                      El evento propició el encuentro entre estudiantes, docentes, profesionales y representantes del sector, generando un espacio para abordar aspectos técnicos, tecnológicos, ambientales y de seguridad vinculados con la formación y el ejercicio profesional en el ámbito minero.
                    </p>
                    <ul>
                      <li>	Exploración y explotación de recursos minerales.</li>
                      <li>	Procesos y métodos de explotación minera.</li>
                      <li>	Seguridad y salud ocupacional en minería.</li>
                      <li>	Tecnología e innovación aplicada al sector minero.</li>
                      <li>	Minería responsable y sostenibilidad ambiental.</li>
                      <li>	Experiencias y perspectivas profesionales del sector minero.</li>
                      <li>	Vinculación entre la formación académica y la industria minera.<li>
                    </ul>
                    <p><strong>Fecha:</strong>25 septiembre 2026</p>
                    <p><strong>Lugar:</strong>Instituto Superior Tecnológico Superarse.</p>
                    <p><strong>Organiza:</strong>Escuela ECSOS – Instituto Superior Tecnológico Superarse.</p>
                 
                HTML,
            ],
              [
                'id' => 'DigitalFuture2026',
                'title' => 'Primer Congreso Internacional de Transformación Digital e Innovación Tecnológica',
                'content' => <<<HTML
                    <div>
                      <img src="{$b}/assets/img/Investigacion/Digital_future.png" alt="Digital" class="evento-portada">
                    </div>
                    <h4>Primer Congreso Internacional de Transformación Digital e Innovación Tecnológica</h4>
                    <p>
                      Digital Future 2026 es un evento académico-científico orientado a la difusión de investigaciones, innovaciones tecnológicas, experiencias y soluciones digitales que contribuyen a la transformación de la sociedad, la educación y los sectores productivos.
                    </p>
                    <p>
                      El congreso promueve el intercambio de conocimiento entre la academia, el sector tecnológico, las organizaciones y la sociedad, fortaleciendo el diálogo interdisciplinario y la generación de propuestas innovadoras frente a los desafíos de la transformación digital.
                    </p>
                    <ul>
                      <li>	Inteligencia artificial, ciencia de datos y tecnologías emergentes.</li>
                      <li>	Transformación digital e innovación tecnológica.</li>
                      <li>	Educación, tecnología y nuevas metodologías de aprendizaje.</li>
                      <li>	Desarrollo de software, sistemas y soluciones digitales.</li>
                      <li>	Emprendimiento, industria 4.0 y transformación de los sectores productivos.</li>
                      <li>	Ciberseguridad, conectividad y tecnologías para la sociedad.</li>
                      <li>	Experiencias y proyectos de innovación con impacto académico, empresarial y social.<li>
                    </ul>
                    <p><strong>Fecha:</strong>23 y 24 de julio del 2026</p>
                    <p><strong>Lugar:</strong>Instituto Superior Tecnológico Superarse (Campus Alpallana, Quito).</p>
                 
                HTML,
            ],
            [
                'id' => 'DiaMedicoVeterinario',
                'title' => 'Conversatorio - Día del Médico Veterinario 2026',
                'content' => <<<HTML
                    <div>
                      <img src="{$b}/assets/img/Investigacion/Dia_del_enfermero.jpg" alt="Día del Médico Veterinario 2026" class="evento-portada">
                    </div>
                    <h4>Conversatorio - Día del Médico Veterinario 2026</h4>
                    <p>
                      El Día del Médico Veterinario 2026 fue un evento académico y conmemorativo organizado por el Instituto Superior Tecnológico Superarse, a través de la Escuela de Ciencias Agropecuarias, Veterinarias y de Tecnologías (ECAVET), orientado a reconocer la importancia de la profesión veterinaria y su contribución al bienestar animal, la salud pública y el desarrollo sostenible del sector agropecuario.
                    </p>
                    <p>
                      El evento promovió un espacio de encuentro entre estudiantes, docentes, profesionales y actores del sector veterinario, fortaleciendo el intercambio de conocimientos, experiencias y perspectivas sobre los desafíos actuales de la medicina veterinaria y el rol del profesional en la sociedad.
                    </p>
                    <ul>
                      <li>	Medicina veterinaria, salud y bienestar animal.</li>
                      <li>	Innovación y nuevas tecnologías aplicadas al sector veterinario.</li>
                      <li>	Producción pecuaria sostenible y manejo responsable de los animales.</li>
                      <li>	Salud pública, prevención y enfoque integral de la profesión veterinaria.</li>
                      <li>	Experiencias profesionales y vinculación entre academia y sector productivo.</li>
                      <li>	Reconocimiento a la labor y aporte de los profesionales veterinarios.</li>
                    </ul>
                    <p><strong>Fecha:</strong>9 de julio de 2026</p>
                    <p><strong>Lugar:</strong>Instituto Superior Tecnológico Superarse, Quito.</p>
                    <p><strong>Organiza:</strong>Escuela de Ciencias Agropecuarias, Veterinarias y de Tecnologías (ECAVET).</p>
                HTML,
            ],
            [
                'id' => 'congresoTopografia2025',
                'title' => 'II Congreso de Topografía 2025',
                'content' => <<<HTML
                    <div>
                      <img src="{$b}/assets/img/Investigacion/CongresoII.jpeg" alt="Congreso II" class="evento-portada">
                    </div>
                    <h4>II Congreso de Topografía 2025</h4>
                    <p>
                      El 2do Congreso de Topografía, Minería y Expo Feria 2025 es un evento académico, científico y tecnológico organizado
                      por el Tecnológico Superarse en cooperación con el Gremio de los Profesionales de la Topografía. Se establece un
                      espacio de divulgación, innovación y encuentro estratégico, con la participación de estudiantes, docentes, investigadores,
                      profesionales, representantes de la industria y actores del sector público vinculados a la topografía y la minería.
                      Durante el congreso, los asistentes tuvieron la oportunidad de participar en conferencias magistrales, ponencias
                      técnicas, talleres especializados y presentaciones de investigaciones aplicadas. La Expo Feria se muestra como una
                      vitrina dinámica para que empresas, instituciones y emprendedores difundan sus productos, servicios, tecnologías y
                      soluciones innovadoras.
                    </p>
                    <p>
                      La topografía se posiciona como una disciplina clave en la planificación territorial y el desarrollo urbano lo que
                      fortalece la sostenibilidad de proyectos mineros y de infraestructura. La minería representa un sector estratégico para
                      el país que relaciona la innovación tecnológica, la seguridad laboral y la gestión de los recursos para el desarrollo
                      sostenible de la industria. El congreso se estructuró en seis ejes temáticos que guiarán las discusiones y aportes de los participantes:
                    </p>
                    <ul>
                      <li>Innovación tecnológica en topografía y minería para el desarrollo sostenible.</li>
                      <li>Seguridad y prevención de riesgos laborales en operaciones topográficas y mineras.</li>
                      <li>Gestión integral de relaves en minería a gran escala: innovación, sostenibilidad y seguridad para el futuro del sector.</li>
                      <li>Catastro minero y minería en pequeña escala: herramientas para la formalización y el ordenamiento territorial.</li>
                      <li>Ética, responsabilidad y optimización de recursos en la topografía y minería. Situación catastral urbana y el rol estratégico del topógrafo en la planificación territorial y gestión municipal.</li>
                      <li>Fortalecimiento del ejercicio profesional desde la formación académica hasta la práctica institucional.</li>
                    </ul>
                    <p>
                      La realización de este congreso fomenta la generación de redes de investigación y la colaboración interdisciplinaria,
                      impulsando propuestas innovadoras frente a los desafíos ambientales, sociales, económicos y laborales del sector.<br>
                      El evento tuvo lugar los días jueves 18 y viernes 19 de septiembre de 2025, en el Centro de Exposiciones Quito, Sala
                      Los Caras, con la participación de destacados ponentes nacionales y la asistencia de un público diverso, interesado en
                      aportar al desarrollo responsable de la topografía y la minería.
                    </p>
                HTML,
            ],
            [
                'id' => 'congresoTopografia2023',
                'title' => 'I Congreso de Topografía 2023',
                'content' => <<<HTML
                    <div>
                      <img src="{$b}/assets/img/Investigacion/congreso.png" alt="Descripción de la imagen 1" class="evento-portada">
                    </div>
                    <h4>I Congreso de Topografía 2023</h4>
                    <p>
                      El CONGRESO INTERNACIONAL DE TOPOGRAFÍA Y GEODESIA es un evento de referencia en el sector, diseñado como un espacio de
                      encuentro y divulgación para organizaciones dedicadas a la construcción, planificación urbana, gestión de recursos naturales
                      y cartografía. Asimismo, reúne a investigadores independientes, topógrafos, ingenieros, arquitectos, geólogos y otros
                      profesionales vinculados con la medición y representación de la superficie terrestre. Durante el congreso, los participantes
                      tienen la oportunidad de presentar sus proyectos, compartir avances científicos y establecer alianzas estratégicas con
                      empresas del sector.
                    </p>
                    <p>
                      La topografía es una disciplina esencial para el estudio detallado de la superficie terrestre. Abarca desde los
                      procedimientos y operaciones de campo hasta los métodos de cálculo y procesamiento de datos, permitiendo la representación
                      precisa del terreno en planos o mapas a escala.
                    </p>
                    <p>
                      Por su parte, la geodesia se enfoca en el análisis de la forma y dimensiones de la Tierra, incluyendo la determinación
                      de su campo gravitatorio y la exploración del fondo oceánico. También estudia la orientación y posición del planeta en el
                      espacio, aportando información clave para diversas áreas científicas y tecnológicas.
                    </p>
                    <p>
                      Memorias del Primer Congreso Internacional de Topografía y Geodesia 2023 han sido publicadas en la revista científica "Conectividad", en el Vol.4 N°2, del ISTER.
                    </p>
                    <a
                      href="https://revista.ister.edu.ec/ojs/index.php/ISTER/article/view/104"
                      target="_blank"
                      class="btn btn-sm btn-info mt-3"
                    >
                      <i class="fa fa-file-pdf mr-2"></i> Leer Artículo
                    </a>
                HTML,
            ],
            [
                'id' => 'seminarioEquino',
                'title' => 'Seminario Equino',
                'content' => <<<HTML
                    <div>
                      <img src="{$b}/assets/img/Investigacion/equino.png" alt="Descripción de la imagen 1" class="evento-portada">
                    </div>
                    <h4>Seminario Equino</h4>
                    <p>
                      El Seminario Equino - Práctico Manejo y Clínica Equina, realizado del 26 al 28 de julio en la Hacienda Agusbella,
                      marcó un hito al convertirse en el primer evento de su tipo en la región del Valle. Durante tres días, el seminario
                      reunió a apasionados del mundo ecuestre: propietarios, cuidadores, veterinarios y estudiantes, todos con un objetivo
                      común: perfeccionar sus conocimientos y habilidades en el cuidado y manejo de los equinos.
                    </p>
                    <p>
                      Los asistentes tuvieron la oportunidad de sumergirse en un programa integral diseñado por expertos del sector.
                      A través de sesiones teóricas y prácticas, exploraron temas fundamentales como técnicas de alimentación, manejo equino,
                      diagnóstico y tratamiento de enfermedades comunes. La combinación de aprendizaje estructurado y práctica en campo permitió
                      a los participantes aplicar de inmediato lo aprendido, consolidando así sus conocimientos.
                    </p>
                    <p>
                      Uno de los aspectos más destacados del evento fue la interacción cercana con los ponentes. Los asistentes pudieron formular
                      preguntas, recibir asesoría personalizada y compartir experiencias, fomentando un ambiente de aprendizaje dinámico y
                      colaborativo. Este intercambio enriqueció aún más la experiencia, fortaleciendo la comunidad ecuestre y promoviendo el
                      bienestar de los caballos.
                    </p>
                    <p>
                      En conclusión, el 1° Seminario Teórico-Práctico de Manejo y Clínica Equina fue un evento excepcional, que no solo permitió
                      adquirir conocimientos de alto nivel, sino que también reafirmó la importancia del manejo responsable y el bienestar equino.
                      Sin duda, una experiencia única para todos los amantes de estos majestuosos animales.
                    </p>
                HTML,
            ],
            [
                'id' => 'congresoAgrovet2026',
                'title' => 'Congreso AgroVet 2026',
                'content' => <<<HTML
                    <div>
                      <img src="{$b}/assets/img/Investigacion/Agrovet.png" alt="Descripción de la imagen 1" class="evento-portada">
                    </div>
                    <h4>Primer Congreso de Producción AgroPecuaria Sostenible y Bienestar Animal</h4>
                    <p>
                      AgroVet 2026 es un evento académico-científico orientado a la difusión de investigaciones, innovaciones tecnológicas,
                      propuestas productivas y experiencias exitosas en bienestar animal y sostenibilidad de los sistemas productivos.
                    </p>
                    <p>
                      El congreso promueve el intercambio de conocimiento entre academia, sector productivo y sociedad, y fortalece el diálogo
                      interdisciplinario para aportar soluciones aplicadas al sector agropecuario.
                    </p>
                    <ul>
                      <li>Sistemas de producción pecuaria.</li>
                      <li>Cuidado y bienestar animal.</li>
                      <li>Prácticas sostenibles en producción agropecuaria.</li>
                      <li>Transformación sostenible del sector pecuario mediante Economía Naranja.</li>
                    </ul>
                    <p>
                      <strong>Fecha:</strong> 12 y 13 de marzo de 2026.<br>
                      <strong>Lugar:</strong> Instituto Superior Tecnológico Superarse (Campus Alpallana, Quito).
                    </p>
                    <a
                      href="https://agrovet.superarse.ec/"
                      target="_blank"
                      class="btn btn-sm btn-info mt-2"
                    >
                      <i class="fa fa-external-link-alt mr-2"></i> Ver AgroVet 2026
                    </a>
                HTML,
            ],
            [
                'id' => 'simposioAdministracion',
                'title' => 'Simposio de Administración',
                'content' => <<<HTML
                    <h4>Simposio de Administración</h4>
                    <h5><strong>Presentación</strong></h5>
                    <p>
                      El Simposio de Potenciación Empresarial, realizado el 23 de septiembre de 2023 en el ISTS, fue un encuentro para
                      jóvenes que enfrentan desafíos en su vida profesional, especialmente al emprender. El evento destacó la importancia
                      del autoconocimiento, las estrategias y las herramientas necesarias para transformar ideas en negocios exitosos y
                      sostenibles. Reunió a expertos y apasionados del emprendimiento y el coaching para intercambiar conocimientos y
                      abordar los retos y oportunidades en administración y marketing para jóvenes emprendedores.
                    </p>
                    <h5><strong>Objetivo</strong></h5>
                    <p>
                      Promover estrategias para impulsar a los participantes del simposio de potenciación empresarial 2023 que permitan
                      aprender y aplicar habilidades avanzadas que impulsen el crecimiento, innovación y el éxito sostenible en el
                      ámbito profesional y empresarial.
                    </p>
                    <h5><strong>Estrategias y Técnicas didácticas</strong></h5>
                    <p>
                      Para el desarrollo del Simposio de Potenciación Empresarial 2023 se pretende aplicar un conjunto de acciones
                      deliberadas organizacionales para coordinar (dirigir) el sistema enseñanza aprendizaje. Dicha estrategia es la
                      magistral, como se detalla a continuación:
                    </p>
                    <table>
                      <thead>
                        <tr>
                          <th><strong>Estrategia</strong></th>
                          <th><strong>Tipo</strong></th>
                          <th><strong>Descripción</strong></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Magistral</td>
                          <td>Ponencia (conferencia)</td>
                          <td>Consiste en el uso de la expresión verbal para transmitir información específica de un tema concreto.
                          Siendo una exposición sistemática en el cual la exposición oral de un tema de manera ordenada por parte del
                          expositor, a un grupo relativamente amplio de participantes. La estructura interna de los contenidos se organiza
                          en función de los propósitos de la misma y del tipo de auditorio al cual está dirigida. En todos los casos existe
                          un plan que consta de introducción, desarrollo y conclusiones; para finalmente pasar a preguntas realizadas por
                          el público participante.</td>
                        </tr>
                      </tbody>
                    </table>
                HTML,
            ],
            ['section' => true, 'title' => 'Convocatorias'],
            [
                'id' => 'planificacionGestionInvestigacion',
                'title' => 'Planificación Gestión de Investigación PAO mayo - octubre 2025',
                'content' => <<<HTML
                    
                    <p>
                      Accede al plan de gestión de investigación correspondiente al periodo mayo - octubre 2026, que detalla los objetivos, actividades clave y recursos asignados para fortalecer la investigación durante este semestre.
                    </p>
                    <p>
                      Conoce las directrices, estrategias y líneas de acción que orientan la gestión de investigación del Instituto durante este PAO.
                    </p>
                    <a
                      href="{$b}/PLANIFICACION_GESTION_INVESTIGACION"
                      target="_blank"
                      class="btn btn-sm btn-info mt-3"
                    >
                      <i class="fa fa-file-pdf mr-2"></i> Ver Planificación
                    </a>
                HTML,
            ],
            [
                'id' => 'proyectosInvestigacionPAO',
                'title' => 'Proyectos de Investigación PAO MAYO 2026 - OCTUBRE 2026',
                'content' => <<<HTML
                  
                    <h5><strong>Requisitos</strong></h5>
                    <ul>
                      <p>Descargar y llenar los formatos solicitados (Perfil de proyecto de investigación).</p>
                      <p>Remitir los documentos dentro de los tiempos estipulados en el cronograma a los siguientes correos:</p>
                      <ul>
                        <li>Dirección de Investigación, Desarrollo e Innovación: <a href="mailto:investigacion@superarse.edu.ec">Josue Tello</a></li>
                      </ul>
                    </ul>
                    <p>
                      Por favor, asegúrese de enviar los documentos del proyecto con copia a la coordinación de cada escuela a la que pertenezca.
                    </p>
                    <p>
                      Consulta la lista de proyectos de investigación aprobados o en desarrollo para el periodo académico ordinario MAYO 2026 - OCTUBRE 2026, incluyendo sus resúmenes y los equipos de investigación involucrados.
                    </p>
                    <ul>
                      <li><strong>Escuela de Veterinaria:</strong> Para contactar directamente al responsable del área, envíe un correo a: <a href="mailto:francisco.velastegui@superarse.edu.ec">Francisco Velastegui</a></li>
                      <li><strong>Escuela en línea:</strong> Para contactar directamente al responsable del área, envíe un correo a: <a href="mailto:katherine.guaman@superarse.edu.ec">Katherine Guaman</a></li>
                      <li><strong>Escuela de Construcción y Extracción sostenible:</strong> Para contactar directamente al responsable del área, envíe un correo a: <a href="mailto:daniela.tamayo@superarse.edu.ec">Daniela Tamayo</a></li>
                    </ul>
                    <p>
                      La Dirección de Investigación, Desarrollo e Innovación remitirá por correo electrónico la resolución del comité,
                      por lo que es obligación de los responsables de los proyectos, revisar su correo electrónico dentro de los plazos
                      establecidos en el cronograma.
                    </p>
                    <h4>Formatos</h4>
                    <style>
                    .docs-container {
                        display: grid;
                        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
                        gap: 18px;
                        margin-top: 20px;
                    }
                    .doc-btn {
                        display: flex;
                        align-items: center;
                        padding: 14px 16px;
                        border-radius: 12px;
                        color: white;
                        font-weight: 600;
                        font-size: 15px;
                        text-decoration: none;
                        gap: 10px;
                        box-shadow: 0px 4px 10px rgba(0,0,0,0.15);
                        transition: transform 0.2s ease, box-shadow 0.2s ease;
                    }
                    .doc-btn i { font-size: 22px; }
                    .azul { background: #0056B3; }
                    .verde { background: #4CAF50; }
                    .amarillo { background: #FBC02D; color: #222; }
                    .naranja { background: #FB8C00; }
                    .doc-btn:hover {
                        transform: translateY(-3px);
                        box-shadow: 0px 6px 14px rgba(0,0,0,0.25);
                        opacity: 0.95;
                    }
                    </style>
                    <div class="docs-container">
                      <a class="doc-btn azul" href="{$b}/assets/docs/Investigacion/Formatos/ISTS-GIDIVS-02-003 Perfil de Propuesta de investigación.docx" download>
                        <i class="fa fa-file-word"></i> Perfil de Propuesta de Investigación
                      </a>
                      <a class="doc-btn verde" href="{$b}/assets/docs/Investigacion/Formatos/ISTS-GIDIVS-02-004 Plan de Aprendizaje de Estudiantes.docx" download>
                        <i class="fa fa-file-word"></i> Plan de Aprendizaje de Estudiantes
                      </a>
                      <a class="doc-btn amarillo" href="{$b}/assets/docs/Investigacion/Formatos/ISTS-GIDIVS-02-005 Matriz de evaluación de perfiles de investigación.docx" download>
                        <i class="fa fa-file-word"></i> Matriz de Evaluación de Perfiles
                      </a>
                      <a class="doc-btn naranja" href="{$b}/assets/docs/Investigacion/Formatos/ISTS-GIDIVS-02-006 Carta de compromiso de estudiantes en investigación_SP 1.docx" download>
                        <i class="fa fa-file-word"></i> Carta de Compromiso
                      </a>
                      <a class="doc-btn azul" href="{$b}/assets/docs/Investigacion/Formatos/ISTS-GIDIVS-02-007 Acta de inicio de proyecto de investigación_SP.docx" download>
                        <i class="fa fa-file-word"></i> Acta de Inicio
                      </a>
                      <a class="doc-btn verde" href="{$b}/assets/docs/Investigacion/Proyectos/ISTS-GIDIVS-02-008 Seguimiento proyectos de investigación_SP.docx" download>
                        <i class="fa fa-file-word"></i> Seguimiento del Proyecto
                      </a>
                      <a class="doc-btn amarillo" href="{$b}/assets/docs/Investigacion/Formatos/ISTS-GIDIVS-02-009 Proyecto final de investigación_SP.docx" download>
                        <i class="fa fa-file-word"></i> Proyecto Final
                      </a>
                      <a class="doc-btn naranja" href="{$b}/assets/docs/Investigacion/Formatos/ISTS-GIDIVS-02-010 CIERRE DE PROYECTO_FORMATO-INFORME.docx" download>
                        <i class="fa fa-file-word"></i> Cierre de Proyecto
                      </a>
                    </div>
                HTML,
            ],
            ['section' => true, 'title' => 'Publicaciones'],
            ['id' => 'publicacionesNoviembre2025Abril2026',
                'title' => 'Noviembre 2025 - Abril 2026',
                'content' => <<<HTML
                    <h4> Diseño de bloques nutricionales (BN) para cuyes y ovejas existentes en la hacienda Agusbella ubicada en la parroquia de Rumipamba</h4>
                    <p>
                       La suplementación con bloques nutricionales elaborados con insumos locales mejoró significativamente el rendimiento productivo de cuyes y ovinos en sistemas rurales. Los animales suplementados presentaron mayor ganancia de peso, menor mortalidad y mejor condición corporal que aquellos sin suplementación. Además, el bajo costo de producción de los bloques los convierte en una alternativa viable y económica para pequeños productores, contribuyendo al fortalecimiento de la producción pecuaria rural y a la formación técnica aplicada.
                    </p>
                    <a
                      href="https://publicacionestecnoecuatoriano.edu.ec/index.php/editorialtecnoecuatoriano/article/view/130/174"
                      target="_blank"
                      class="btn btn-sm btn-info mt-3"
                    >
                      <i class="fa fa-file-pdf mr-2"></i> Ver Publicación
                    </a>
                    <h4>EVALUACIÓN DE LA CADENA DE FRÍO EN LA COMERCIALIZACIÓN DE QUESO CRIOLLO EN EL CANTÓN LOMAS DE SARGENTILLO</h4>
                    
                    <p>
                       A nivel mundial el queso gracias a su gran nivel nutritivo se ha convertido en uno de los alimentos más consumidos. Su composición se basa en proteínas, grasas combinado con su sabor y textura lo convierten en alimento de alto consumo, su conservación está estrechamente ligado a la cadena de frío que constituye un factor fundamental en la calidad de los productos lácteos. El objetivo de este estudio fue evaluar la cadena de frío mediante el monitoreo de la temperatura de quesos criollos durante su comercialización en el cantón Lomas de Sargentillo. Se seleccionaron cinco locales comerciales mediante un muestreo aleatorio estratificado, evaluando los productos durante un periodo de 21 días.
                    </p>
                    <a
                      href="https://www.scilit.com/publications/28cd25bb626cfaae8cef765317f93d81"
                      target="_blank"
                      class="btn btn-sm btn-info mt-3"
                    >
                      <i class="fa fa-file-pdf mr-2"></i> Ver Publicación
                    </a>
                     <h4>CÁLCULO INTEGRAL APLICADO A LA AGROINDUSTRIA PARA EL APRENDIZAJE PRÁCTICO</h4>
                    
                    <p>
                       Estimado lector, el aprendizaje del Cálculo Integral es importante debido a que propicia el pensamiento lógico-analítico y se utiliza como herramienta para resolver problemas reales y concretos de diversas áreas del conocimiento, no sólo en Matemáticas y Física, sino en disciplinas tales como la Ingeniería, Economía, entre otras. La aplicación de los teoremas esenciales propicia en las personas que estudian o practican los métodos del cálculo integral una evolución en sus capacidades de abstracción y razonamiento que conlleva a una madurez matemática, necesarios para operar y aplicar funciones matemáticas con variable real en el planteamiento y solución de situaciones prácticas que llegan a presentarse en su ejercicio profesional.
                    </p>
                    <a
                      href="https://grupoblr.com/2026/04/10/libro-calculo-integral-aplicado-a-la-agroindustria-manual-didactico-para-el-aprendizaje-practico/"
                      target="_blank"
                      class="btn btn-sm btn-info mt-3"
                    >
                      <i class="fa fa-file-pdf mr-2"></i> Ver Publicación
                    </a>
                     <h4>Implementación Participativa de un Modelo Comunitario de Gestión Sostenible de Residuos Sólidos para fortalecer la Educación Ambiental y la Economía Circular</h4>
                    
                    <p>
                      La investigación analiza la gestión de residuos sólidos en la Plaza César Chiriboga, donde se generan aproximadamente 40 toneladas mensuales, principalmente de materia orgánica. Mediante encuestas, talleres de compostaje, prototipos de composteras y manuales prácticos, se promovió el aprovechamiento de estos residuos. Los resultados evidenciaron un potencial económico anual de hasta USD 48.180 mediante la producción de compost, además de fortalecer la educación ambiental y la economía circular.
                      <strong>Palabras clave:</strong> residuos sólidos, materia orgánica, compostaje, economía circular.
                    </p>
                    <a
                      href="https://www.calameo.com/read/008147044e4d9ab9d4bc3"
                      target="_blank"
                      class="btn btn-sm btn-info mt-3"
                    >
                      <i class="fa fa-file-pdf mr-2"></i> Ver Publicación
                    </a>
                     <h4>“Cuentos que conectan”: Proyecto de motivación a la lectura en niños y niñas de 6 a 8 años de edad con necesidades educativas especiales con TDH mediante cuentos generados con inteligencia artificial generativa</h4>
                    
                    <p>
                      La investigación analiza el impacto de cuentos personalizados generados con inteligencia artificial en la motivación y comprensión lectora de nueve niños de 6 a 8 años con TDAH. Mediante un diseño cuasiexperimental y enfoque mixto, se utilizaron cuentos creados con ChatGPT e imágenes generadas con Meta AI, acompañados de actividades multisensoriales durante ocho semanas. Los resultados evidenciaron un incremento del 25% en la comprensión lectora, además de mejoras en la atención, participación y motivación. Se concluye que la IA puede apoyar prácticas pedagógicas inclusivas.
                      <strong>Palabras clave:</strong> TDAH, inteligencia artificial generativa, inclusión, educación
                    </p>
                    <a
                      href="https://www.calameo.com/read/008147044e4d9ab9d4bc3"
                      target="_blank"
                      class="btn btn-sm btn-info mt-3"
                    >
                      <i class="fa fa-file-pdf mr-2"></i> Ver Publicación
                    </a>
                       <h4>Educación inclusiva adaptativa mediante la implementación de 
                      inteligencia artificial generativa para optimizar la motivación lectora 
                      en estudiantes de 6 a 8 años con dislexia y TDAH en entornos iniciales y 
                      básicos de Sangolquí</h4>
                    
                    <p>
                      La investigación evaluó el uso de cuentos personalizados con inteligencia artificial para fortalecer la lectura en niños de 6 a 8 años con TDAH y dislexia. Mediante un diseño cuasiexperimental de ocho semanas, se evidenciaron mejoras en motivación, comprensión, escritura, reconocimiento de palabras y participación. Se concluye que la IA puede contribuir a una educación más inclusiva mediante recursos adaptativos.
                      <strong>Palabras clave:</strong> educación inclusiva, inteligencia artificial, lectoescritura, dislexia, TDAH.
                    </p>
                    <a
                      href="https://isbnecuador.com/catalogo.php?mode=detalle&nt=108590"
                      target="_blank"
                      class="btn btn-sm btn-info mt-3"
                    >
                      <i class="fa fa-file-pdf mr-2"></i> Ver Publicación
                    </a>
                        <h4>Impact of extensive cattle ranching on The Forests and Páramos of the Rumipamba Parish through satellite images and spatial statistics</h4>
                    
                    <p>
                     La ganadería extensiva genera un impacto ambiental significativo sobre los ecosistemas naturales. Sin embargo, este impacto aún no ha sido cuantificado, especialmente en los valles interandinos, donde la presencia de bosques nativos y páramos es fundamental para la regulación climática y la seguridad hídrica. Nuestra investigación se centra en la parroquia Rumipamba.El objetivo principal de esta investigación es cuantificar los cambios en la cobertura y uso del suelo entre los años 2019 y 2024, identificando las áreas correspondientes a pastizales, bosques y páramos, así como evaluar la relación entre la expansión de los pastizales, utilizada como indicador indirecto de la expansión ganadera, y la degradación de los ecosistemas estratégicos.
                    </p>
                    <a
                      href="https://www.revistasipgh.org/index.php/regeo/article/view/6128"
                      target="_blank"
                      class="btn btn-sm btn-info mt-3"
                    >
                      <i class="fa fa-file-pdf mr-2"></i> Ver Publicación
                    </a>
                         <h4>Libro de memorias segundo congreso de topografía yminería 2025</h4>
                    
                    <p>
                     El libro recopila las memorias del Segundo Congreso de Topografía y Minería 2025, reuniendo contribuciones académicas y técnicas relacionadas con la topografía, la minería y sus aplicaciones. La obra presenta investigaciones y experiencias orientadas al desarrollo tecnológico, la innovación y la aplicación de conocimientos especializados en estos campos, constituyéndose en un espacio de difusión de resultados científicos y profesionales.
                    </p>
                    <a
                      href="https://isbnecuador.com/catalogo.php?mode=busqueda_menu&id_autor=105895"
                      target="_blank"
                      class="btn btn-sm btn-info mt-3"
                    >
                      <i class="fa fa-file-pdf mr-2"></i> Ver Publicación
                    </a>
                         <h4>Creación de Narrativas Digitales sobre los Peligros y Amenazas en red usando Herramientas de Inteligencia Artificial</h4>
                    
                    <p>
                     El uso creciente de internet ha incrementado riesgos como el ciberbullying, sexting, vamping y grooming. Esta investigación analiza el uso de herramientas de inteligencia artificial para crear narrativas digitales orientadas a concientizar sobre estos peligros. Mediante un enfoque cuantitativo, descriptivo y bibliográfico, se compararon herramientas de IA y aplicaciones Web 2.0 según calidad, tiempo, facilidad de uso e innovación. Participaron 10 estudiantes de Asistencia Pedagógica del Instituto Tecnológico Superior Superarse, quienes diseñaron un plan de concientización aplicado en centros educativos. Los resultados permitieron valorar la utilidad y facilidad de estas tecnologías para la creación de recursos educativos.
                    <strong>Palabras clave:</strong> inteligencia artificial, narrativas digitales, riesgos en internet, educomunicación, TIC.
                    </p>
                    <a
                      href="https://editorial.itca.edu.ec/index.php/editorial/en/catalog/view/5/13/23"
                      target="_blank"
                      class="btn btn-sm btn-info mt-3"
                    >
                      <i class="fa fa-file-pdf mr-2"></i> Ver Publicación
                    </a>
                HTML,],
            [
                'id' => 'publicacionesMayoOctubre2025',
                'title' => 'Mayo 2025 - Octubre 2025',
                'content' => <<<HTML
                    <h4>Guinea pig meat production in South America: Reviewing existing practices, welfare challenges, and opportunities.</h4>
                    <p>
                      <strong>Emergentes por:</strong> Gustavo Donoso, Juan Sebastián Galecio, Oscar Giovanny Fuentes Quisaguano y Monique Pairis Garcia.
                    </p>
                    <p>
                      Los cuyes (Cavia porcellus) han sido consumidos y venerados en los países sudamericanos desde tiempos precolombinos,
                      y continúan siendo tanto una fuente importante de proteína como un motor económico para comunidades desatendidas
                      y remotas de la región. Sin embargo, actualmente existe una cantidad limitada de investigaciones revisadas por pares
                      sobre el estado de bienestar de estos animales en los sistemas de producción de carne. Esta revisión exploratoria tiene como
                      objetivo ofrecer una visión general de la producción de carne de cuy en la región, destacando los posibles desafíos en
                      términos de bienestar animal y explorando oportunidades para mejorar las prácticas de bienestar dentro de estos sistemas.
                    </p>
                    <a
                      href="https://www.cambridge.org/core/journals/animal-welfare/article/guinea-pig-meat-production-in-south-america-reviewing-existing-practices-welfare-challenges-and-opportunities/74CD34B417EA6DBB906E037E959FAE5C"
                      target="_blank"
                      class="btn btn-sm btn-info mt-3"
                    >
                      <i class="fa fa-file-pdf mr-2"></i> Ver Publicación
                    </a>
                    <h4>Pertinencia del profesional en instrumentación quirúrgica en el Ecuador. Caso de estudio: Pichincha.</h4>
                    <p>
                      <strong>Emergentes por:</strong> María Elena Quezada, Tatiana Trinidad Quishpe Casillas, Jonathan Orbe Terán.
                    </p>
                    <p>
                      El presente estudio trata sobre la pertinencia del profesional en Instrumentación Quirúrgica en Ecuador y se arraiga en las
                      demandas tanto locales como nacionales en el campo de la atención médica que permita incorporar personal de la salud en
                      instrumentación quirúrgica calificado, tomando como caso de estudio la provincia de Pichincha, cantón Rumiñahui. El objetivo es
                      identificar la necesidad de profesionales instrumentistas quirúrgicos para que apoyen al personal médico que intervienen en
                      cirugías, y de esta manera se reconozca el rol de este profesional en el país.
                    </p>
                    <a
                      href="https://revista.ister.edu.ec/ojs/index.php/ISTER/article/view/275/372"
                      target="_blank"
                      class="btn btn-sm btn-info mt-3"
                    >
                      <i class="fa fa-file-pdf mr-2"></i> Ver Publicación
                    </a>
                HTML,
            ],
            [
                'id' => 'publicacionesNoviembreAbril2025',
                'title' => 'Noviembre 2024 - Abril 2025',
                'content' => <<<HTML
                    <h4>Estudos em Ciências Agrárias e Ambientais.</h4>
                    <p>
                      <strong>Emergentes por:</strong> MSc. María José Jiménez, MSc. Nathaly Freire, MSc. Fabian Tello.
                    </p>
                    <p>
                      Este libro destaca la importancia de la formación práctica en la carrera de Producción Animal, donde los estudiantes del Instituto Superior Tecnológico Superarse (ISTS) fortalecen sus conocimientos teóricos a través de talleres aplicados al ámbito agroindustrial.
                    </p>
                    <a
                      href="{$b}/ESTUDOS_EM_CIENCIAS_AGRARIAS"
                      target="_blank"
                      class="btn btn-sm btn-info mt-3"
                    >
                      <i class="fa fa-file-pdf mr-2"></i> Ver Publicación
                    </a>
                    <h4>Primer Congreso Internacional De Innovación, Tecnología, Patrimonio y sostenibilidad O. D. S.</h4>
                    <p>
                      <strong>Emergentes por:</strong> César Andrés Ramírez Romero.
                    </p>
                    <p>
                      Este libro presenta un estudio innovador orientado al aprovechamiento sostenible de los residuos agroindustriales, tomando como caso el mucílago de cacao, un subproducto generado durante la poscosecha del grano.
                    </p>
                    <a
                      href="{$b}/CONGRESO_ITPS_ODS"
                      target="_blank"
                      class="btn btn-sm btn-info mt-3"
                    >
                      <i class="fa fa-file-pdf mr-2"></i> Ver Publicación
                    </a>
                HTML,
            ],
            [
                'id' => 'publicacionesMayoOctubre2024',
                'title' => 'Mayo - Octubre 2024',
                'content' => <<<HTML
                    <h4>Employer Branding: Estrategias de Atracción y Retención del Talento en Emprendimientos</h4>
                    <p>
                      <strong>Escuela:</strong> Administración e Industria.
                    </p>
                    <p>
                      <strong>Emergentes por:</strong> Sofía Astudillo, Mariela Ortega.
                    </p>
                    <p>
                      La ponencia destaca la importancia del employer branding como un componente esencial para el éxito empresarial,
                      especialmente en los emprendimientos emergentes. Establecer estrategias de employer branding es crucial para atraer,
                      retener talento y construir una reputación positiva como empleador.
                    </p>
                    <a
                      href="https://sapientiatechnological.aitec.edu.ec/index.php/rst/article/view/103/190"
                      target="_blank"
                      class="btn btn-sm btn-info mt-3"
                    >
                      <i class="fa fa-file-pdf mr-2"></i> Ver Publicación
                    </a>
                    <h4>Humanidades e Ciencias Sociales Perspectivas Teóricas, Metodológicas y de Investigación</h4>
                    <p>
                      <strong>Emergentes por:</strong> PhD.(e) Renee Jaramillo, MSc, MVZ. Karla Novoa.
                    </p>
                    <p>
                      El libro de "Humanidades e Ciências Sociais" reúne investigaciones sobre educación, problemáticas sociales y empresas, destacando el uso de nuevas tecnologías como redes sociales, enseñanza híbrida e inteligencia artificial.
                    </p>
                    <a
                      href="{$b}/HUMANIDADES_E_CIENCIAS_SOCIAIS"
                      target="_blank"
                      class="btn btn-sm btn-info mt-3"
                    >
                      <i class="fa fa-file-pdf mr-2"></i> Ver Publicación
                    </a>
                    <h4>Técnicas y Procedimientos Aplicables a la Topografía Subterránea</h4>
                    <p>
                      <strong>Emergentes por:</strong> Ing. Andrés Sierra, Top. David Serrano.
                    </p>
                    <p>
                      El libro de topografía subterránea, abordando tanto los aspectos técnicos como los desafíos propios de este campo especializado. Su contenido combina fundamentos teóricos, técnicas aplicadas y normativas nacionales e internacionales, proporcionando una base sólida para su aplicación en proyectos subterráneos.
                    </p>
                    <a
                      href="{$b}/TOPOGRAFIA_SUBTERRANEA"
                      target="_blank"
                      class="btn btn-sm btn-info mt-3"
                    >
                      <i class="fa fa-file-pdf mr-2"></i> Ver Publicación
                    </a>
                    <h4>Libros y Guías de Estudio</h4>
                    <p>Accede a nuestros libros y guías de estudio desarrollados para complementar la formación académica.</p>
                    <div class="form-group">
                      <label for="libroSelector">Selecciona una guía para visualizar:</label>
                      <select class="form-control" id="libroSelector" onchange="
                        document.querySelectorAll('.pdf-viewer').forEach(viewer => viewer.style.display = 'none');
                        const selectedViewerId = this.value;
                        if (selectedViewerId) {
                          document.getElementById(selectedViewerId).style.display = 'block';
                        }
                      ">
                        <option value="">-- Elige un documento --</option>
                        <option value="matematicas-viewer">Guía de Matemáticas</option>
                        <option value="publicidad-viewer">Guía de Publicidad Digital</option>
                        <option value="reglamento-viewer">Reglamento I+D+i</option>
                      </select>
                    </div>
                    <div id="matematicas-viewer" class="pdf-viewer" style="display:none; margin-top: 15px;">
                      <h5>Guía General de Estudio de Matemáticas</h5>
                      <iframe src="{$b}/assets/docs/Investigacion/Guia/GUÍA GENERAL DE ESTUDIO DE MATEMÁTICAS.pdf" width="100%" height="500px" style="border: none;"></iframe>
                    </div>
                    <div id="publicidad-viewer" class="pdf-viewer" style="display:none; margin-top: 15px;">
                      <h5>Guía General de Estudio de Publicidad Digital</h5>
                      <iframe src="{$b}/assets/docs/Investigacion/Guia/GUÍA GENERAL DE ESTUDIO DE PUBLICIDAD DIGITAL.pdf" width="100%" height="500px" style="border: none;"></iframe>
                    </div>
                    <div id="reglamento-viewer" class="pdf-viewer" style="display:none; margin-top: 15px;">
                      <h5>Reglamento: Investigación, Desarrollo e Innovación</h5>
                      <iframe src="{$b}/assets/docs/Investigacion/Guia/GUÍA GENERAL DE ESTUDIO DE.pdf" width="100%" height="500px" style="border: none;"></iframe>
                    </div>
                HTML,
            ],
            [
                'id' => 'publicacionesNoviembre2023Abril2024',
                'title' => 'Noviembre 2023 - Abril 2024',
                'content' => <<<HTML
                    <h4>Análisis del Storytelling de 30¨ en Tik Tok para generar tendencias en la generación Z</h4>
                    <p>
                      <strong>Escuela:</strong> Administración e Industria.<br>
                      <strong>Emergentes por:</strong> Karina Fabara, Israel Proaño<br>
                      La generación Z es el grupo que hoy en día lidera los intereses de las marcas y tendencias en las plataformas digitales,
                      es por esto que el objetivo de este estudio es identificar las características que debe tener la historia que se va a
                      publicar para convertirse en tendencia y como conectar con la Generación Z, en un tiempo menos a 30 segundos con el
                      apoyo de las funcionalidades de Tik Tok.
                    </p>
                    <a
                      href="https://www.polodelconocimiento.com/ojs/index.php/es/article/view/6535"
                      target="_blank"
                      class="btn btn-sm btn-info mt-3"
                    >
                      <i class="fa fa-file-pdf mr-2"></i> Ver Publicación
                    </a>
                    <h4>Creación de narrativas digitales sobre los peligros y amenazas en red usando herramientas de inteligencia artificial</h4>
                    <p>
                      <strong>Escuela:</strong> Educación y Humanidades.<br>
                      <strong>Emergentes por:</strong> Santiago Pucha<br>
                      En un entorno donde miles de nuevos usuarios se suman diariamente a internet, el Ciberbullyng, el sexting, el vamping,
                      se presentan como amenazas que acechan en el mundo digital a estos nuevos integrantes de la red. La creación de narrativas
                      digitales se vuelve esencial para educar a la sociedad sobre el uso concientizado de la tecnología.
                    </p>
                    <a
                      href="https://revistas.ecotec.edu.ec/index.php/ecociencia/article/view/866"
                      target="_blank"
                      class="btn btn-sm btn-info mt-3"
                    >
                      <i class="fa fa-file-pdf mr-2"></i> Ver Publicación
                    </a>
                HTML,
            ],
            [
                'id' => 'publicacionesMayoOctubre2023',
                'title' => 'Mayo - Octubre 2023',
                'content' => <<<HTML
                    <h4>Memorias del Primer Congreso Internacional de Topografía y Geodesia 2023</h4>
                    <p>
                      <strong>Escuela:</strong> Construcción y Extracción Sostenible<br>
                      <strong>Emergentes por:</strong> Renee Jaramillo<br>
                      El Congreso Internacional de Topografía y Geodesia es un espacio de encuentro y divulgación creado para que
                      organizaciones que trabajan en proyectos de construcción, planificación urbana, gestión de recursos naturales
                      y cartografía; además, investigadores autónomos, topógrafos, ingenieros, geólogos y otros profesionales
                      relacionados con la medición y representación de la superficie terrestre; participen en la publicación de las memorias
                      para sus proyectos y presentación de las empresas interesadas.
                    </p>
                    <a
                      href="https://revista.ister.edu.ec/ojs/index.php/ISTER/article/view/104"
                      target="_blank"
                      class="btn btn-sm btn-info mt-3"
                    >
                      <i class="fa fa-file-pdf mr-2"></i> Ver Publicación
                    </a>
                HTML,
            ],
            [
                'id' => 'publicacionesMayoOctubre202',
                'title' => 'Noviembre 2022 - Abril 2023',
                'content' => <<<HTML
                    <h4>Silvopastoral Systems as a Strategy for Reconversion of Livestock Farming in Ecuadorian Amazon</h4>
                    <p>
                      <strong>Escuela:</strong> Veterinaria<br>
                      <strong>Emergentes por:</strong> Fausto Zacarías<br>
                      Livestock products are an important agricultural commodity for global food security because they provide 17% of
                      global kilocalorie consumption and 33% of global protein consumption. Nevertheless, livestock contribute 14%
                      of the total annual anthropogenic greenhouse (GHG) emissions. Pasture for cattle grazing is the dominant agricultural
                      land use in the tropics with almost 80% of forest area cleaned in the Neotropics converted to pasture. Despite tropical
                      forests constitute an ecological biome of global importance to carbon cycles, patters of climate and biodiversity in
                      developing countries are changing rapidly in response to a variety of drivers. Therefore, globally, natural forest
                      and grasslands are declining due to human activities such as deforestation or urbanisation. For this reason, agriculture
                      including land-use change, and deforestation, is a particular focus, because it was responsible for 23% of the total GHG
                      emissions globally in 2017.
                    </p>
                    <a
                      href="https://www.researchgate.net/publication/369019038_Silvopastoral_Systems_as_a_Strategy_for_Reconversion_of_Livestock_Farming_in_Ecuadorian_Amazon"
                      target="_blank"
                      class="btn btn-sm btn-info mt-3"
                    >
                      <i class="fa fa-file-pdf mr-2"></i> Ver Publicación
                    </a>
                HTML,
            ],
        ];
    }
}