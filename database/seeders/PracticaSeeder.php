<?php

namespace Database\Seeders;

use App\Models\Practica;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PracticaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $practicas = [
            [
                'aprendiz_id'               => '1',
                'modalidad_practica_id'     => '1',
                'jefe_inmediato_id'         => '1',
                'fecha_inicio'              => '2024-11-02',
                'fecha_fin'                 => '2025-05-02'
            ]
        ];

        foreach ($practicas as $practica) {
            $practicaModel = Practica::firstOrNew($practica);
            if (!$practicaModel->exists) {
                $practicaModel->save();
            }
        }
    }
}
