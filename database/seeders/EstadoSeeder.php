<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

         $estados = [
            ['estado'        => 'activo',
              'fecha_cambio'  => '2024-10-22 18:55:41',
              'observaciones' => 'activo'],
            ['estado'        => 'inactivo',
              'fecha_cambio'  => '2024-10-22 18:55:41',
              'observaciones' => 'inactivo'],
            ['estado'        => 'suspendido',
              'fecha_cambio'  => '2024-10-22 18:55:41',
              'observaciones' => 'susendido'],
         ];

         foreach ($estados as $estado){
             $estadoModel = Estado::firstOrNew($estado);
             if(!$estadoModel->exists){
                 $estadoModel->save();
             }
         }
    }
}
