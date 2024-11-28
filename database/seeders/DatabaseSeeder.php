<?php

namespace Database\Seeders;

use App\Models\Departamento;
use App\Models\Modalidad_practica;
use App\Models\Tipo_documento;
use App\Models\Usuario;
use Database\Factories\UsuariosFactory;
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
            Tipo_documentoSeeder::class,
            SexoSeeder::class,
            PerfilSeeder::class,
            EstadoSeeder::class,
            RegionalSeeder::class,
            Centro_FormacionSeeder::class,
            Programa_FormacionSeeder::class,
            FichasSeeder::class,
            UsuarioSeeder::class,
            EmpresaSeeder::class,
            RolSeeder::class,
            Modalidad_practicaSeeder::class,
            PracticaSeeder::class,
        ]);

        Usuario::factory(50)->create();
    }
}
