<?php

namespace App\Http\Controllers;

use App\Http\Requests\AprendizRequest;
use App\Http\Requests\UsuarioRequest;
use App\Models\Perfil;
use App\Models\Sexo;
use App\Models\Tipo_documento;
use App\Models\Usuario;
use Illuminate\Http\Request;

class AprendizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        //
        $tipo_documento = Tipo_documento::all();
        $sexo           = Sexo::all();
        return view('aprendiz.create')->with('tipo_documento', $tipo_documento)->with('sexo', $sexo);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        if ($request->hasFile('foto_perfil')) {
            $foto_perfil = time() . '.' . $request->foto_perfil->extension();
            $request->foto_perfil->storeAs('images', $foto_perfil);
        }

        if ($request->hasFile('firma')) {
            $firma = time() . '.' . $request->firma->extension();
            $request->firma->storeAs('images', $firma);
        }

        $usuario = new Usuario();
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->tipo_documento_id = $request->tipo_documento_id;
        $usuario->numero_documento = $request->numero_documento;
        $usuario->fecha_nacimiento = $request->fecha_nacimiento;
        $usuario->telefono = $request->telefono;
        $usuario->email = $request->email;
        $usuario->sexo_id = $request->sexo;
        $usuario->estado_id = 1;
        $usuario->direccion = $request->direccion;
        $usuario->password = bcrypt($request->password);
        $usuario->firma = $request->firma;
        $usuario->foto_perfil = $request->foto_perfil;

        if ($usuario->save()) {
            $perfil = Perfil::where('perfil', 'aprendiz')->first();
            $usuario->perfiles()->attach($perfil->id);
            return redirect('dashboard')
                ->with('message' . 'The usuario: ' . $usuario->fullname . ' was successfully added!');
        }
    }
}
