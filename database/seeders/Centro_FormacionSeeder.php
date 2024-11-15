<?php

namespace Database\Seeders;

use App\Models\Centro_formacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Centro_FormacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $centros_formacion = [
            ['nombre'       => 'centro de comercio y servicios',
             'siglas'       => 'CCS',
             'regional_id'  => '1'],
            ['nombre'       => 'centro para la formacion cafetera',
             'siglas'       => 'CFC',
             'regional_id'  => '1'],
            ['nombre'       => 'centro de procesos industriales y de construccion',
             'siglas'       => 'CPIC',
             'regional_id'  => '1'],
            ['nombre'       => 'centro pecuario y agroempresarial',
             'siglas'       => 'CPA',
             'regional_id'  => '1'],
            ['nombre'       => 'centro de utomatizacion industrial',
             'siglas'       => 'CAI',
             'regional_id'  => '1'],
         ];

         foreach ($centros_formacion as $centro_formacion){
             $centro_formacion = Centro_formacion::firstOrNew($centro_formacion);
             if(!$centro_formacion->exists){
                 $centro_formacion->save();
             }
         }
    }
}
