<?php

namespace Database\Seeders;

use App\Models\Zona;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ZonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $zonas = [
            ['nombre'   => 'malteria'],
            ['nombre'   => 'altasuiza'],
            ['nombre'   => 'sanrafael']
         ];

         foreach ($zonas as $zona){
             $zonaModel = Zona::firstOrNew($zona);
             if(!$zonaModel->exists){
                 $zonaModel->save();
             }
         }
    }
}
