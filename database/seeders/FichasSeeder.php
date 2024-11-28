<?php

namespace Database\Seeders;

use App\Models\Ficha;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FichasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fichas = [
            ['nombre'                => '2613934',
             'programa_formacion_id' => '1',
             'instructor_id'         => '1'],
             ['nombre'                => '2613935',
             'programa_formacion_id' => '2',
             'instructor_id'         => '2'],
             ['nombre'                => '2613936',
             'programa_formacion_id' => '3',
             'instructor_id'         => '3'],
         ];

         foreach ($fichas as $ficha){
             $fichaModel = Ficha::firstOrNew($ficha);
             if(!$fichaModel->exists){
                 $fichaModel->save();
             }
         }
    }
}
