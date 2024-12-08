<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstructorRequest;
use App\Models\Ficha;
use App\Models\Instructor;
use App\Models\Perfil;
use App\Models\Rol;
use App\Models\Sexo;
use App\Models\Tipo_documento;
use App\Models\Usuario;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructores = Usuario::select('usuarios.*') // Asegura que todos los campos de usuarios sean seleccionados
            ->with(['estado', 'perfiles']) // Carga las relaciones necesarias
            ->whereHas('perfiles', function ($query) {
                $query->where('perfil', 'instructor'); // Filtra usuarios con el perfil 'aprendiz'
            })
            ->where('estado_id', 1)
            ->paginate(8);

        $cantidadInstructores = Usuario::whereHas('perfiles', function ($query) {
            $query->where('perfil', 'instructor');
        })
            ->where('estado_id', 1)
            ->count();

        // $cantidadFichas = Ficha::where('numero_ficha', '!=', 'sinficha')
        // ->count();

        $cantidadGestores = Usuario::whereHas('perfiles', function ($query) {
            $query->where('perfil', 'instructor'); // Filtrar usuarios con el perfil 'instructor'
        })
            ->whereHas('instructor.rol', function ($query) {
                $query->where('nombre', 'gestor'); // Filtrar instructores con el rol 'gestor'
            })
            ->where('estado_id', 1) // Filtrar por estado activo
            ->count();
        // dd($cantidadGestores);

        $cantidadSeguimiento = Usuario::whereHas('perfiles', function ($query) {
            $query->where('perfil', 'instructor'); // Filtrar usuarios con el perfil 'instructor'
        })
            ->whereHas('instructor.rol', function ($query) {
                $query->where('nombre', 'seguimiento'); // Filtrar instructores con el rol 'gestor'
            })
            ->where('estado_id', 1) // Filtrar por estado activo
            ->count();

        return view('instructor.index', compact('instructores', 'cantidadInstructores', 'cantidadGestores', 'cantidadSeguimiento'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $tipo_documentos = Tipo_documento::all();
        $sexos           = Sexo::all();
        return view('instructor.create')->with('tipo_documentos', $tipo_documentos)->with('sexos', $sexos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('foto_perfil')) {
            $image = $request->file('foto_perfil');
            $foto_perfil = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $foto_perfil);
        } else {
            $foto_perfil = 'no-photo.png';
        }

        $usuario = new Usuario();
        $usuario->nombre = $request->nombre;
        $usuario->tipo_documento_id = $request->tipo_documento_id;
        $usuario->numero_documento = $request->numero_documento;
        $usuario->fecha_nacimiento = $request->fecha_nacimiento;
        $usuario->telefono = $request->telefono;
        $usuario->email = $request->email;
        $usuario->sexo_id = $request->sexo_id;
        $usuario->estado_id = 1;
        $usuario->direccion = $request->direccion;
        $usuario->password = bcrypt($request->password);
        $usuario->foto_perfil = $foto_perfil;

        if ($usuario->save()) {
            $perfil = Perfil::where('perfil', 'instructor')->first();
            $usuario->perfiles()->attach($perfil->id);
            $instructor = Instructor::firstOrNew(['usuario_id' => $usuario->id]);
            if (!$instructor->exists) {
            $instructor->save();
            $rolesPermitidos = ['gestor', 'seguimiento', 'instructor'];
            $rol = Rol::where('nombre', 'seguimiento')->first();
            $instructor->rol()->attach($rol->id);  
            $instructor->save();
            }
            session()->flash('message', 'El usuario ' . $usuario->nombre . ' ha sido añadido de manera exitosa');
            return redirect('instructor');
        }

    }

    /**
     * Display the specified resource.
     */
    public function search(Request $request)
    {
        $query = $request->q;

        // Realiza la búsqueda de los instructores 
        $instructores = Usuario::query()
        ->with(['estado', 'perfiles'])
        ->whereHas('perfiles', function ($q) {
            $q->where('perfil', 'instructor');
        })
        ->where(function ($q) use ($query) {
            $q->where('nombre', 'LIKE', "%$query%");
        })
        ->where('estado_id', 1)
        ->paginate(8);
        return view('instructor.search', compact('instructores'))->render();
        // return view('instructor.index', compact('instructores'))->render();
    }

    public function show($id)
    {
        //dd($id);
        $usuario = Usuario::with('instructor', 'perfiles', 'estado', 'sexo', 'tipo_documento')->findOrFail($id);
        $edad = \Carbon\Carbon::parse($usuario->fecha_nacimiento)->age;
        $direccion = \Illuminate\Support\Str::limit($usuario->direccion, 20);
        $fechaNacimiento = \Carbon\Carbon::parse($usuario->fecha_nacimiento)->format('d/m/y');
        //dd($siglas_programa->toArray());
        return view('instructor.show', compact('usuario', 'edad', 'direccion', 'fechaNacimiento'))->render();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //dd($id);
        $tipo_documentos = Tipo_documento::all();
        $sexos           = Sexo::all();
        $usuario = Usuario::with('aprendiz', 'perfiles', 'estado', 'sexo', 'tipo_documento')->findOrFail($id);
        $direccion = \Illuminate\Support\Str::limit($usuario->direccion, 20);
        return view('instructor.edit', compact('usuario', 'sexos', 'tipo_documentos', 'direccion'))->render();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InstructorRequest $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
        //dd($request->toArray());

        if ($request->hasFile('foto_perfil')) {
            $image = $request->file('foto_perfil');
            $foto_perfil = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $foto_perfil);
        } else {
            $foto_perfil = $request->originphoto;
        }

        $usuario->nombre = $request->nombre;
        $usuario->tipo_documento_id = $request->tipo_documento_id;
        $usuario->numero_documento = $request->numero_documento;
        $usuario->fecha_nacimiento = $request->fecha_nacimiento;
        $usuario->telefono = $request->telefono;
        $usuario->email = $request->email;
        $usuario->sexo_id = $request->sexo_id;
        $usuario->estado_id = 1;
        $usuario->direccion = $request->direccion;
        $usuario->password = bcrypt($request->password);
        $usuario->foto_perfil = $foto_perfil;

        $usuario->save();
        session()->flash('message', 'El usuario ' . $usuario->nombre . ' ha sido modificado de manera exitosa');
        return redirect('instructor');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->estado_id = 2;
        $usuario->save();
        session()->flash('message', 'El usuario ' . $usuario->nombre . ' ha sido eliminado de manera exitosa');
        return redirect('instructor');
    }
}
