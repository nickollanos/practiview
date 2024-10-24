<?php

namespace Database\Seeders;

use App\Models\Perfil;
use App\Models\Sexo;
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

        // $sexo = [
        //     ['siglas' => 'M',
        //      'nombre' => 'masculino'],
        //     ['siglas' => 'F',
        //      'nombre' => 'femenino'],
        //     ['siglas' => 'O',
        //      'nombre' => 'otros'],
        // ];

        // foreach ($sexo as $sex){
        //     $sexoModel = Sexo::firstOrNew($sex);
        //     if(!$sexoModel->exists){
        //         $sexoModel->save();
        //     }
        // }

        //Using ORM Eloquent
        $usuario = new Usuario();
        $usuario->nombre = 'Erika';
        $usuario->apellido = 'Velasquez';
        $usuario->tipo_documento_id = '1';
        $usuario->numero_documento = '1053838454';
        $usuario->fecha_nacimiento = '21-02-1994';
        $usuario->telefono = '3103744689';
        $usuario->email = 'erika@gmail.com';
        $usuario->sexo_id = 2;
        $usuario->estado_id = 1;
        $usuario->direccion = 'CL 48E1 4C-70';
        $usuario->password = bcrypt('admin');
        $usuario->save();

        $perfil = Perfil::where('perfil', 'administrador')->first();
        $usuario->perfiles()->attach($perfil->id);

    }

}
