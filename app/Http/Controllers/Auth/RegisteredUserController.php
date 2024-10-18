<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre'            => ['required', 'string', 'max:64'],
            'apellido'          => ['required', 'string', 'max:64'],
            'tipo_documento_id' => ['required'],
            'numero_documento'  => ['required', 'string', 'unique:'.Usuario::class],
            'fecha_nacimiento'  => ['required', 'date'],
            'telefono'          => ['required'],
            'email'             => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Usuario::class],
            'sexo'              => ['required'],
            'direccion'         => ['required'],
            'password'          => ['required', 'confirmed', Rules\Password::defaults()],
            'firma'             => ['required', 'image'],
            'foto_perfil'       => ['required', 'image'],
        ]);

        $user = Usuario::create([
            'nombre'            => $request->nombre,
            'apellido'          => $request->apellido,
            'tipo_documento_id' => $request->tipo_documento_id,
            'numero_documento'  => $request->numero_documento,
            'fecha_nacimiento'  => $request->fecha_nacimiento,
            'telefono'          => $request->telefono,
            'email'             => $request->email,
            'sexo'              => $request->sexo,
            'direccion'         => $request->direccion,
            'password'          => $request->password,
            'firma'             => $request->firma,
            'foto_perfil'       => $request->foto_perfil,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
