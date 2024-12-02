<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Aprendiz;
use App\Models\Instructor;
use App\Models\Jefe_Inmediato;
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
        // $usuario = new Usuario();
        // $usuario->nombre = 'Erika';
        // $usuario->apellido = 'Velasquez';
        // $usuario->tipo_documento_id = '1';
        // $usuario->numero_documento = '1053835222';
        // $usuario->fecha_nacimiento = '21-02-1994';
        // $usuario->telefono = '3103744689';
        // $usuario->email = 'erika@gmail.com';
        // $usuario->sexo_id = 2;
        // $usuario->estado_id = 1;
        // $usuario->direccion = 'CL 48E1 4C-70';
        // $usuario->password = bcrypt('admin');
        // $usuario->save();

        // $perfil = Perfil::where('perfil', 'administrador')->first();
        // $usuario->perfiles()->attach($perfil->id);
        // $administrador = new Admin();
        // $administrador->usuario_id = $usuario->id;
        // $administrador->save();

        // //Using ORM Eloquent
        // $usuario = new Usuario();
        // $usuario->nombre = 'Brahian';
        // $usuario->apellido = 'Agudelo';
        // $usuario->tipo_documento_id = '1';
        // $usuario->numero_documento = '1053100100';
        // $usuario->fecha_nacimiento = '21-03-1999';
        // $usuario->telefono = '3103745234';
        // $usuario->email = 'bra@gmail.com';
        // $usuario->sexo_id = 1;
        // $usuario->estado_id = 1;
        // $usuario->direccion = 'CL 66 14-23';
        // $usuario->password = bcrypt('aprendiz');
        // $usuario->save();

        // $perfil = Perfil::where('perfil', 'aprendiz')->first();
        // $usuario->perfiles()->attach($perfil->id);
        // $aprendiz = new Aprendiz();
        // $aprendiz->usuario_id = $usuario->id;
        // $aprendiz->save();

        // //Using ORM Eloquent
        // $usuario = new Usuario();
        // $usuario->nombre = 'mateo';
        // $usuario->apellido = 'cabello';
        // $usuario->tipo_documento_id = '1';
        // $usuario->numero_documento = '1053200200';
        // $usuario->fecha_nacimiento = '21-03-2004';
        // $usuario->telefono = '3103747656';
        // $usuario->email = 'mateo@gmail.com';
        // $usuario->sexo_id = 1;
        // $usuario->estado_id = 1;
        // $usuario->direccion = 'neira';
        // $usuario->password = bcrypt('instructor');
        // $usuario->save();

        // $perfil = Perfil::where('perfil', 'instructor')->first();
        // $usuario->perfiles()->attach($perfil->id);
        // $instructor = new Instructor();
        // $instructor->usuario_id = $usuario->id;
        // $instructor->save();


    // ...
    $usuario = new Usuario();
    $usuario->nombre = 'Erika';
    $usuario->tipo_documento_id = '1';
    $usuario->numero_documento = '1053835222';
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
    $administrador = Admin::firstOrNew(['usuario_id' => $usuario->id]);
    if (!$administrador->exists) {
        $administrador->save();
    }
    // ...
    $usuario = new Usuario();
    $usuario->nombre = 'Brahian';
    $usuario->tipo_documento_id = '1';
    $usuario->numero_documento = '1053100100';
    $usuario->fecha_nacimiento = '21-03-1999';
    $usuario->telefono = '3103745234';
    $usuario->email = 'bra@gmail.com';
    $usuario->sexo_id = 1;
    $usuario->estado_id = 1;
    $usuario->direccion = 'CL 66 14-23';
    $usuario->password = bcrypt('aprendiz');
    $usuario->save();
    $perfil = Perfil::where('perfil', 'aprendiz')->first();
    $usuario->perfiles()->attach($perfil->id);
    $aprendiz = Aprendiz::firstOrNew(['usuario_id' => $usuario->id]);
    if (!$aprendiz->exists) {
        $aprendiz->ficha_id = '1';
        $aprendiz->estado_aprendiz_id = '1';
        $aprendiz->save();
    }
    // ...
    $usuario = new Usuario();
    $usuario->nombre = 'mateo';
    $usuario->tipo_documento_id = '1';
    $usuario->numero_documento = '1053200200';
    $usuario->fecha_nacimiento = '21-03-2004';
    $usuario->telefono = '3103747656';
    $usuario->email = 'mateo@gmail.com';
    $usuario->sexo_id = 1;
    $usuario->estado_id = 1;
    $usuario->direccion = 'neira';
    $usuario->password = bcrypt('instructor');
    $usuario->save();
    $perfil = Perfil::where('perfil', 'instructor')->first();
    $usuario->perfiles()->attach($perfil->id);
    $instructor = Instructor::firstOrNew(['usuario_id' => $usuario->id]);
    if (!$instructor->exists) {
        $instructor->save();
    }

    }

}
