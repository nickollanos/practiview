<?php

namespace Database\Seeders;

use App\Models\Modalidad_practica;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Modalidad_PracticaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modalidad_practicas = [
            ['nombre'   => 'contrato de aprendizaje'],
            ['nombre'   => 'pasantia'],
            ['nombre'   => 'vinculo laboral']
         ];

         foreach ($modalidad_practicas as $modalidad_practica){
             $modalidad_practicaModel = Modalidad_practica::firstOrNew($modalidad_practica);
             if(!$modalidad_practicaModel->exists){
                 $modalidad_practicaModel->save();
             }
         }
    }
}
