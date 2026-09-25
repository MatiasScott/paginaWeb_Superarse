<?php

declare(strict_types=1);

namespace App\Models\Institution;

final class ArancelesModel
{
    public function kicker(): string
    {
        return 'INFORMACIÓN ECONÓMICA';
    }

    public function title(): string
    {
        return 'Aranceles Institucionales';
    }

    /**
     * @return array<int, array{titulo: string, descripcion: string, url: string}>
     */
    public function aranceles(): array
    {
        return [
            ['titulo' => 'Aranceles: Administración', 'descripcion' => 'Consulta los aranceles correspondientes a la carrera de Administración.', 'url' => asset('assets/docs/Servicios/aranceles/Administracion_2026.jpg')],
            ['titulo' => 'Aranceles: Educación Básica', 'descripcion' => 'Consulta los aranceles específicos para la carrera de Educación Básica.', 'url' => asset('assets/docs/Servicios/aranceles/Educacion_basica_2026.jpg')],
            ['titulo' => 'Aranceles: Educación Bilingüe', 'descripcion' => 'Encuentra el detalle de los aranceles para la carrera de Educación Bilingüe.', 'url' => asset('assets/docs/Servicios/aranceles/Educacion_Bilingue_2026.jpg')],
            ['titulo' => 'Aranceles: Enfermería Veterinaria', 'descripcion' => 'Información sobre los aranceles de la carrera de Enfermería Veterinaria.', 'url' => asset('assets/docs/Servicios/aranceles/Enfermeria_Veterinaria_2026.jpg')],
            ['titulo' => 'Aranceles: Instrumentación Quirúrgica', 'descripcion' => 'Consulta los aranceles para la carrera de Instrumentación Quirúrgica.', 'url' => asset('assets/docs/Servicios/aranceles/Instrumentacion_Quirurgica_2026.jpg')],
            ['titulo' => 'Aranceles: Marketing Digital', 'descripcion' => 'Detalle de los aranceles correspondientes a la carrera de Marketing Digital.', 'url' => asset('assets/docs/Servicios/aranceles/Marketing_digital_2026.jpg')],
            ['titulo' => 'Aranceles: Minería', 'descripcion' => 'Información sobre los aranceles aplicables a la carrera de Minería.', 'url' => asset('assets/docs/Servicios/aranceles/Mineria_2026.jpg')],
            ['titulo' => 'Aranceles: Producción Animal', 'descripcion' => 'Accede a los aranceles para la carrera de Producción Animal.', 'url' => asset('assets/docs/Servicios/aranceles/Produccion_animal_2026.jpg')],
            ['titulo' => 'Aranceles: Seguridad y Riesgos Laborales', 'descripcion' => 'Consulta los aranceles para Seguridad y Prevención de Riesgos Laborales.', 'url' => asset('assets/docs/Servicios/aranceles/Seguridad_prevencion_riesgos_2026.jpg')],
            ['titulo' => 'Aranceles: Topografía', 'descripcion' => 'Consulta los aranceles para Topografía.', 'url' => asset('assets/docs/Servicios/aranceles/Arancel_Topografia_2026.jpg')],
            ['titulo' => 'Aranceles Ventas Estratégicas con IA', 'descripcion' => 'Documento que detalla los derechos y aranceles generales de la institución.', 'url' => asset('assets/docs/Servicios/aranceles/Ventas_IA_2026.jpg')],
            ['titulo' => 'Aranceles Marketing Digital y Diseño Multimedia', 'descripcion' => 'Documento que detalla los derechos y aranceles generales de la institución.', 'url' => asset('assets/docs/Servicios/aranceles/MarketingD_DiseñoM_2026.jpg')],
            ['titulo' => 'Aranceles de Seguridad e Higiene del Trabajo', 'descripcion' => 'Documento que detalla los derechos y aranceles generales de la institución.', 'url' => asset('assets/docs/Servicios/aranceles/Higiene_trabajo_2026.jpg')],
        ];
    }
}