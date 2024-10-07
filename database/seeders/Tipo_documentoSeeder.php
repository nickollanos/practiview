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
        //Using ORM Eloquent
        $tipo_documento = new Tipo_documento();
        $tipo_documento->tipo = 'Cedula';
        $tipo_documento->siglas = 'CC';
        $tipo_documento->detalle = 'cedula de ciudadania';
        $tipo_documento->save();

        //Using ORM Eloquent
        $tipo_documento = new Tipo_documento();
        $tipo_documento->tipo = 'Extranjeria';
        $tipo_documento->siglas = 'CE';
        $tipo_documento->detalle = 'cedula de extranjeria';
        $tipo_documento->save();

        //Using ORM Eloquent
        $tipo_documento = new Tipo_documento();
        $tipo_documento->tipo = 'Pasaporte';
        $tipo_documento->siglas = 'PP';
        $tipo_documento->detalle = 'pasaporte';
        $tipo_documento->save();

        //Using ORM Eloquent
        $tipo_documento = new Tipo_documento();
        $tipo_documento->tipo = 'Tarjeta de identidad';
        $tipo_documento->siglas = 'TI';
        $tipo_documento->detalle = 'tarjeta';
        $tipo_documento->save();

        //Using ORM Eloquent
        $tipo_documento = new Tipo_documento();
        $tipo_documento->tipo = 'Registro Civil';
        $tipo_documento->siglas = 'RC';
        $tipo_documento->detalle = 'registro';
        $tipo_documento->save();

        //Using ORM Eloquent
        $tipo_documento = new Tipo_documento();
        $tipo_documento->tipo = 'Nit';
        $tipo_documento->siglas = 'NIT';
        $tipo_documento->detalle = 'nit';
        $tipo_documento->save();
    }
}
