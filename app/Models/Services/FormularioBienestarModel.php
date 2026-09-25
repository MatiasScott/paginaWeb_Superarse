<?php
declare(strict_types=1);

namespace App\Models\Services;

class FormularioBienestarModel
{
    public function periodos(): array
    {
        return [
            'MAY-OCT26'   => 'PAO MAY-OCT 2026',
            'NOV26-ABR27' => 'PAO NOV 2026-ABR 2027',
        ];
    }

    public function carreras(): array
    {
        return [
            'Topografía con Nivel Equivalente a Tecnología Superior',
            'Mineria',
            'Seguridad y Prevención de Riesgos Laborales',
            'Enfermería Veterinaria',
            'Producción Animal',
            'Administración',
            'Marketing Digital',
            'Marketing Digital y Diseño Multimedia',
            'Ventas estratégicas con inteligencia artificial',
            'Instrumentación Quirúrgica',
            'Educacion Básica',
            'Educación Bilingüe',
        ];
    }

    public function niveles(): array
    {
        return ['Primer', 'Segundo', 'Tercero', 'Cuarto'];
    }

    public function tiposBeca(): array
    {
        return [
            'excelencia_bachillerato'  => ['Excelencia Académica', 'Mérito académico en bachillerato.'],
            'excelencia_institucional' => ['Excelencia Académica', 'Mérito académico institucional.'],
            'socioeconomica'           => ['Socioeconómica', 'Apoyo solidario.'],
            'desempleo'                => ['Socioeconómica', 'Desempleo.'],
            'escasez'                  => ['Socioeconómica', 'Escasez de recursos económicos.'],
            'familiar'                 => ['Socioeconómica', 'Familiar.'],
            'migrantes'                => ['Socioeconómica', 'Migrantes o refugiados.'],
            'politica'                 => ['Socioeconómica', 'Política de cuotas.'],
            'discapacidad'             => ['Inclusión o Inclusiva', 'Discapacidad.'],
            'enfermedades'             => ['Inclusión o Inclusiva', 'Enfermedades catastróficas.'],
            'pueblos'                  => ['Inclusión o Inclusiva', 'Pueblos y Nacionalidades del Ecuador.'],
            'futuro_femenino'          => ['Inclusión o Inclusiva', 'Género.'],
            'deportivo_cultural'       => ['Especial', 'Mérito Deportivo o Cultural.'],
            'educacion_continua'       => ['Especial', 'Educación continua.'],
            'clubes'                   => ['Especial', 'Clubes Institucionales.'],
            'colaborativa'             => ['Especial', 'Colaborativa.'],
            'superarse'                => ['Especial', 'Beca Superarse.'],
            'institucionales'          => ['Especial', 'Convenios Institucionales.'],
        ];
    }

    public function tiposBecaAgrupados(): array
    {
        $grupos = [];
        foreach ($this->tiposBeca() as $key => $tipo) {
            $categoria = $tipo[0];
            if (!isset($grupos[$categoria])) {
                $grupos[$categoria] = [];
            }
            $grupos[$categoria][] = ['justificacion' => $tipo[1], 'clave' => $key];
        }
        return $grupos;
    }

    public function header(): array
    {
        return [
            'titulo'       => 'FICHA SOLICITUD BECA',
            'institucional' => 'BIENESTAR INSTITUCIONAL',
            'version'      => 'VERSIÓN: 001',
            'codigo'       => 'CÓDIGO: ISTS-GBI-001-001',
            'fecha'        => 'FECHA: 04/04/2024',
        ];
    }

    public function datosInstitucionales(): array
    {
        return [
            'rectora'   => 'Ing. Verónica Tamayo, MSc.',
            'instituto' => 'INSTITUTO SUPERIOR TECNOLÓGICO SUPERARSE',
            'cargo'     => 'Rectora',
            'emailDestino' => 'informacion@superarse.edu.ec',
            'direccion' => 'Dirección: Av. General Rumiñahui e Isla Pinta 1111, a media cuadra del San Luis Shopping',
            'contacto'  => 'Teléfono: (02) 393-0980 | www.superarse.edu.ec',
        ];
    }

    public function logoPath(): string
    {
        return ROOT_PATH . '/assets/img/services/formularioBienestar/Logo-Superarse-Negativo.png';
    }
}