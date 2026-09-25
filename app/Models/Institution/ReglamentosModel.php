<?php

declare(strict_types=1);

namespace App\Models\Institution;

final class ReglamentosModel
{
    public function kicker(): string
    {
        return 'MARCO NORMATIVO Y LEGAL';
    }

    public function title(): string
    {
        return 'Nuestros Reglamentos Institucionales';
    }

    public function intro(): string
    {
        return 'Explore el marco normativo que rige las actividades y la vida institucional.';
    }

    public function tip(): string
    {
        return 'Haga clic en cada título para visualizar el documento directamente en la página.';
    }

    /**
     * @return array<int, array{title: string, id: string, filePath: string}>
     */
    public function regulations(): array
    {
        return [
            ['title' => 'Reglamento: Gestión Interna de Biblioteca', 'id' => 'biblioteca', 'filePath' => asset('assets/docs/institucion/reglamentos/REGLAMENTO_DE_GESTION_INTERNA_DE_LA_BIBLIOTECA_DRA_MERY_NAVAS.pdf')],
            ['title' => 'Reglamento: Educación Continua', 'id' => 'educacionContinua', 'filePath' => asset('assets/docs/institucion/reglamentos/REGLAMENTO DE EDUCACION CONTINUA.pdf')],
            ['title' => 'Reglamento: Investigación, Desarrollo e Innovación', 'id' => 'investigacion', 'filePath' => asset('assets/docs/institucion/reglamentos/REGLAMENTO DE INVESTIGACION, DESARROLLO E INNOVACION.pdf')],
            ['title' => 'Reglamento: Vinculación con la Sociedad', 'id' => 'vinculacion', 'filePath' => asset('assets/docs/institucion/reglamentos/REGLAMENTO_DE_VINCULACION_CON_LA_SOCIEDAD.pdf')],
            ['title' => 'Reglamento: Procedimiento de Suscripción y Seguimiento', 'id' => 'suscripcion', 'filePath' => asset('assets/docs/institucion/reglamentos/REGLAMENTO PARA EL PROCEDIMIENTO DE SUSCRIPCION Y SEGUIMIENTO.pdf')],
            ['title' => 'Reglamento: Uso de EVA', 'id' => 'eva', 'filePath' => asset('assets/docs/institucion/reglamentos/REGLAMENTO PARA EL USO DEL ENTORNO VIRTUAL DE APRENDIZAJE EVA.pdf')],
            ['title' => 'Reglamento: Formación Práctica Académica', 'id' => 'formacionPractica', 'filePath' => asset('assets/docs/institucion/reglamentos/REGLAMENTO PARA LA FORMACION PRACTICA EN EL ENTORNO ACADEMICO.pdf')],
            ['title' => 'Reglamento: Comité de Bioética', 'id' => 'bioetica', 'filePath' => asset('assets/docs/institucion/reglamentos/REGLAMENTO_ DEL_ COMITE_DE_BIOETICA.pdf')],
            ['title' => 'Reglamento: Aseguramiento Interno de Calidad', 'id' => 'calidadInterna', 'filePath' => asset('assets/docs/institucion/reglamentos/REGLAMENTO_DE_ASEGURAMIENTO_INTERNO_DE_LA_CALIDAD.pdf')],
            ['title' => 'Reglamento: Capacitación y Perfeccionamiento', 'id' => 'capacitacion', 'filePath' => asset('assets/docs/institucion/reglamentos/REGLAMENTO DE CAPACITACION Y PERFECCIONAMIENTO PROFESIONAL.pdf')],
            ['title' => 'Reglamento: Seguimiento a Graduados', 'id' => 'graduados', 'filePath' => asset('assets/docs/institucion/reglamentos/REGLAMENTO DE SEGUIMIENTO A LOS GRADUADOS.pdf')],
            ['title' => 'Reglamento: Titulación', 'id' => 'titulacion', 'filePath' => asset('assets/docs/institucion/reglamentos/REGLAMENTO DE TITULACION.pdf')],
            ['title' => 'Reglamento: Comité Editorial', 'id' => 'editorial', 'filePath' => asset('assets/docs/institucion/reglamentos/REGLAMENTO DEL COMITE_EDITORIAL.pdf')],
            ['title' => 'Reglamento: Consejo de Regentes', 'id' => 'regentes', 'filePath' => asset('assets/docs/institucion/reglamentos/REGLAMENTO DEL CONSEJO DE REGENTES.pdf')],
            ['title' => 'Reglamento: Repositorio Documental SIG', 'id' => 'repositorio', 'filePath' => asset('assets/docs/institucion/reglamentos/REGLAMENTO DEL REPOSITORIO DOCUMENTAL SIG.pdf')],
            ['title' => 'Reglamento: Planificación Estratégica y Operativa', 'id' => 'planificacion', 'filePath' => asset('assets/docs/institucion/reglamentos/REGLAMENTO DEL SISTEMA DE PLANIFICACION ESTRATEGICA Y OPERATIVA.pdf')],
            ['title' => 'Reglamento: Sistema de Seguimiento, Control y Evaluación', 'id' => 'seguimientoControl', 'filePath' => asset('assets/docs/institucion/reglamentos/REGLAMENTO DE SISTEMA DE SEGUIMIENTO CONTROL Y EVALUACION.pdf')],
            ['title' => 'Reglamento: Elecciones Consejo Estudiantil', 'id' => 'elecciones', 'filePath' => asset('assets/docs/institucion/reglamentos/REGLAMENTO DE ELECCIONES CONSEJO ESTUDIANTIL.pdf')],
            ['title' => 'Reglamento de Estudiantes', 'id' => 'estudiantes', 'filePath' => asset('assets/docs/institucion/reglamentos/REGLAMENTO DE ESTUDIANTES.pdf')],
            ['title' => 'Reglamento: Políticas de Acción Afirmativa', 'id' => 'accionAfirmativa', 'filePath' => asset('assets/docs/institucion/reglamentos/REGLAMENTO DE POLITICAS DE ACCION AFIRMATIVA.pdf')],
            ['title' => 'Reglamento: Prácticas Preprofesionales', 'id' => 'preprofesionales', 'filePath' => asset('assets/docs/institucion/reglamentos/REGLAMENTO DE PRACTICAS PRE-PROFESIONALES.pdf')],
            ['title' => 'Reglamento: Reconocimiento u Homologación', 'id' => 'homologacion', 'filePath' => asset('assets/docs/institucion/reglamentos/REGLAMENTO DE RECONOCIMIENTO U HOMOLOGACION.pdf')],
            ['title' => 'Reglamento: Admisión, Matriculación y Nivelación', 'id' => 'admision', 'filePath' => asset('assets/docs/institucion/reglamentos/REGLAMENTO DE ADMISION, MATRICULACION, NIVELACION.pdf')],
            ['title' => 'Reglamento: Becas y Ayudas Económicas', 'id' => 'becas', 'filePath' => asset('assets/docs/institucion/reglamentos/Reglamento de becas y ayudas económicas.pdf')],
            ['title' => 'Reglamento: Buenas Prácticas Ambientales', 'id' => 'ambientales', 'filePath' => asset('assets/docs/institucion/reglamentos/REGLAMENTO DE BUENAS PRACTICAS AMBIENTALES.pdf')],
            ['title' => 'Reglamento: Carrera y Escalafón Personal Académico', 'id' => 'escalafon', 'filePath' => asset('assets/docs/institucion/reglamentos/REGLAMENTO DE CARRERA Y ESCALAFON DEL PERSONAL ACADEMICO.pdf')],
        ];
    }
}