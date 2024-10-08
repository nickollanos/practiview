<?php

namespace Database\Seeders;
use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Using ORM Eloquent
        $usuario = new Usuario();
        $usuario->nombre = 'Erika';
        $usuario->apellido = 'Velasquez';
        $usuario->tipo_documento_id = '1';
        $usuario->numero_documento = '1053838454';
        $usuario->fecha_nacimiento = '21-02-1994';
        $usuario->telefono = '3103744689';
        $usuario->email = 'erika@gmail.com';
        $usuario->sexo = 'femenino';
        $usuario->direccion = 'CL 48E1 4C-70';
        $usuario->password = bcrypt('admin');
        $usuario->save();

    }
    
}
