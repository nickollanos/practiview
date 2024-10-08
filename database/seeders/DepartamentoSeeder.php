<?php

namespace Database\Seeders;

use App\Models\Departamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departamentos = [
            ['nombre' => 'Amazonas', 'municipio_id' => 1],
            ['nombre' => 'Antioquia', 'municipio_id' => 2],
            ['nombre' => 'Antioquia', 'municipio_id' => 3],
            ['nombre' => 'Antioquia', 'municipio_id' => 4],
            ['nombre' => 'Antioquia', 'municipio_id' => 5],
            ['nombre' => 'Atlántico', 'municipio_id' => 6],
            ['nombre' => 'Atlántico', 'municipio_id' => 7],
            ['nombre' => 'Atlántico', 'municipio_id' => 8],
            ['nombre' => 'Atlántico', 'municipio_id' => 9],
            ['nombre' => 'Bolívar', 'municipio_id' => 10],
            ['nombre' => 'Bolívar', 'municipio_id' => 11],
            ['nombre' => 'Bolívar', 'municipio_id' => 12],
            ['nombre' => 'Boyacá', 'municipio_id' => 13],
            ['nombre' => 'Boyacá', 'municipio_id' => 14],
            ['nombre' => 'Boyacá', 'municipio_id' => 15],
            ['nombre' => 'Caldas', 'municipio_id' => 16],
            ['nombre' => 'Caldas', 'municipio_id' => 17],
            ['nombre' => 'Caldas', 'municipio_id' => 18],
            ['nombre' => 'Caquetá', 'municipio_id' => 19],
            ['nombre' => 'Caquetá', 'municipio_id' => 20],
            ['nombre' => 'Caquetá', 'municipio_id' => 21],
            ['nombre' => 'Casanare', 'municipio_id' => 22],
            ['nombre' => 'Casanare', 'municipio_id' => 23],
            ['nombre' => 'Casanare', 'municipio_id' => 24],
            ['nombre' => 'Cauca', 'municipio_id' => 25],
            ['nombre' => 'Cauca', 'municipio_id' => 26],
            ['nombre' => 'Cauca', 'municipio_id' => 27],
            ['nombre' => 'Cesar', 'municipio_id' => 28],
            ['nombre' => 'Cesar', 'municipio_id' => 29],
            ['nombre' => 'Cesar', 'municipio_id' => 30],
            ['nombre' => 'Chocó', 'municipio_id' => 31],
            ['nombre' => 'Chocó', 'municipio_id' => 32],
            ['nombre' => 'Chocó', 'municipio_id' => 33],
            ['nombre' => 'Córdoba', 'municipio_id' => 34],
            ['nombre' => 'Córdoba', 'municipio_id' => 35],
            ['nombre' => 'Córdoba', 'municipio_id' => 36],
            ['nombre' => 'Cundinamarca', 'municipio_id' => 37],
            ['nombre' => 'Cundinamarca', 'municipio_id' => 38],
            ['nombre' => 'Cundinamarca', 'municipio_id' => 39],
            ['nombre' => 'Guaviare', 'municipio_id' => 40],
            ['nombre' => 'Guaviare', 'municipio_id' => 41],
            ['nombre' => 'Huila', 'municipio_id' => 42],
            ['nombre' => 'Huila', 'municipio_id' => 43],
            ['nombre' => 'Huila', 'municipio_id' => 44],
            ['nombre' => 'La Guajira', 'municipio_id' => 45],
            ['nombre' => 'La Guajira', 'municipio_id' => 46],
            ['nombre' => 'La Guajira', 'municipio_id' => 47],
            ['nombre' => 'Magdalena', 'municipio_id' => 48],
            ['nombre' => 'Magdalena', 'municipio_id' => 49],
            ['nombre' => 'Magdalena', 'municipio_id' => 50],
            ['nombre' => 'Meta', 'municipio_id' => 51],
            ['nombre' => 'Meta', 'municipio_id' => 52],
            ['nombre' => 'Meta', 'municipio_id' => 53],
            ['nombre' => 'Nariño', 'municipio_id' => 54],
            ['nombre' => 'Nariño', 'municipio_id' => 55],
            ['nombre' => 'Nariño', 'municipio_id' => 56],
            ['nombre' => 'Norte de Santander', 'municipio_id' => 57],
            ['nombre' => 'Norte de Santander', 'municipio_id' => 58],
            ['nombre' => 'Norte de Santander', 'municipio_id' => 59],
            ['nombre' => 'Putumayo', 'municipio_id' => 60],
            ['nombre' => 'Putumayo', 'municipio_id' => 61],
            ['nombre' => 'Quindío', 'municipio_id' => 62],
            ['nombre' => 'Quindío', 'municipio_id' => 63],
            ['nombre' => 'Quindío', 'municipio_id' => 64],
            ['nombre' => 'Risaralda', 'municipio_id' => 65],
            ['nombre' => 'Risaralda', 'municipio_id' => 66],
            ['nombre' => 'Risaralda', 'municipio_id' => 67],
            ['nombre' => 'Sucre', 'municipio_id' => 68],
            ['nombre' => 'Sucre', 'municipio_id' => 69],
            ['nombre' => 'Sucre', 'municipio_id' => 70],
            ['nombre' => 'Tolima', 'municipio_id' => 71],
            ['nombre' => 'Tolima', 'municipio_id' => 72],
            ['nombre' => 'Tolima', 'municipio_id' => 73],
            ['nombre' => 'Valle del Cauca', 'municipio_id' => 74],
            ['nombre' => 'Valle del Cauca', 'municipio_id' => 75],
            ['nombre' => 'Valle del Cauca', 'municipio_id' => 76],
            ['nombre' => 'Vaupés', 'municipio_id' => 77],
            ['nombre' => 'Vaupés', 'municipio_id' => 78],
            ['nombre' => 'Vaupés', 'municipio_id' => 79],
            ['nombre' => 'Vichada', 'municipio_id' => 80],
        ];

        foreach ($departamentos as $departamento) {
            Departamento::create([
                'nombre' => $departamento['nombre'],
                'municipio_id' => $departamento['municipio_id'],
            ]);
        }
    }
}
