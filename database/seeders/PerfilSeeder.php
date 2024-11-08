<?php

namespace Database\Seeders;

use App\Models\Perfil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $perfiles = [
            ['perfil'   => 'administrador'],
            ['perfil'   => 'instructor'],
            ['perfil'   => 'aprendiz'],
            ['perfil'   => 'jefe inmediato'],
            ['perfil'   => 'sin rol'],
         ];

         foreach ($perfiles as $perfil){
             $perfilModel = Perfil::firstOrNew($perfil);
             if(!$perfilModel->exists){
                 $perfilModel->save();
             }
         }
    }
}
