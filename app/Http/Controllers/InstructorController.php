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
    public function index(Request $request)
    {
        $estadoVista = $request->input('estado');

        if ($estadoVista == 'activos') {

            $ficha = Ficha::all();

            $instructores = Usuario::select('usuarios.*')
            ->with(['estado', 'perfiles', 'instructor.rol'])
            ->whereHas('perfiles', function ($query) {
                $query->where('perfil', 'instructor');
            })
            ->where('estado_id', 1)
            ->paginate(8);

            // dd($instructor->toArray());

            $instructoresActivos = Usuario::whereHas('perfiles', function ($query) {
                $query->where('perfil', 'instructor');
            })
            ->where('estado_id', 1)
            ->count();
            // dd($cantidadAprendices);

            $instructoresPorEstado = Usuario::whereHas('perfiles', function ($query) {
                $query->where('perfil', 'instructor');
            })
            ->where('estado_id', 1)
            ->with(['instructor.rol'])
            ->get()
            ->map(function ($usuario) {
                return $usuario->instructor->rol;
            })
            ->countBy();
            //dd($aprendicesPorEstado);

            return view('aprendiz.index', compact('instructores', 'instructoresActivos', 'instructoresPorEstado', 'estadoVista'));

        } elseif ($estadoVista == 'inactivos') {
            $aprendices = Usuario::select('usuarios.*')
            ->with(['estado', 'perfiles', 'aprendiz.estadoAprendiz'])
            ->whereHas('perfiles', function ($query) {
                $query->where('perfil', 'aprendiz');
            })
            ->where('estado_id', 2)
            ->paginate(8);

            $aprendicesInactivos = Usuario::whereHas('perfiles', function ($query) {
                $query->where('perfil', 'aprendiz');
            })
            ->where('estado_id', 2)
            ->count();

            return view('aprendiz.inactivo', compact('aprendicesInactivos', 'aprendices', 'estadoVista'));
        } else {
            // Redirige por defecto si no se selecciona un estado válido
            return view('dashboard');
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $tipo_documentos = Tipo_documento::all();
        $sexos           = Sexo::all();
        $roles           = Rol::all();
        return view('instructor.create')->with('tipo_documentos', $tipo_documentos)->with('sexos', $sexos)->with('roles', $roles);
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
            $rolesPermitidos = $usuario->rol = $request->rol;
            $rol = Rol::where('nombre', $rolesPermitidos)->first();
            $instructor->rol()->attach($rol->id);
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
        $roles           = Rol::all();
        $usuario = Usuario::with('instructor.rol', 'perfiles', 'estado', 'sexo', 'tipo_documento')->findOrFail($id);
        $instructorRoles = $usuario->instructor ? $usuario->instructor->rol->pluck('nombre')->toArray() : [];
        $direccion = \Illuminate\Support\Str::limit($usuario->direccion, 20);
        return view('instructor.edit', compact('usuario', 'sexos', 'tipo_documentos', 'direccion', 'roles', 'instructorRoles'))->render();    }

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

        // Verificar si el usuario tiene un instructor asociado
    if ($usuario->instructor) {
        // Obtener el instructor
        $instructor = $usuario->instructor;

        // Actualizar el rol del instructor
        $instructor->rol()->sync([$request->rol]); // `sync` asegura que solo se quede con el nuevo rol
    }

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
