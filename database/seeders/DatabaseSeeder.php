<?php

namespace Database\Seeders;

use App\Models\Departamento;
use App\Models\Tipo_documento;
use App\Models\Usuario;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Usuario::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            MunicipioSeeder::class,
            // DepartamentoSeeder::class,
            // RegionalSeeder::class,
            Tipo_documentoSeeder::class,
            UsuarioSeeder::class,
        ]);
    }
}
