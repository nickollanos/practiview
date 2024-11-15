<?php

namespace Database\Seeders;

use App\Models\Jefe_Inmediato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JefeInmediatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jefes = [
            ['empresa_id'   => '1',
             'usuario_id'   => '1'
            ],
            ['empresa_id'   => 'gestor',
             'usuario_id'   => 'instructor'
            ]
         ];

         foreach ($jefes as $jefe){
             $jefeModel = Jefe_Inmediato::firstOrNew($jefe);
             if(!$jefeModel->exists){
                 $jefeModel->save();
             }
         }
    }
}
