<?php

namespace Database\Seeders;

use App\Models\Empresa;
use App\Models\Jefe_Inmediato;
use App\Models\Perfil;
use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $empresas = [
            [
                'nombre'     => 'plastichistes',
                'numero_nit' => '970454546',
                'telefono'   => '89000000',
                'direccion'  => 'CR 23 52-34',
                'zona_id'       => '1',
                'email'      => 'cable@gmail.com',
                'estado_id'  => '1'
            ],
            [
                'nombre'     => 'pikas y mas',
                'numero_nit' => '123456789',
                'telefono'   => '89012345',
                'direccion'  => 'AV 15 30-10',
                'zona_id'       => '1',
                'email'      => 'gerente@gmail.com',
                'estado_id'  => '1'
            ],

            [
                'nombre'     => 'produempac',
                'numero_nit' => '987654321',
                'telefono'   => '89098765',
                'direccion'  => 'CL 10 20-15',
                'zona_id'       => '2',
                'email'      => 'supervisor@gmail.com',
                'estado_id'  => '1'
            ],

            [
                'nombre'     => 'moto rata',
                'numero_nit' => '456789123',
                'telefono'   => '89054321',
                'direccion'  => 'DI 5 15-25',
                'zona_id'       => '3',
                'email'      => 'coordinador@gmail.com',
                'estado_id'  => '1'
            ]



        ];

        foreach ($empresas as $empresa) {
            $empresaModel = Empresa::firstOrNew($empresa);
            if (!$empresaModel->exists) {
                $empresaModel->save();
            }
        }

        $usuario = new Usuario();
        $usuario->nombre = 'Erika';
        $usuario->apellido = 'velasquez';
        $usuario->tipo_documento_id = '1';
        $usuario->numero_documento = '1053100100';
        $usuario->fecha_nacimiento = '21-03-1980';
        $usuario->telefono = '3103747648';
        $usuario->email = 'etanga@gmail.com';
        $usuario->sexo_id = 2;
        $usuario->estado_id = 1;
        $usuario->direccion = 'manizales';
        $usuario->password = bcrypt('jefeinmediato');
        $usuario->save();
        $perfil = Perfil::where('perfil', 'jefe inmediato')->first();
        $usuario->perfiles()->attach($perfil->id);

        Jefe_Inmediato::create(['usuario_id' => $usuario->id, 'empresa_id' => $empresaModel->id]);

        // $jefe_inmediato = Jefe_Inmediato::firstOrNew(['empresa_id' => $empresaModel->id]);
        // if (!$jefe_inmediato->exists) {
        // $jefe_inmediato->save();
        // }

        // $jefe_inmediato = Jefe_Inmediato::firstOrNew(['usuario_id' => $usuario->id]);
        // if (!$jefe_inmediato->exists) {
        //     $jefe_inmediato->save();
        // }
    }
}
