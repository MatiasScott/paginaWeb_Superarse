<?php

declare(strict_types=1);

namespace App\Models\Institution;

final class AutoridadesModel
{
    public function kicker(): string
    {
        return 'LIDERAZGO INSTITUCIONAL';
    }

    public function title(): string
    {
        return 'Conoce a Nuestras Autoridades';
    }

    /**
     * @return array<int, string>
     */
    public function introParagraphs(): array
    {
        return [
            'El equipo directivo del Instituto Superior Tecnológico Superarse está conformado por profesionales altamente comprometidos y con vasta experiencia. Su liderazgo es clave para guiar nuestra institución hacia la excelencia académica y el desarrollo integral de nuestra comunidad.',
            'Ellos trabajan para mantener un ambiente de innovación, calidad y responsabilidad, siempre enfocados en las necesidades de nuestros estudiantes y en el progreso de la sociedad.',
        ];
    }

    public function defaultImage(): string
    {
        return asset('assets/img/user-default.png');
    }

    /**
     * Autoridades del organigrama, indexadas por el id de su nodo en la vista.
     *
     * @return array<int, array{id: string, name: string, pos: string, img: string, email: string}>
     */
    public function authorities(): array
    {
        return [
            ['id' => 'node-rector', 'name' => 'Msc. Verónica Tamayo', 'pos' => 'Rectora', 'img' => asset('assets/img/institucion/autoridades/VERONICA-TAMAYO.png'), 'email' => 'veronica.tamayo@superarse.edu.ec'],
            ['id' => 'node-secretaria', 'name' => 'Tnlga. Vanessa Salazar', 'pos' => 'Secretaría General', 'img' => asset('assets/img/institucion/autoridades/VANNESA-SALAZAR.png'), 'email' => 'melany.salazar@superarse.edu.ec'],
            ['id' => 'node-vicerrector', 'name' => 'MBA. Elena Quezada', 'pos' => 'Vicerrectora Académica', 'img' => asset('assets/img/institucion/autoridades/ELENA-QUEZADA.png'), 'email' => 'elena.quezada@superarse.edu.ec'],
            ['id' => 'node-dir-docencia', 'name' => 'Lic. Carolina Baquero', 'pos' => 'Dirección de Docencia', 'img' => asset('assets/img/institucion/autoridades/CAROLINA-BAQUERO.png'), 'email' => 'carolina.baquero@superarse.edu.ec'],
            ['id' => 'node-dir-invest', 'name' => 'Ing. Josue Tello', 'pos' => 'Dir. Investigación Desarrollo e Innovación', 'img' => asset('assets/img/institucion/autoridades/JOSUE-TELLO.png'), 'email' => 'josue.tello@superarse.edu.ec'],
            ['id' => 'node-dir-vinc', 'name' => 'Ing. Edison Aucay', 'pos' => 'Dir. Vinculación con la Sociedad', 'img' => asset('assets/img/institucion/autoridades/EDISON-AUCAY.png'), 'email' => 'aseguramiento.calidad@superarse.edu.ec'],
            ['id' => 'node-admin', 'name' => 'Msc. Ramiro Obando', 'pos' => 'Dir. Administrativo Fin.', 'img' => asset('assets/img/institucion/autoridades/RAMIRO-OBANDO.png'), 'email' => 'ramiro.obando@superarse.edu.ec'],
            ['id' => 'node-infra', 'name' => 'Lic. Iván Tamayo', 'pos' => 'Dir. Infraestructura', 'img' => asset('assets/img/institucion/autoridades/Ivan_Tamayo.png'), 'email' => 'ivan.tamayo@superarse.edu.ec'],
            ['id' => 'node-comer', 'name' => 'Mgtr. Israel Proaño', 'pos' => 'Dirección Comercial', 'img' => asset('assets/img/institucion/autoridades/ISRAEL-PROANO.png'), 'email' => 'israel.proano@nexodigitalmark.com'],
            ['id' => 'coor-comer', 'name' => 'Mgtr. Israel Proaño', 'pos' => 'Coor. Comunicación Estratégica', 'img' => asset('assets/img/institucion/autoridades/ISRAEL-PROANO.png'), 'email' => 'israel.proano@nexodigitalmark.com'],
            ['id' => 'coor-admin', 'name' => 'Ing. Katheryn Guaman ', 'pos' => 'Coor. Escuela de Ciencias Sociales, Empresariales y Tecnológicas ECSET', 'img' => asset('assets/img/institucion/autoridades/KATHERINE- GUAMAN.png'), 'email' => 'katheryn.guaman@superarse.edu.ec'],
            ['id' => 'coor-vet', 'name' => 'Mvz. Francisco Velastegui', 'pos' => 'Coor. Escuela de Ciencias Agropecuarias y Veterinarias ECAVET', 'img' => asset('assets/img/institucion/autoridades/FRANCISCO-VELASTEGUI.png'), 'email' => 'francisco.velastegui@superarse.edu.ec'],
            ['id' => 'coor-const', 'name' => 'Arq. Daniela Tamayo', 'pos' => 'Coor. Escuela Construcción y Extracción Sostenible ECSOS', 'img' => asset('assets/img/institucion/autoridades/DANIELA-TAMAYO.png'), 'email' => 'daniela.tamayo@superarse.edu.ec'],
            ['id' => 'coor-diseno', 'name' => 'Mgtr. Jenny Siza', 'pos' => 'Coor. Diseño Curricular', 'img' => asset('assets/img/institucion/autoridades/JENNY-SIZA.png'), 'email' => 'jenny.siza@superarse.edu.ec'],
           // ['id' => 'coor-rel', 'name' => 'Arq. Jean Landazuri', 'pos' => 'Coor. Relaciones Interinst.', 'img' => asset('assets/img/institucion/autoridades/JEAN-PAUL.png'), 'email' => 'infraestructura@superarse.edu.ec'],
            ['id' => 'coor-calidad', 'name' => 'Ing. Edison Aucay', 'pos' => 'Coor. Aseguramiento Calidad', 'img' => asset('assets/img/institucion/autoridades/EDISON-AUCAY.png'), 'email' => 'aseguramiento.calidad@superarse.edu.ec'],
            ['id' => 'coor-th', 'name' => 'Lic. Jessica Flores', 'pos' => 'Coor. Talento Humano', 'img' => asset('assets/img/institucion/autoridades/JESSICA-FLORES.png'), 'email' => 'dayana.flores@superarse.edu.ec'],
            ['id' => 'coor-bien', 'name' => 'Lic. Nicolas Ponce', 'pos' => 'Coor. Bienestar', 'img' => asset('assets/img/institucion/autoridades/NICOLAS-PONCE.png'), 'email' => 'asistencia.bienestar@superarse.edu.ec'],
            ['id' => 'coor-biblio', 'name' => 'Tnlga. Nathaly Ortiz', 'pos' => 'Coor. Biblioteca', 'img' => asset('assets/img/institucion/autoridades/NATALY-ORTIZ.png'), 'email' => 'nathaly.Ortiz@superarse.edu.ec'],
            ['id' => 'coor-tics', 'name' => 'Tnlgo. Matias Valdivieso', 'pos' => 'Coor. TICS', 'img' => asset('assets/img/institucion/autoridades/MATIAS-VALDIVIEZO.png'), 'email' => 'matias.valdivieso@superarse.edu.ec'],
            ['id' => 'coor-com-est', 'name' => 'Mgtr. Luis Granja', 'pos' => 'Coor. Admisiones', 'img' => asset('assets/img/institucion/autoridades/LUIS-GRANJA.png'), 'email' => 'luis.granja@superarse.edu.ec'],
            ['id' => 'coor-fin', 'name' => 'Tnlga.Mariela Anchundia ', 'pos' => 'Finanzas y Contabilidad', 'img' => asset('assets/img/institucion/autoridades/Mariela-Anchundia.png'), 'email' => 'mariela.anchundia@superarse.edu.ec'],
        ];
    }

    /**
     * Devuelve las autoridades indexadas por id para facilitar el render en la vista.
     *
     * @return array<string, array{id: string, name: string, pos: string, img: string, email: string}>
     */
    public function authoritiesById(): array
    {
        $indexed = [];

        foreach ($this->authorities() as $authority) {
            $indexed[$authority['id']] = $authority;
        }

        return $indexed;
    }
}