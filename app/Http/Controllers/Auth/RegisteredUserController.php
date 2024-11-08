<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Perfil;
use App\Models\Sexo;
use App\Models\Tipo_documento;
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
        $tipo_documentos = Tipo_documento::all();
        $sexos           = Sexo::all();
        return view('auth.register')->with('tipo_documentos', $tipo_documentos)->with('sexos', $sexos);
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

        if ($request->hasFile('foto_perfil')) {
            $foto_perfil = time() . '.' . $request->foto_perfil->extension();
            $request->foto_perfil->storeAs('public/images', $foto_perfil);
            $foto_perfil1 = 'storage/images/' . $foto_perfil;
        }else{
            $foto_perfil1 = 'storage/images/no-foto.jpg';
        }

        if ($request->hasFile('firma')) {
            $firma = time() . '.' . $request->firma->extension();
            $request->firma->storeAs('public/images', $firma);
            $firma1 = 'storage/images/' . $firma;
        }else{
             $firma1 ='storage/images/no-firma.jpg';
        }

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
            'firma'             => $firma1,
            'foto_perfil'       => $foto_perfil1,
            'password' => Hash::make($request->password),
        ]);

        $perfil = Perfil::where('perfil', 'sin rol')->first();
        $user->perfiles()->attach($perfil->id);
        return redirect('dashboard')
        ->with('message' . 'The usuario: ' . $user->fullname . ' was successfully added!');

        event(new Registered($user));

        // Auth::login($user);

        return redirect(route('login', absolute: false));
    }
}
