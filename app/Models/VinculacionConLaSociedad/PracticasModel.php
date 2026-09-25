<?php

declare(strict_types=1);

namespace App\Models\VinculacionConLaSociedad;

final class PracticasModel
{
    public function kicker(): string
    {
        return 'PRÁCTICAS';
    }

    public function title(): string
    {
        return 'Coordinación de Prácticas Preprofesionales';
    }

    /**
     * @return array<int, array{imagen: string, carrera: string, descripcion: string}>
     */
    public function carrusel(): array
    {
        return [
            [
                'imagen'      => asset('assets/img/bienestarEstudiantil/Practicas/Practicas1.JPG'),
                'carrera'     => 'Prácticas de la carrera de Administración',
                'descripcion' => 'Descubre lo vibrante de poner en práctica lo aprendido en un entorno laboral.',
            ],
            [
                'imagen'      => asset('assets/img/bienestarEstudiantil/Practicas/Practicas2.JPG'),
                'carrera'     => 'Prácticas de la carrera de Enfermería Veterinaria',
                'descripcion' => 'Descubre lo vibrante de poner en práctica lo aprendido en un entorno laboral.',
            ],
            [
                'imagen'      => asset('assets/img/bienestarEstudiantil/Practicas/Practicas5.JPG'),
                'carrera'     => 'Prácticas de la carrera de Producción Animal',
                'descripcion' => 'Descubre lo vibrante de poner en práctica lo aprendido en un entorno laboral.',
            ],
            [
                'imagen'      => asset('assets/img/bienestarEstudiantil/Practicas/Practicas8.JPG'),
                'carrera'     => 'Prácticas de la carrera de Diseño Gráfico',
                'descripcion' => 'Descubre lo vibrante de poner en práctica lo aprendido en un entorno laboral.',
            ],
            [
                'imagen'      => asset('assets/img/bienestarEstudiantil/Practicas/Practicas9.JPG'),
                'carrera'     => 'Prácticas de la carrera de Topografía',
                'descripcion' => 'Descubre lo vibrante de poner en práctica lo aprendido en un entorno laboral.',
            ],
        ];
    }

    /**
     * @return array<int, array{id: string, nombre: string, texto: string}>
     */
    public function modalidades(): array
    {
        return [
            [
                'id'     => 'list-calidad',
                'nombre' => 'CONVENIOS INSTITUCIONALES',
                'texto'  => 'El Instituto Superior Tecnológico Superarse mantiene convenios con instituciones públicas y privadas que están dispuestas a recibir estudiantes para que realicen sus prácticas preprofesionales. Estas prácticas deben estar relacionadas con la carrera del estudiante y pueden llevarse a cabo tanto dentro como fuera del instituto.',
            ],
            [
                'id'     => 'list-Autogestion',
                'nombre' => 'AUTOGESTIÓN',
                'texto'  => 'El Instituto Superior Tecnológico Superarse también permite que los estudiantes realicen sus prácticas preprofesionales de forma independiente. Esta opción es para aquellos que, por cualquier razón, no deseen utilizar los convenios que ofrece la institución. Las prácticas autogestionadas deben ser formativas y permitir al estudiante aplicar e integrar los conocimientos y habilidades que ha adquirido durante su formación académica.',
            ],
            [
                'id'     => 'list-Ayudantias',
                'nombre' => 'AYUDANTÍAS EN INVESTIGACIÓN',
                'texto'  => 'Los estudiantes del Instituto Superior Tecnológico Superarse pueden realizar sus prácticas preprofesionales a través de ayudantías de investigación o pasantías. Para ser seleccionado, se evalúa el desempeño académico del estudiante y las necesidades de investigación del instituto. Para postular, el estudiante debe enviar una solicitud formal al Coordinador de Prácticas Preprofesionales, quien se encargará de analizar y aprobar la petición.',
            ],
            [
                'id'     => 'list-Homologaciones',
                'nombre' => 'HOMOLOGABLES LABORALES',
                'texto'  => 'Los estudiantes del Instituto Superior Tecnológico Superarse que tengan más de un año de experiencia laboral comprobable pueden solicitar que esas horas de trabajo sean reconocidas como prácticas preprofesionales. Para esto, el estudiante debe presentar una solicitud formal de homologación al Coordinador de Prácticas Preprofesionales. El coordinador analizará y verificará que las actividades que el estudiante realiza en su trabajo son formativas y que se alinean con los conocimientos y competencias de su carrera.',
            ],
        ];
    }
}