<?php

declare(strict_types=1);

namespace App\Models\Institution;

final class ProtocolosModel
{
    public function kicker(): string
    {
        return 'GUÍAS DE APOYO';
    }

    public function title(): string
    {
        return 'Nuestros Protocolos Institucionales';
    }

    public function buttonLabel(): string
    {
        return 'Ver más información';
    }

    /**
     * @return array<int, array{
     *     heading: string,
     *     intro: array<int, string>,
     *     extra: array<int, string>,
     *     document: array{title: string, link: string}
     * }>
     */
    public function protocols(): array
    {
        return [
            [
                'heading' => 'PROTOCOLO DE ATENCIÓN PSICOPEDAGÓGICA PARA LOS ESTUDIANTES',
                'intro' => [
                    'El bienestar académico y emocional de los estudiantes es un pilar fundamental para el éxito educativo en cualquier institución de educación superior. En este contexto, el Instituto Superior Tecnológico Superarse se compromete a garantizar que sus estudiantes reciban el apoyo necesario para desarrollar su máximo potencial, tanto en el ámbito académico como en su bienestar emocional y social. Reconociendo que el proceso de aprendizaje va más allá de la adquisición de conocimientos técnicos, también abarca el fortalecimiento de habilidades emocionales, sociales y de resiliencia. Por ello, el presente protocolo psicopedagógico establece un marco integral de apoyo para todos los estudiantes del Tecnológico Superarse.',
                ],
                'extra' => [
                    'La diversidad estudiantil del Instituto Superarse, conformada por jóvenes de diferentes entornos socioeconómicos, culturales y educativos, representa tanto una riqueza como un desafío para la atención de sus necesidades individuales. Este protocolo ha sido diseñado para responder a dichas necesidades mediante acciones afirmativas que aseguren que todos los estudiantes, independientemente de sus características, tengan acceso a los recursos y apoyos necesarios para su éxito académico y personal.',
                    'Basado en el modelo pedagógico del Instituto Superarse, la atención a las necesidades académicas se aborda mediante un enfoque integral que promueve el desarrollo de competencias a través del aprendizaje significativo, la teoría sociocultural y el constructivismo. El currículo es flexible y adaptativo, permitiendo que los estudiantes accedan a diversas experiencias de aprendizaje, como prácticas profesionales, proyectos de investigación y laboratorios equipados, para aplicar sus conocimientos en entornos laborales reales.',
                    'En cuanto al bienestar emocional y social, el Instituto Superarse adopta un enfoque humanista que coloca al estudiante en el centro del proceso formativo, atendiendo sus necesidades cognitivas, sociales, emocionales y de autorrealización. El Departamento de Bienestar Institucional juega un papel clave, ofreciendo apoyo psicológico, becas y programas de desarrollo personal que contribuyen a un ambiente de aprendizaje inclusivo y acogedor.',
                    'La intervención psicopedagógica se fundamenta en el aprendizaje colaborativo y la teoría de la zona de desarrollo próximo de Vygotsky, facilitando la internalización de conocimientos a través del apoyo y la interacción entre estudiantes y profesores. Este enfoque se complementa con el uso de metodologías activas y herramientas digitales, como la plataforma EVA, que favorecen un aprendizaje significativo y personalizado.',
                    'El desarrollo de habilidades blandas y socioemocionales es otro aspecto esencial del modelo pedagógico. Habilidades como la comunicación efectiva, el trabajo en equipo, el liderazgo y la resolución de problemas se integran en el Programa de Estudio de la Asignatura (PEA) mediante metodologías activas, como el aprendizaje basado en problemas y proyectos colaborativos, para que los estudiantes apliquen estas competencias en contextos reales.',
                    'Alineado con el plan estratégico institucional, este protocolo también busca contribuir a la permanencia de los estudiantes mediante un apoyo integral que abarca aspectos académicos, económicos y psicológicos, reduciendo así la deserción y la repetición. Se promoverá la inclusión y la igualdad de oportunidades a través de procesos académicos y administrativos que garanticen la permanencia y el éxito de los estudiantes, acompañándolos desde su admisión hasta la culminación de su carrera con apoyo psicopedagógico, tutorías personalizadas y orientación profesional.',
                    'El protocolo sigue el ciclo PHVA (Planificar, Hacer, Verificar, Actuar), asegurando un proceso continuo de mejora y adaptación a las necesidades cambiantes de los estudiantes, permitiendo que la intervención sea flexible y responda a los desafíos del entorno educativo y las circunstancias individuales.',
                    'Con la implementación de este protocolo, el Instituto Superior Tecnológico Superarse reafirma su compromiso con la calidad educativa y la equidad, proporcionando las condiciones necesarias para que todos los estudiantes alcancen su éxito personal y profesional en un entorno inclusivo, respetuoso y solidario. Así, el protocolo psicopedagógico se consolida como una herramienta clave para promover la igualdad de oportunidades, la equidad, la participación activa y la interculturalidad dentro del Instituto, contribuyendo al desarrollo integral de cada uno de sus estudiantes.',
                ],
                'document' => [
                    'title' => 'Documento Completo Protocolo Psicopedagógico',
                    'link' => '/Protocolo_Psicopedagogico',
                ],
            ],
            [
                'heading' => 'PROTOCOLO DE INTEGRACIÓN DE ESTUDIANTES',
                'intro' => [
                    'El Protocolo de Integración de Estudiantes del Instituto Superior Tecnológico Superarse está diseñado para facilitar el proceso de adaptación y desarrollo de los nuevos estudiantes dentro de la institución. Este documento establece una serie de acciones estratégicas que abarcan desde el ingreso hasta la plena integración académica, emocional y social de los estudiantes, asegurando que reciban el acompañamiento necesario para alcanzar el éxito en su formación profesional.',
                ],
                'extra' => [
                    'El protocolo se fundamenta en un marco legal sólido, basado en las normativas nacionales de la educación superior, y responde a los principios de inclusión, equidad y acompañamiento integral. Además, está alineado con la misión, visión, modelo educativo y pedagógico, que buscan formar profesionales preparados para enfrentar los desafíos del mundo laboral y que contribuyen positivamente a la sociedad y al desarrollo sostenible. En este documento se detallan los objetivos específicos que guiarán el proceso de integración, el alcance del protocolo, y un plan de acción que incluye actividades de diagnóstico, recepción, nivelación académica, asignación de tutores y mentores, y estímulos positivos para estudiantes destacados. Asimismo, se destacan los ejes transversales que complementan este protocolo, tales como el desarrollo de habilidades blandas, competencias digitales y educación ambiental.',
                    'El protocolo también incluye un apartado sobre los recursos y herramientas disponibles, tales como las plataformas virtuales y la guía del estudiante, que permiten a los estudiantes adaptarse a los entornos de aprendizaje digitales. Finalmente, se establece un sistema de evaluación y retroalimentación, basado en encuestas de satisfacción y revisiones periódicas, que garantiza la mejora continua del proceso de integración.',
                    'Con este protocolo, el Instituto Superior Tecnológico Superarse reafirma su compromiso con la formación integral de sus estudiantes, promoviendo un ambiente de aprendizaje inclusivo, motivador y orientado al éxito académico y profesional.',
                ],
                'document' => [
                    'title' => 'Documento Completo Protocolo de Integración',
                    'link' => '/Protocolo_de_integracion',
                ],
            ],
        ];
    }
}