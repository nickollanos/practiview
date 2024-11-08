<?php

namespace Database\Seeders;

use App\Models\Regional;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regionales = [
            // ['nombre' => 'Antioquia', 'direccion' => 'Carrera 48 # 72-198, Medellín'],
            // ['nombre' => 'Atlántico', 'direccion' => 'Carrera 38 # 50-50, Barranquilla'],
            // ['nombre' => 'Bolívar', 'direccion' => 'Calle 30 # 24-16, Cartagena'],
            // ['nombre' => 'Boyacá', 'direccion' => 'Calle 16 # 10-12, Tunja'],
            ['nombre' => 'Caldas', 'direccion' => 'Km 10 via al Magdalena, Manizales'],
            // ['nombre' => 'Caquetá', 'direccion' => 'Calle 11 # 7-29, Florencia'],
            // ['nombre' => 'Casanare', 'direccion' => 'Calle 25 # 9-12, Yopal'],
            // ['nombre' => 'Cauca', 'direccion' => 'Calle 5 # 4-45, Popayán'],
            // ['nombre' => 'Cesar', 'direccion' => 'Carrera 9 # 13-51, Valledupar'],
            // ['nombre' => 'Chocó', 'direccion' => 'Calle 2 # 10-45, Quibdó'],
            // ['nombre' => 'Córdoba', 'direccion' => 'Carrera 2 # 4-30, Montería'],
            // ['nombre' => 'Cundinamarca', 'direccion' => 'Calle 37 # 11-25, Bogotá'],
            // ['nombre' => 'Guaviare', 'direccion' => 'Calle 11 # 9-20, San José del Guaviare'],
            // ['nombre' => 'Guainía', 'direccion' => 'Carrera 6 # 5-25, Inírida'],
            // ['nombre' => 'Huila', 'direccion' => 'Calle 8 # 7-45, Neiva'],
            // ['nombre' => 'La Guajira', 'direccion' => 'Calle 2 # 8-20, Riohacha'],
            // ['nombre' => 'Magdalena', 'direccion' => 'Carrera 5 # 19-27, Santa Marta'],
            // ['nombre' => 'Meta', 'direccion' => 'Calle 38 # 29-33, Villavicencio'],
            // ['nombre' => 'Nariño', 'direccion' => 'Calle 19 # 22-15, Pasto'],
            // ['nombre' => 'Norte de Santander', 'direccion' => 'Calle 12 # 5-18, Cúcuta'],
            // ['nombre' => 'Putumayo', 'direccion' => 'Calle 13 # 9-45, Mocoa'],
            // ['nombre' => 'Quindío', 'direccion' => 'Calle 19 # 16-45, Armenia'],
            // ['nombre' => 'Risaralda', 'direccion' => 'Carrera 8 # 14-28, Pereira'],
            // ['nombre' => 'San Andrés y Providencia', 'direccion' => 'Avenida Colombia # 1-15, San Andrés'],
            // ['nombre' => 'Santander', 'direccion' => 'Carrera 27 # 48-70, Bucaramanga'],
            // ['nombre' => 'Sucre', 'direccion' => 'Calle 25 # 17-20, Sincelejo'],
            // ['nombre' => 'Tolima', 'direccion' => 'Carrera 3 # 10-45, Ibagué'],
            // ['nombre' => 'Valle del Cauca', 'direccion' => 'Calle 16 # 5-45, Cali'],
            // ['nombre' => 'Vaupés', 'direccion' => 'Calle 1 # 3-10, Mitú'],
            // ['nombre' => 'Vichada', 'direccion' => 'Calle 4 # 4-15, Puerto Carreño'],
        ];

        foreach ($regionales as $regional) {
            Regional::create($regional);
        }
    }
}
