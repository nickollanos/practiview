<?php

namespace Database\Seeders;

use App\Models\Empresa;
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
                'email'      => 'cable@gmail.com',
                'estado_id'  => '1'
            ],
            [
                'nombre'     => 'pikas y mas',
                'numero_nit' => '123456789',
                'telefono'   => '89012345',
                'direccion'  => 'AV 15 30-10',
                'email'      => 'gerente@gmail.com',
                'estado_id'  => '1'
            ],

            [
                'nombre'     => 'produempac',
                'numero_nit' => '987654321',
                'telefono'   => '89098765',
                'direccion'  => 'CL 10 20-15',
                'email'      => 'supervisor@gmail.com',
                'estado_id'  => '1'
            ],

            [
                'nombre'     => 'moto rata',
                'numero_nit' => '456789123',
                'telefono'   => '89054321',
                'direccion'  => 'DI 5 15-25',
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
    }
}
