<?php

declare(strict_types=1);

namespace App\Models\VinculacionConLaSociedad;

final class RelacionesInterinstitucionalesModel
{
    public function kicker(): string
    {
        return 'RELACIONES';
    }

    public function title(): string
    {
        return 'Coordinación de Relaciones Inter-Institucionales';
    }

    /**
     * @return array<int, array{imagen: string, alt: string}>
     */
    public function carrusel(): array
    {
        return [
            ['imagen' => asset('assets/img/RelacionesInterInstitucionales/carrusel/T01.png'), 'alt' => 'Relación InterInstitucional 1'],
            ['imagen' => asset('assets/img/RelacionesInterInstitucionales/carrusel/T02.png'), 'alt' => 'Relación InterInstitucional 2'],
            ['imagen' => asset('assets/img/RelacionesInterInstitucionales/carrusel/T03.png'), 'alt' => 'Relación InterInstitucional 3'],
            ['imagen' => asset('assets/img/RelacionesInterInstitucionales/carrusel/T04.png'), 'alt' => 'Relación InterInstitucional 4'],
            ['imagen' => asset('assets/img/RelacionesInterInstitucionales/carrusel/T05.png'), 'alt' => 'Relación InterInstitucional 5'],
            ['imagen' => asset('assets/img/RelacionesInterInstitucionales/carrusel/T06.png'), 'alt' => 'Relación InterInstitucional 6'],
        ];
    }

    /**
     * @return array<int, array{url: string, alt: string}>
     */
    public function conveniosInstituciones(): array
    {
        return [
            ['url' => asset('assets/img/RelacionesInterInstitucionales/conveniosInstitucionales/002.png'), 'alt' => 'Imagen de Convenio 1'],
            ['url' => asset('assets/img/RelacionesInterInstitucionales/conveniosInstitucionales/004.png'), 'alt' => 'Imagen de Convenio 2'],
            ['url' => asset('assets/img/RelacionesInterInstitucionales/conveniosInstitucionales/017.png'), 'alt' => 'Imagen de Convenio 3'],
            ['url' => asset('assets/img/RelacionesInterInstitucionales/conveniosInstitucionales/020.png'), 'alt' => 'Imagen de Convenio 4'],
            ['url' => asset('assets/img/RelacionesInterInstitucionales/conveniosInstitucionales/022.png'), 'alt' => 'Imagen de Convenio 5'],
            ['url' => asset('assets/img/RelacionesInterInstitucionales/conveniosInstitucionales/023.png'), 'alt' => 'Imagen de Convenio 6'],
            ['url' => asset('assets/img/RelacionesInterInstitucionales/conveniosInstitucionales/024.png'), 'alt' => 'Imagen de Convenio 7'],
            ['url' => asset('assets/img/RelacionesInterInstitucionales/conveniosInstitucionales/025.png'), 'alt' => 'Imagen de Convenio 8'],
            ['url' => asset('assets/img/RelacionesInterInstitucionales/conveniosInstitucionales/027.png'), 'alt' => 'Imagen de Convenio 9'],
            ['url' => asset('assets/img/RelacionesInterInstitucionales/conveniosInstitucionales/034.png'), 'alt' => 'Imagen de Convenio 10'],
        ];
    }

    /**
     * @return array<int, array{url: string, alt: string}>
     */
    public function conveniosEmpresas(): array
    {
        return [
            ['url' => asset('assets/img/RelacionesInterInstitucionales/conveniosEmpresas/006.png'), 'alt' => 'Imagen de Otro Carrusel 1'],
            ['url' => asset('assets/img/RelacionesInterInstitucionales/conveniosEmpresas/007.png'), 'alt' => 'Imagen de Otro Carrusel'],
            ['url' => asset('assets/img/RelacionesInterInstitucionales/conveniosEmpresas/CAMARA DE COMERCIO PM.png'), 'alt' => 'Imagen de Otro Carrusel 3'],
            ['url' => asset('assets/img/RelacionesInterInstitucionales/conveniosEmpresas/009.png'), 'alt' => 'Imagen de Otro Carrusel 4'],
            ['url' => asset('assets/img/RelacionesInterInstitucionales/conveniosEmpresas/018.png'), 'alt' => 'Imagen de Otro Carrusel 5'],
            ['url' => asset('assets/img/RelacionesInterInstitucionales/conveniosEmpresas/019.png'), 'alt' => 'Imagen de Otro Carrusel 6'],
            ['url' => asset('assets/img/RelacionesInterInstitucionales/conveniosEmpresas/029.png'), 'alt' => 'Imagen de Otro Carrusel 7'],
            ['url' => asset('assets/img/RelacionesInterInstitucionales/conveniosEmpresas/031.png'), 'alt' => 'Imagen de Otro Carrusel 8'],
            ['url' => asset('assets/img/RelacionesInterInstitucionales/conveniosEmpresas/032.png'), 'alt' => 'Imagen de Otro Carrusel 9'],
            ['url' => asset('assets/img/RelacionesInterInstitucionales/conveniosEmpresas/035.png'), 'alt' => 'Imagen de Otro Carrusel 10'],
            ['url' => asset('assets/img/RelacionesInterInstitucionales/conveniosEmpresas/CERAMICAS AL COSTO.png'), 'alt' => 'Imagen de Otro Carrusel 11'],
            ['url' => asset('assets/img/RelacionesInterInstitucionales/conveniosEmpresas/CLUB DEPORTIVO LOS MILLONARIOS.png'), 'alt' => 'Imagen de Otro Carrusel 12'],
            ['url' => asset('assets/img/RelacionesInterInstitucionales/conveniosEmpresas/COAC AHORRISTA SOLIDARIO.jpg'), 'alt' => 'Imagen de Otro Carrusel 13'],
            ['url' => asset('assets/img/RelacionesInterInstitucionales/conveniosEmpresas/GAD DE COTACACHI.png'), 'alt' => 'Imagen de Otro Carrusel 14'],
        ];
    }

    /**
     * @return array<int, array{url: string, alt: string}>
     */
    public function conveniosRedes(): array
    {
        return [
            ['url' => asset('assets/img/RelacionesInterInstitucionales/Riest/008.png'), 'alt' => 'Imagen de Otro Carrusel 1'],
            ['url' => asset('assets/img/RelacionesInterInstitucionales/Riest/030.png'), 'alt' => 'Imagen de Otro Carrusel 2'],
            ['url' => asset('assets/img/RelacionesInterInstitucionales/Riest/AIPE.jpg'), 'alt' => 'Imagen de Otro Carrusel 3'],
        ];
    }
}