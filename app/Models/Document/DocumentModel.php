<?php

declare(strict_types=1);

namespace App\Models\Document;

use App\Core\BaseDocumentModel;

class DocumentModel extends BaseDocumentModel
{
    protected array $documents = [
        // Calendarios
        '/CALENDARIO_ACADEMICO' => 'assets/docs/Calendarios/CALENDARIO_ACADEMICO/Calendario_Academico_PAO_Mayo_Octubre_2026.2.pdf',
        '/CALENDARIO_DE_TITULACION' => 'assets/docs/Titulacion/CRONOGRAMA_TRABAJO_TITULACION/Cronograma_trabajo_titulacion.pdf',
        '/CALENDARIO_INVESTIGACION' => 'assets/docs/Calendarios/CALENDARIO_INVESTIGACION/PLANIFICACION_GESTION_INVESTIGACION_2026.pdf',
        '/CALENDARIO_VINCULACION' => 'assets/docs/Calendarios/CALENDARIO_VINCULACION/CRONOGRAMA_VINCULACION_SOCIEDAD_2025.pdf',
        '/CALENDARIO_PRACTICAS_PREPROFESIONALES' => 'assets/docs/Calendarios/CALENDARIO_PRACTICAS_PREPROFESIONALES/CRONOGRAMA_PRACTICAS_PREPROFESIONALES_2025_2026.pdf',
        // Institucional PDFs
        '/POA' => 'assets/docs/POA/PLAN_OPERATIVO_ANUAL_2025.pdf',
        '/modeloPedagogico' => 'assets/docs/institucion/modeloPedagogico/MODELO_PEDAGOGICO.pdf',
        '/Autoevaluacion' => 'assets/docs/Autoevaluacion/INFORME_FINAL_AUTOEV_NOV_2024.pdf',
        '/PEDI' => 'assets/docs/Servicios/PEDI/PLAN_ESTRATEGICO_DE_DESARROLLO_INSTITUCIONAL_2024_2028.pdf',
        '/estadoFinanciero' => 'assets/docs/Servicios/estadoFinanciero/ESTADO_FINANCIERO.pdf',
        '/rendicionCuentas' => 'assets/docs/Servicios/rendicionCuentas/UX_INFORME_DE_RENDICION_DE_CUENTAS_2024.pdf',
        '/remuneracionMensual' => 'assets/docs/Servicios/remuneracionMensual/ESCALA_DE_REMUNERACION.pdf',
        '/IESS' => 'assets/docs/Servicios/IESS/CUMPLIMIENTO-IESS.pdf',
        '/CumplimientoTributario' => 'assets/docs/Servicios/CumplimientoTributario/Certificado_Cumplimiento_Tributario_2026.pdf',
        '/bancesAuditados' => 'assets/docs/Servicios/bancesAuditados/INFORME-DE-AUDITORIA-2024-1.pdf',
        '/Protocolo_Psicopedagogico' => 'assets/docs/institucion/Protocolo_Psicopedagogico/PROTOCOLO_ATENCION_PSICOPEDAGOGICA_ESTUDIANTES.pdf',
        '/Protocolo_de_integracion' => 'assets/docs/institucion/Protocolo_de_integracion/PROTOCOLO_INTEGRACION_ESTUDIANTES.pdf',
        // Mallas ECSOS
        '/TOPO' => 'assets/docs/gestionAcademica/TOPO/MALLATOPOGRAFIA.pdf',
        '/MINERIA' => 'assets/docs/gestionAcademica/MINERIA/MALLA_MINERIA.pdf',
        '/SEGURIDAD_E_HIGIENE_DEL_TRABAJO' => 'assets/docs/gestionAcademica/SEGURIDAD_E_HIGIENE_DEL_TRABAJO/MALLA_SEGURIDAD_HIGIENE_TRABAJO.pdf',
        '/SEGURIDAD_PREVENCION_RIESGOS_LABORALES' => 'assets/docs/gestionAcademica/SEGURIDAD_PREVENCION_RIESGOS_LABORALES/MALLA_PREVENCION_RIESGOS_LABORALES.pdf',
        // ECAVET
        '/ENFERMERIA_VETERINARIA' => 'assets/docs/gestionAcademica/ENFERMERIA_VETERINARIA/MALLA_ENFERMERIA_VETERINARIA.pdf',
        '/PRODUCCION_ANIMAL' => 'assets/docs/gestionAcademica/PRODUCCION_ANIMAL/MALLA_PRODUCCION_ANIMAL.pdf',
        // ECSET
        '/ADMINISTRACION' => 'assets/docs/gestionAcademica/ADMINISTRACION/MALLA_ADMINISTRACION.pdf',
        '/MARKETING_DIGITAL' => 'assets/docs/gestionAcademica/MARKETING_DIGITAL/MALLA_MARKETING_DIGITAL_2026.pdf',
'/MARKETING_DISEÑO_MULTIMEDIA' => 'assets/docs/gestionAcademica/MARKETING_DISEÑO_MULTIMEDIA/MALLA_MARKETING_DIGITAL_DISENO_MULTIMEDIA_2026.pdf',
        '/VENTAS_CON_IA' => 'assets/docs/gestionAcademica/VENTAS_CON_IA/Malla_de_ventas_IA.pdf',
        '/INSTRUMENTACION_QUIRURGICA' => 'assets/docs/gestionAcademica/INSTRUMENTACION_QUIRURGICA/MALLA_CURRICULAR_INSTRUMENTACION_QUIRURGICA.pdf',
        '/EDUCACION_BASICA' => 'assets/docs/gestionAcademica/EDUCACION_BASICA/MALLA_EDUCACION_BASICA.pdf',
        '/EDUCACION_BILINGUE' => 'assets/docs/gestionAcademica/EDUCACION_BILINGUE/MALLA_EDUCACION_BILINGUE.pdf',
        '/ENFERMERIA' => 'assets/docs/gestionAcademica/ENFERMERIA/MALLA_CURRICULAR_ENFERMERIA.pdf',
        // Bienestar
        '/GUIA_DEL_REGLAMENTO_BECAS' => 'assets/docs/BienestarEstudiantil/GUIA_DEL_REGLAMENTO_BECAS/Guia_de_Becas_Ayudas_Economicas.pdf',
        '/FICHA_SOCIOECONOMICA' => 'assets/docs/BienestarEstudiantil/FICHA_SOCIOECONOMICA/FICHA_SOCIOECONOMICA_V1.pdf',
        '/PLAN_IGUALDAD_2024' => 'assets/docs/BienestarEstudiantil/Plan-Igualdad/PLAN_IGUALDAD_2024/PLAN_DE_IGUALDAD_2024.pdf',
        '/PLAN_IGUALDAD_2025' => 'assets/docs/BienestarEstudiantil/Plan-Igualdad/PLAN_IGUALDAD_2025/PLAN_DE_IGUALDAD_2025.pdf',
        '/PLAN_IGUALDAD_2026' => 'assets/docs/BienestarEstudiantil/Plan-Igualdad/PLAN_IGUALDAD_2026/PLAN_DE_IGUALDAD_2026.pdf',
        // Titulación
        '/REGLAMENTO_TITULACION' => 'assets/docs/Titulacion/REGLAMENTO_TITULACION/Reglamento_Titulacion.pdf',
        '/CRONOGRAMA_TRABAJO_TITULACION' => 'assets/docs/Titulacion/CRONOGRAMA_TRABAJO_TITULACION/Cronograma_trabajo_titulacion.pdf',
        '/PLAN_TRABAJO_TITULACION' => 'assets/docs/Titulacion/PLAN_TRABAJO_TITULACION/Plan_Trabajo_Titulacion.docx',
        '/REGISTRO_HORAS_TUTORIAS' => 'assets/docs/Titulacion/REGISTRO_HORAS_TUTORIAS/Registro_horas_tutorias_Titulacion.xlsx',
        '/FORMATO_TRABAJO_TITULACION' => 'assets/docs/Titulacion/FORMATO_TRABAJO_TITULACION/Formato_trabajo_titulacion.docx',
        '/CALENDARIO_EXAMEN_COMPLEXIVO' => 'assets/docs/Titulacion/CALENDARIO_EXAMEN_COMPLEXIVO/Cronograma_examen_complexivo.pdf',
        // Talento Humano
        '/Induccion' => 'assets/docs/TalentoHumano/Induccion/Bienvenido_familia_Superarse.pdf',
        // Seguridad
        '/MATRIZ_DE_RIESGO' => 'assets/docs/SeguridadyPlanOcupacional/MATRIZ_DE_RIESGO/Matriz_de_Riesgos.pdf',
        '/PLAN_DE_EMERGENCIA' => 'assets/docs/SeguridadyPlanOcupacional/PLAN_DE_EMERGENCIA/Plan_de_emergencia.pdf',
        '/REGLAMENTO' => 'assets/docs/SeguridadyPlanOcupacional/REGLAMENTO/Reglamento.pdf',
        // Vinculación / Prácticas
        '/Vinculacion' => 'assets/docs/Vinculacion/Modelo_Gestion_IDIVS_2024_2028.pdf',
        '/PracticasPreprofesionales' => 'assets/docs/PracticasPreprofesionales/REGLAMENTO-PRACTICAS-PRE-PROFESIONALES.pdf',
        '/Relaciones-Inter-Institucionales' => 'assets/docs/Relaciones-Inter-Institucionales/ISTS-GIDIVS-07-004-CONVENIO-MARCO-FORMATO.pdf',
        // Investigación
        '/MODELO_INVESTIGACION' => 'assets/docs/Investigacion/MODELO_INVESTIGACION/MODELO_DE_GESTION_DE_LA_INVESTIGACION_DESARROLLO_INNOVACION.pdf',
        '/REGLAMENTO_DE_INVESTIGACION' => 'assets/docs/Investigacion/REGLAMENTO_DE_INVESTIGACION/REGLAMENTO_DE_INVESTIGACION_DESARROLLO_E_INNOVACION.pdf',
        '/DOMINIOS_ACADEMICOS' => 'assets/docs/Investigacion/DOMINIOS_ACADEMICOS/Dominios_Academicos_de_Investigacion_2024_2028.pdf',
        '/PLANIFICACION_GESTION_INVESTIGACION' => 'assets/docs/Investigacion/PLANIFICACION_GESTION_INVESTIGACION/Planificacion_gestion_Investigacion_2025.pdf',
        '/ESTUDOS_EM_CIENCIAS_AGRARIAS' => 'assets/docs/Investigacion/ESTUDOS_EM_CIENCIAS_AGRARIAS/Estudio_em_Ciencias_agrarias.pdf',
        '/CONGRESO_ITPS_ODS' => 'assets/docs/Investigacion/CONGRESO_ITPS_ODS/ITPS_ODS.pdf',
        '/HUMANIDADES_E_CIENCIAS_SOCIAIS' => 'assets/docs/Investigacion/HUMANIDADES_E_CIENCIAS_SOCIAIS/humanidades-e-ciencias-sociais-perspectivas.pdf',
        '/TOPOGRAFIA_SUBTERRANEA' => 'assets/docs/Investigacion/TOPOGRAFIA_SUBTERRANEA/LIBRO_TOPOGRAFIA_SUBTERRANEA.pdf',
    ];
}

