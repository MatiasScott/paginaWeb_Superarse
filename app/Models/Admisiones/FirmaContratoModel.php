<?php

declare(strict_types=1);

namespace App\Models\Admisiones;

final class FirmaContratoModel
{
    public function titulo(): string
    {
        return 'Contrato de Matrícula';
    }

    public function carreras(): array
    {
        return [
            'Tecnólogo en Instrumentación Quirúrgica',
            'Tecnólogo en Educación Básica',
            'Tecnología Superior en Enfermería Veterinaria',
            'Tecnólogo en Producción Animal',
            'Técnico Superior en Marketing Digital',
            'Seguridad e Higiene del Trabajo',
            'Seguridad y Prevención de Riesgos Laborales',
            'Técnico Superior en Administración',
            'Tecnología Superior en Topografía',
            'Tecnólogo en Minería',
        ];
    }

    public function asesores(): array
    {
        return [
            'Luis Granja',
            'Lizbeth Ochoa',
            'Mayra Segarra',
        ];
    }

    /**
     * @return array<int, string> Cláusulas del contrato (HTML ligero permitido: <strong>)
     */
    public function clausulas(): array
    {
        return [
            'Por medio de la presente, autorizo de manera libre, expresa e informada al Instituto Superior Tecnológico Superarse para que almacene, recolecte y procese mis datos personales con fines académicos e institucionales, de conformidad con la Ley Orgánica de Protección de Datos personales. Asimismo, autorizo que esta información pueda ser compartida con los entes de control y autoridades competentes, cuando así corresponda o sea requerida a la normativa vigente.',
            'De acuerdo al <strong>Artículo 37</strong> del <strong>Reglamento de Estudiantes</strong> los valores ingresados al instituto por concepto de matrículas y aranceles no serán devueltos por el Instituto Superior Tecnológico Superarse.',
            'El alumno recibirá las credenciales de acceso a la plataforma de Gestión Académica utilizada por el Instituto, incluyendo el software institucional y todos los contenidos disponibles en dicha plataforma.',
            'Respetar la visión, misión, principios, fines y objetivos institucionales del Instituto Superior Tecnológico Superarse, de acuerdo a lo establecido en el Estatuto de la institución.',
            'Reconozco que la matrícula tiene vigencia desde la firma del presente contrato, correspondiente al periodo académico en curso, y me comprometo a cumplir con la Ley Orgánica de Educación Superior, el Reglamento General de los Institutos Superiores, el Código de Ética, el Estatuto y los Reglamentos Internos del Instituto Superior Tecnológico Superarse, aceptando que el incumplimiento de estas disposiciones podrá generar procesos disciplinarios, administrativos y/o legales en mi contra.',
            'Conocer que al momento de matricularme en el Instituto Superior Tecnológico Superarse bajo la modalidad de CRÉDITO EDUCATIVO estoy asumiendo la obligación de cancelar la totalidad de los aranceles generados y aprobados por el Órgano Colegiado Superior, me comprometo a cancelar las cuotas planteadas en las fechas indicadas por el Instituto Superior Tecnológico Superarse',
            'Conocer que el retiro académico legal se procederá únicamente presentando una solicitud dirigida a la Coordinación de Bienestar Institucional y cubriendo el costo del derecho que implique este proceso.',
            'Respetar y cumplir los Reglamentos Internos del Instituto Superior Tecnológico Superarse; y, por consiguiente, aceptar que el incumplimiento de los compromisos establecidos generará en mi contra procesos disciplinarios, administrativos y/o legales, cumpliendo todas las obligaciones determinadas para los estudiantes del Instituto Superior Tecnológico Superarse.',
        ];
    }

    public function codigoDocumento(): array
    {
        return [
            'codigo' => 'ISTS-GD-02-001',
            'version' => 'Versión: 001',
            'fecha' => 'Fecha de elab: 05/09/2025',
        ];
    }

    public function logoPdfPath(): string
    {
        return ROOT_PATH . '/assets/img/Logo-Superarse-Negativo.png';
    }

    public function logoWebUrl(): string
    {
        return asset('assets/img/Logo-Superarse-Negativo.png');
    }

    public function autoloadPath(): string
    {
        return ROOT_PATH . '/vendor/autoload.php';
    }
}