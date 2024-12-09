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
            ['numero_ficha'          => 'sinficha',
             'programa_formacion_id' => '1'],
            ['numero_ficha'          => '2613934',
             'programa_formacion_id' => '2'],
             ['numero_ficha'         => '2613935',
             'programa_formacion_id' => '3'],
             ['numero_ficha'         => '2613936',
             'programa_formacion_id' => '4'],
         ];

         foreach ($fichas as $ficha){
             $fichaModel = Ficha::firstOrNew($ficha);
             if(!$fichaModel->exists){
                 $fichaModel->save();
             }
         }
    }
}
