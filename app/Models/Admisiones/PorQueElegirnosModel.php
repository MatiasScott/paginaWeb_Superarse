<?php

declare(strict_types=1);

namespace App\Models\Admisiones;

final class PorQueElegirnosModel
{
    public function titulo(): string
    {
        return '¿Por qué elegirnos?';
    }

    public function intro(): array
    {
        return [
            'etiqueta' => '¿POR QUÉ ELEGIRNOS?',
            'heading' => 'A <br>Nosotros',
            'parrafo' => 'El Instituto Superarse es una institución joven, cuyo espíritu nos impulsa a ser INNOVADORES, PROACTIVOS y VISIONARIOS. Ofrecemos programas de formación técnica y tecnológica de tercer nivel con registro en la Senescyt, de corta duración y metodologías educativas innovadoras que responden a las demandas actuales del entorno profesional.',
        ];
    }

    public function frases(): array
    {
        return [
            [
                ['texto' => 'REGISTRO', 'color' => 'rgb(0, 102, 169)'],
                ['texto' => ' SENESCYT', 'color' => 'gray'],
            ],
            [
                ['texto' => 'MODALIDADES', 'color' => 'rgb(105, 163, 62)'],
                ['texto' => ' DE ESTUDIO', 'color' => 'gray'],
            ],
            [
                ['texto' => 'HÍBRIDA O ', 'color' => 'gray'],
                ['texto' => 'EN LÍNEA', 'color' => 'rgb(249, 168, 38)'],
            ],
            [
                ['texto' => 'GRADÚATE EN ', 'color' => 'gray'],
                ['texto' => '1 O 2', 'color' => 'rgba(239, 178, 79, 1)'],
                ['texto' => ' AÑOS', 'color' => 'gray'],
            ],
            [
                ['texto' => 'TALLERES ', 'color' => 'gray'],
                ['texto' => '100%', 'color' => 'rgb(0, 102, 169)'],
                ['texto' => ' PRÁCTICOS', 'color' => 'gray'],
            ],
        ];
    }

    public function secciones(): array
    {
        return [
            [
                'posicion' => 'imagen-izquierda',
                'imagen' => asset('assets/img/Admisiones/porqueElegirnos/01. MODULO ADMISIONES-06.png'),
                'alt' => 'Imagen de Carrera',
                'titulo' => 'Carreras Únicas a Nivel Nacional',
                'texto' => 'El Tecnológico Superarse ofrece una formación diferenciada, orientada al futuro del estudiante, fomentando el dominio de nuevas tecnologías, el liderazgo y la capacidad de iniciativa en el ámbito laboral.',
            ],
            [
                'posicion' => 'imagen-derecha',
                'imagen' => asset('assets/img/Admisiones/porqueElegirnos/01. MODULO ADMISIONES-07.png'),
                'alt' => 'Imagen de Estudiante',
                'titulo' => 'Horarios Flexibles',
                'texto' => 'Ofrecemos dos modalidades de estudio híbrida y en línea que facilitan al estudiante trabajar y estudiar a la vez, brindándole la oportunidad de organizar su tiempo. Asimismo, complementamos su aprendizaje con talleres prácticos y tutorías permanentes.',
            ],
            [
                'posicion' => 'imagen-izquierda',
                'imagen' => asset('assets/img/Admisiones/porqueElegirnos/01. MODULO ADMISIONES-08.png'),
                'alt' => 'Imagen de Docente',
                'titulo' => 'Docentes Altamente Especializados',
                'texto' => 'Nuestros docentes, con amplia experiencia en cada área de estudio, acompañarán al estudiante en su formación, guiando y potenciando sus habilidades para que desarrolle al máximo su talento y capacidad profesional.',
            ],
            [
                'posicion' => 'imagen-derecha',
                'imagen' => asset('assets/img/Admisiones/porqueElegirnos/01. MODULO ADMISIONES-09.png'),
                'alt' => 'Imagen de Taller',
                'titulo' => 'Talleres Prácticos',
                'texto' => 'Ofrecemos talleres 100% prácticos, concebidos como un pilar fundamental en la formación académica, para que el estudiante aplique los conocimientos teóricos adquiridos en el aula, de esta manera, asegurar una preparación integral que responde a las demandas actuales del entorno laboral y potencia la empleabilidad de nuestros profesionales.',
            ],
            [
                'posicion' => 'imagen-izquierda',
                'imagen' => asset('assets/img/Admisiones/porqueElegirnos/01. MODULO ADMISIONES-10.png'),
                'alt' => 'Imagen de instalaciones',
                'titulo' => 'Instalaciones de Primera',
                'texto' => 'El Tecnológico Superarse pone a disposición de sus estudiantes modernas instalaciones, entre ellas laboratorios equipados y campus confortables, diseñados para brindar un entorno académico seguro, dinámico y propicio para el aprendizaje.',
            ],
        ];
    }
}