<?php

declare(strict_types=1);

namespace App\Models\OfertaAcademica;

final class EcavetModel
{
    public function kicker(): string
    {
        return 'NUESTRA FORMACIÓN';
    }

    public function title(): string
    {
        return 'Oferta Académica';
    }

    public function schoolBadge(): string
    {
        return 'Escuela de Ciencias Agropecuarias y Veterinarias ECAVET';
    }

    public function schoolIcon(): string
    {
        return 'fas fa-paw';
    }

    public function logo(): string
    {
        return asset('assets/img/gestionAcademica/Logos/ECAVET.png');
    }

    public function schoolUrl(): string
    {
        return asset('ECAVET');
    }

    public function circleColor(): string
    {
        return '#6CD113';
    }

    public function cardButtonGradient(): string
    {
        return 'linear-gradient(90deg, #32cd32, #26e6a4)';
    }

    public function careers(): array
    {
        return [
            [
                'slug' => 'enfermeria-veterinaria',
                'id' => 'enfermeriaVeterinaria',
                'title' => 'Enfermería Veterinaria',
                'degree' => 'Tecnólogo/a Superior en Enfermería Veterinaria',
                'imagePath' => asset('assets/img/gestionAcademica/escuelaVeterinaria/enfermeriaVeterinaria.png'),
                'resolucion' => 'RPC-SO-26-No.429-2024',
                'description' => 'Formar Tecnólogos en Enfermería Veterinaria con competencias que les permita atender ampliamente las necesidades de los animales brindando asistencia al médico veterinario en la atención al paciente en actividades como hospitalización, manejo de muestras de laboratorio, estética, cirugía, manejo y cuidado de animales de compañía, de granja y silvestres dentro de clínicas y hospitales veterinarios.',
                'profile' => [
                    'Preparar al paciente con técnicas apropiadas, aplicación de medicamentos, curaciones, vendajes y férulas, según la prescripción e indicación del médico veterinario.',
                    'Asistir al médico veterinario en procedimientos quirúrgicos, técnicas de diagnóstico de laboratorio y por imágenes.',
                    'Apoyar al médico veterinario en la preparación y aplicación de técnicas de preanestesia, anestesia y monitoreo de parámetros clínicos preoperatorio y posoperatorio.',
                    'Proporcionar servicios en la atención, cuidado y seguimiento de los animales para preservar por la salud y bienestar.',
                    'Aplicar en la práctica los principios de seguridad e higiene en el cuidado de enfermería veterinaria.',
                    'Participar en campañas sanitarias locales, nacionales y regionales, para el control y erradicación de enfermedades zoonóticas.',
                    'Aplicar los protocolos, procesos y procedimientos de enfermería veterinaria para las patologías generales diagnosticadas por el médico veterinario.',
                ],
                'careerPath' => [
                    'Clínicas y hospitales veterinarios.',
                    'Zoológicos.',
                    'Centros de rescate animal.',
                    'Granjas y empresas pecuarias.',
                    'Organizaciones gubernamentales.',
                    'Otros relacionados con el campo veterinario.',
                ],
                'duration' => '2 años',
                'modality' => 'Híbrida',
                'curriculumLink' => '/ENFERMERIA_VETERINARIA',
                'institutionalLogos' => [
                    [
                        'name' => 'CACES',
                        'image' => asset('assets/img/EntidadesEducacion/CACES.png'),
                    ],
                    [
                        'name' => 'CES',
                        'image' => asset('assets/img/EntidadesEducacion/CES.png'),
                    ],
                    [
                        'name' => 'Ministerio de Educación',
                        'image' => asset('assets/img/EntidadesEducacion/ministerio.png'),
                    ]
                ]
            ],
            [
                'slug' => 'produccion-animal',
                'id' => 'produccionAnimal',
                'title' => 'Producción Animal',
                'degree' => 'Tecnólogo/a Superior en Producción Animal',
                'imagePath' => asset('assets/img/gestionAcademica/escuelaVeterinaria/produccionAnimal.png'),
                'resolucion' => 'RPC-SO-28-No.469-2024',
                'description' => 'Formar tecnólogos en Producción Animal con competencias en la ejecución de planes y programas de reproducción animal, mejoramiento genético, nutrición y sanidad, así como, en la aplicación de herramientas y equipos para la industrialización de productos pecuarios que garantice la oferta de profesionales highly cualificados y comprometidos en el ámbito de la producción animal.',
                'profile' => [
                    'Ejecutar programas de reproducción animal, mejoramiento genético, nutrición, sanidad y buenas prácticas pecuarias, con el fin de abordar de manera efectiva los desafíos relacionados con el manejo técnico de los animales.',
                    'Proporciona asistencia técnica especializada en el manejo nutricional, sanitario y reproductivo de los animales.',
                    'Aplica técnicas e instrumentos para el desarrollo de estrategias en el sector pecuario, abordando aspectos tanto productivos como reproductivos en diversas especies animales.',
                    'Emplea procesos de comercialización para la producción pecuaria, garantizando la calidad en el procesamiento, distribución y entrega de productos, en línea con los objetivos administrativos y comerciales definidos en la unidad productiva.',
                    'Ejecuta estrategias de nutrición animal, maximizando la utilización de recursos locales disponibles y aumentando la eficiencia productiva, siguiendo estándares de calidad y requisitos técnicos establecidos en manuales especializados de nutrición.',
                ],
                'careerPath' => [
                    'Granjas, fincas, haciendas pecuarias.',
                    'Empresas agropecuarias.',
                    'Asociaciones y cooperativas pecuarias.',
                    'Organizaciones gubernamentales.',
                    'Otras del sector pecuario.',
                ],
                'duration' => '2 años',
                'modality' => 'Híbrida',
                'curriculumLink' => '/PRODUCCION_ANIMAL',
                'institutionalLogos' => [
                    [
                        'name' => 'CACES',
                        'image' => asset('assets/img/EntidadesEducacion/CACES.png'),
                    ],
                    [
                        'name' => 'CES',
                        'image' => asset('assets/img/EntidadesEducacion/CES.png'),
                    ],
                    [
                        'name' => 'Ministerio de Educación',
                        'image' => asset('assets/img/EntidadesEducacion/ministerio.png'),
                    ]
                ]
            ],
        ];
    }

    /**
     * @return array{whatsapp: string, email: string}
     */
    public function contact(): array
    {
        return [
            'whatsapp' => 'https://wa.me/593995901732',
            'email' => 'admisiones@superarse.edu.ec',
        ];
    }

    public function findCareer(string $slug): ?array
    {
        foreach ($this->careers() as $career) {
            if ($career['slug'] === $slug) {
                return [
                    'school' => 'ECAVET',
                    'title' => $career['title'],
                    'degree' => $career['degree'],
                    'image' => $career['imagePath'],
                    'resolution' => $career['resolucion'],
                    'description' => $career['description'],
                    'profile' => $career['profile'],
                    'careerPath' => $career['careerPath'],
                    'duration' => $career['duration'],
                    'modality' => $career['modality'],
                    'curriculum' => $career['curriculumLink'],
                    'institutionalLogos' => $career['institutionalLogos'] ?? [],
                ];
            }
        }

        return null;
    }
}