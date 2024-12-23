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
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\InstructorPasswordMail;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $estadoVista = $request->input('estado');

        if ($estadoVista == 'activos') {

            $fichas = Ficha::all();

            $instructores = Usuario::select('usuarios.*')
            ->with(['estado', 'perfiles', 'instructor.rol'])
            ->whereHas('perfiles', function ($query) {
                $query->where('perfil', 'instructor');
            })
            ->where('estado_id', 1)
            ->paginate(8);


            // dd($instructores->toArray());

            $instructoresActivos = Usuario::whereHas('perfiles', function ($query) {
                $query->where('perfil', 'instructor');
            })
            ->where('estado_id', 1) // Solo instructores activos (estado_id = 1)
            ->count();

            // Contamos la cantidad de instructores que son gestores
            $cantidadGestores = Usuario::whereHas('perfiles', function ($query) {
                $query->where('perfil', 'instructor'); // Aseguramos que sea un perfil de instructor
            })
            ->where('estado_id', 1) // Solo instructores activos (estado_id = 1)
            ->whereHas('instructor.rol', function ($query) {
                $query->where('nombre', 'gestor'); // Filtro por rol "gestor"
            })
            ->count();

            $cantidadSeguimiento = Usuario::whereHas('perfiles', function ($query) {
                $query->where('perfil', 'instructor'); // Aseguramos que sea un perfil de instructor
            })
            ->where('estado_id', 1) // Solo instructores activos (estado_id = 1)
            ->whereHas('instructor.rol', function ($query) {
                $query->where('nombre', 'seguimiento'); // Filtro por rol "gestor"
            })
            ->count();

            // Obtener los instructores activos con su rol "gestor"
            $instructoresPorEstado = Usuario::whereHas('perfiles', function ($query) {
                $query->where('perfil', 'instructor');
            })
            ->where('estado_id', 1) // Solo instructores activos
            ->with(['instructor.rol']) // Cargar la relación instructor y rol
            ->get()
            ->map(function ($usuario) {
                // Asegúrate de que la relación `instructor` y `rol` existen
                return $usuario->instructor ? $usuario->instructor->rol->first() : null;
            })
            ->filter(function ($rol) {
                return $rol && $rol->nombre === 'gestor'; // Filtramos solo los roles "gestor"
            })
            ->count();

            //dd($cantidadGestores);

            $cantidadInstructores = Usuario::whereHas('perfiles', function ($query) {
                $query->where('perfil', 'instructor');  // Aseguramos que sea un perfil de instructor
            })
            ->where('estado_id', 1)  // Solo instructores activos (estado_id = 1)
            ->whereHas('instructor.rol', function ($query) {
                $query->where('nombre', 'instructor');  // Filtro por rol "instructor"
            })
            ->count();  // Obtener instructores con rol "instructor"

            return view('instructor.index', compact('instructores', 'instructoresActivos', 'fichas', 'cantidadGestores', 'cantidadSeguimiento', 'cantidadInstructores', 'estadoVista'));

        } elseif ($estadoVista == 'inactivos') {
            $instructores = Usuario::select('usuarios.*')
                ->with(['estado', 'perfiles', 'instructor.rol'])
                ->whereHas('perfiles', function ($query) {
                    $query->where('perfil', 'instructor');
                })
                ->where('estado_id', 2)
                ->paginate(8);
                //dd($instructores->toArray());

            $instructoresInactivos = Usuario::whereHas('perfiles', function ($query) {
                $query->where('perfil', 'instructor');
            })->where('estado_id', 2)
            ->count();

            return view('instructor.inactivo', compact('instructores', 'instructoresInactivos', 'estadoVista'));
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

         // Generar una contraseña aleatoria
        $password = Str::random(10);

        $usuario = new Usuario();
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->tipo_documento_id = $request->tipo_documento_id;
        $usuario->numero_documento = $request->numero_documento;
        $usuario->fecha_nacimiento = $request->fecha_nacimiento;
        $usuario->telefono = $request->telefono;
        $usuario->email = $request->email;
        $usuario->sexo_id = $request->sexo_id;
        $usuario->estado_id = 1;
        $usuario->direccion = $request->direccion;
        $usuario->password = bcrypt($request->password);
        $usuario->password = bcrypt($password); // Guardar la contraseña encriptada
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

            // Enviar correo al usuario con la contraseña
            //Mail::to($usuario->email)->send(new InstructorPasswordMail($usuario, $password));

            session()->flash('message', 'El usuario ' . $usuario->nombre . ' ha sido añadido de manera exitosa');
            return redirect()->route('instructor.index', ['estado' => 'activos']);
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

    public function updateEstado(InstructorRequest $request, $id)
    {
        //dd($request->all());
        //dd($request);
        $usuario = Usuario::findOrFail($id);

        if ($request->input('action') === 'desactivate') {
            $usuario->estado_id = 2;
            $usuario->save();
            $instructores = Usuario::select('usuarios.*')
                ->with(['estado', 'perfiles'])
                ->whereHas('perfiles', function ($query) {
                    $query->where('perfil', 'instructor');
                })
                ->where('estado_id', 1)
                ->paginate(8);
            //dd($aprendices->toArray());

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
                    return optional($usuario->instructor->rol->first())->nombre;
                })
                ->countBy();


            session()->flash('message', 'El usuario ' . $usuario->nombre . ' ' . $usuario->apellido . ' ha sido desactivado de manera exitosa');
            return redirect()->route('instructor.index', ['estado' => 'activos']);
        } elseif ($request->input('action') === 'activate') {
            $usuario->estado_id = 1;
            $usuario->save();
            $instructores = Usuario::select('usuarios.*')
                ->with(['estado', 'perfiles'])
                ->whereHas('perfiles', function ($query) {
                    $query->where('perfil', 'instructor');
                })
                ->where('estado_id', 2)
                ->paginate(8);
            //dd($aprendices->toArray());

            $cantidadInstructores = Usuario::whereHas('perfiles', function ($query) {
                $query->where('perfil', 'instructor');
            })
                ->where('estado_id', 2)
                ->count();
            // dd($cantidadAprendices);

            $instructoresPorEstado = Usuario::whereHas('perfiles', function ($query) {
                $query->where('perfil', 'instructor');
            })
                ->where('estado_id', 2)
                ->with(['instructor.rol'])
                ->get()
                ->map(function ($usuario) {
                    return optional($usuario->instructor->rol->first())->nombre;
                })
                ->countBy();

            $instructoresInactivos = Usuario::whereHas('perfiles', function ($query) {
                $query->where('perfil', 'instructor');
            })
                ->where('estado_id', 2)
                ->count();

            session()->flash('message', 'El usuario ' . $usuario->nombre . ' ' . $usuario->apellido . ' ha sido activado de manera exitosa');
            return redirect()->route('instructor.index', ['estado' => 'inactivos']);
        }
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
        $usuario->apellido = $request->apellido;
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
        return redirect()->route('instructor.index', ['estado' => 'activos']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // $usuario = Usuario::findOrFail($id);
        // $usuario->estado_id = 2;
        // $usuario->save();
        // session()->flash('message', 'El usuario ' . $usuario->nombre . ' ha sido eliminado de manera exitosa');
        // return redirect('instructor');
    }
}
