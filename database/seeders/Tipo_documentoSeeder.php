<?php

namespace Database\Seeders;

use App\Models\Tipo_documento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Tipo_documentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipo_documentos = [
            ['tipo'     => 'cedula',
              'siglas'  => 'CC',
              'detalle' => 'cedula de ciudadania'],
            ['tipo'     => 'extranjeria',
              'siglas'  => 'CE',
              'detalle' => 'cedula de exttranjeria'],
            ['tipo'     => 'pasaporte',
              'siglas'  => 'PP',
              'detalle' => 'pasaporte'],
            ['tipo'     => 'tarjeta',
              'siglas'  => 'TI',
              'detalle' => 'tarjeta de identidad'],
            ['tipo'     => 'registro',
              'siglas'  => 'RC',
              'detalle' => 'registro civil'],
            ['tipo'     => 'nit',
              'siglas'  => 'NIT',
              'detalle' => 'nit'],
         ];

         foreach ($tipo_documentos as $tipo_documento){
             $tipo_documentoModel = Tipo_documento::firstOrNew($tipo_documento);
             if(!$tipo_documentoModel->exists){
                 $tipo_documentoModel->save();
             }
         }
    }
}
