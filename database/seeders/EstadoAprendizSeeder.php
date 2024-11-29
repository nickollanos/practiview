<?php

namespace Database\Seeders;

use App\Models\EstadoAprendiz;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoAprendizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estados = [
            ['nombre'    => 'Lectiva'],
            ['nombre'    => 'Productiva'],
            ['nombre'    => 'Cancelado'],
            ['nombre'    => 'Retirado'],
         ];

         foreach ($estados as $estado){
             $estadoModel = EstadoAprendiz::firstOrNew($estado);
             if(!$estadoModel->exists){
                 $estadoModel->save();
             }
         }
    }
}
