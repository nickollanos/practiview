<?php

namespace Database\Factories;

use App\Models\Perfil;
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

        $sexo = fake()->randomElement(array ('Femenino','Masculino'));

        $nombre = ($sexo == 'Female') ? $nombre= fake()->firstNameFemale()
                                      : $nombre= fake()->firstNameMale();

        $firma = fake()->image(public_path('images/'), 140, 140, null, false);
        $foto_perfil = fake()->image(public_path('images/'), 140, 140, null, false);

        return [
            'nombre'              => $nombre,
            'apellido'            => fake()->lastName(),
            'tipo_documento_id'   => fake()->randomElement([1, 2, 3, 4, 5, 6]),
            'numero_documento'    => fake()->isbn13(),
            'fecha_nacimiento'    => fake()->dateTimeBetween('1974-01-01', '2024-12-31'),
            'telefono'            => fake()->phoneNumber(),
            'email'               => fake()->unique()->safeEmail(),
            'email_verified_at'   => now(),
            'sexo_id'             => fake()->randomElement([1, 2]),
            'estado_id'           => fake()->randomElement([1, 2]),
            'direccion'           => fake()->address(),
            'password'            => static::$password ??= Hash::make('12345'),
            'firma'               => substr($firma, 7),
            'foto_perfil'         => substr($foto_perfil, 7),
            'remember_token'      => Str::random(10),
        ];
    }

    public function configure(): self{
        return $this->afterCreating(function (Usuario $usuario){
            $perfil = Perfil::firstOrNew(['perfil' => fake()->randomElement(['administrador', 'instructor', 'aprendiz', 'empresa', 'jefe inmediato'])]);
            if(!$perfil->exists){
                $perfil->save();
            }
        $usuario->perfiles()->attach($perfil->id);
        });
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
