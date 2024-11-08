<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['nombre'   => 'gestor'],
            ['nombre'   => 'instructor'],
            ['nombre'   => 'seguimiento']
         ];

         foreach ($roles as $rol){
             $rolModel = Rol::firstOrNew($rol);
             if(!$rolModel->exists){
                 $rolModel->save();
             }
         }
    }
}
