<?php

namespace Database\Seeders;

use App\Models\Sexo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SexoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sexos = [
            ['siglas'   => 'M',
              'nombre'  => 'masculino'],
            ['siglas'   => 'F',
              'nombre'  => 'femenino'],
            ['siglas'   => 'O',
              'nombre'  => 'otros'],
         ];

         foreach ($sexos as $sexo){
             $sexoModel = Sexo::firstOrNew($sexo);
             if(!$sexoModel->exists){
                 $sexoModel->save();
             }
         }
    }
}
