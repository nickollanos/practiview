<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Aprendiz;
use App\Models\Instructor;
use App\Models\Jefe_Inmediato;
use App\Models\Perfil;
use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UsuarioFactory extends Factory
{

    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $sexo = fake()->randomElement(array('Femenino', 'Masculino'));

        $nombre = ($sexo == 'Female') ? $nombre = fake()->firstNameFemale()
            : $nombre = fake()->firstNameMale();

        // $firma = fake()->image(public_path('images/'), 140, 140, null, false);
        // $foto_perfil = fake()->image(public_path('images/'), 140, 140, null, false);

        return [
            'nombre'              => $nombre,
            'tipo_documento_id'   => fake()->randomElement([1, 2, 3, 4, 5]),
            'numero_documento'    => fake()->isbn13(),
            'fecha_nacimiento'    => fake()->dateTimeBetween('1974-01-01', '2024-12-31'),
            'telefono'            => fake()->phoneNumber(),
            'email'               => fake()->unique()->safeEmail(),
            'email_verified_at'   => now(),
            'sexo_id'             => fake()->randomElement([1, 2]),
            'estado_id'           => fake()->randomElement([1, 2]),
            'direccion'           => fake()->address(),
            'password'            => static::$password ??= Hash::make('12345'),
            'foto_perfil'         => 'no-photo.png',
            'remember_token'      => Str::random(10),
        ];
    }

    public function configure(): self
    {
        return $this->afterCreating(function (Usuario $usuario) {
            $perfil = Perfil::firstOrNew(['perfil' => fake()->randomElement(['administrador', 'instructor', 'aprendiz', 'jefe inmediato'])]);
            if (!$perfil->exists) {
                $perfil->save();
            }
            $usuario->perfiles()->attach($perfil->id);
            if ($perfil->perfil === 'administrador') {
                // $admin = new Admin();
                // $admin->usuario_id = $usuario->id;
                // $admin->save();
                $administrador = Admin::firstOrNew(['usuario_id' => $usuario->id]);
                if (!$administrador->exists) {
                    $administrador->save();
                }
            } elseif ($perfil->perfil === 'instructor') {
                // $student = new Instructor();
                // $student->usuario_id = $usuario->id;
                // $student->save();
                $instructor = Instructor::firstOrNew(['usuario_id' => $usuario->id]);
                if (!$instructor->exists) {
                    $instructor->save();
                    $rol = Rol::firstOrNew(['nombre' => fake()->randomElement(['gestor', 'instructor', 'seguimiento'])]);
                    if (!$rol->exists) {
                        $rol->save();
                    }
                    $instructor->rol()->attach($rol->id);
                }
            } elseif ($perfil->perfil === 'aprendiz') {
                // $driver = new Aprendiz();
                // $driver->usuario_id = $usuario->id;
                // $driver->save();
                $aprendiz = Aprendiz::firstOrNew(['usuario_id' => $usuario->id]);
                if (!$aprendiz->exists) {
                    $aprendiz->ficha_id = fake()->randomElement([1, 2]);
                    $aprendiz->estado_aprendiz_id = fake()->randomElement([1, 2, 3, 4]);
                    $aprendiz->save();
                }
            } elseif ($perfil->perfil === 'jefe inmediato') {
                // $tutor = new Jefe_Inmediato();
                // $tutor->usuario_id = $usuario->id;
                // $tutor->save();
                $jefe_inmediato = Jefe_inmediato::firstOrNew(['empresa_id' => fake()->randomElement([1, 3]),], ['usuario_id' => $usuario->id]);
                if (!$jefe_inmediato->exists) {
                    $jefe_inmediato->save();
                }
            }
        });
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
