<?php

namespace App\Http\Controllers;

use App\Http\Requests\AprendizRequest;
use App\Http\Requests\UsuarioRequest;
use App\Models\Perfil;
use App\Models\Sexo;
use App\Models\Tipo_documento;
use App\Models\Usuario;
use App\Models\Aprendiz;
use App\Models\Ficha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AprendizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $estadoVista = $request->input('estado');

        if ($estadoVista == 'activos') {

            $ficha = Ficha::all();

            $aprendices = Usuario::select('usuarios.*')
            ->with(['estado', 'perfiles', 'aprendiz.estadoAprendiz'])
            ->whereHas('perfiles', function ($query) {
                $query->where('perfil', 'aprendiz');
            })
            ->where('estado_id', 1)
            ->paginate(8);

            // dd($aprendices->toArray());

            $cantidadAprendices = Usuario::whereHas('perfiles', function ($query) {
                $query->where('perfil', 'aprendiz');
            })
                ->where('estado_id', 1)
                ->count();
            // dd($cantidadAprendices);

            $aprendicesPorEstado = Usuario::whereHas('perfiles', function ($query) {
                $query->where('perfil', 'aprendiz');
            })
                ->where('estado_id', 1)
                ->with(['aprendiz.estadoAprendiz'])
                ->get()
                ->map(function ($usuario) {
                    return $usuario->aprendiz->estadoAprendiz->nombre;
                })
                ->countBy();
            //dd($aprendicesPorEstado);
            return view('aprendiz.index', compact('aprendices', 'cantidadAprendices', 'aprendicesPorEstado'));
        } elseif ($estadoVista == 'inactivos') {
            $aprendices = Usuario::select('usuarios.*')
                ->with(['estado', 'perfiles', 'aprendiz.estadoAprendiz'])
                ->whereHas('perfiles', function ($query) {
                    $query->where('perfil', 'aprendiz');
                })
                ->where('estado_id', 2)
                ->paginate(8);

            $aprendicesInactivos = Usuario::whereHas('perfiles', function ($query) {

            });

            return view('aprendiz.index', compact('aprendices', 'cantidadAprendices', 'aprendicesPorEstado', 'estadoVista'));
            
        } elseif ($estadoVista == 'p-formacion') {
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
            return view('aprendiz.inactivo', compact('aprendicesInactivos', 'aprendices'));
        } elseif ($estadoVista == 'p-ficha') {
            $aprendices = Usuario::select('usuarios.*')
                ->with(['estado', 'perfiles', 'aprendiz.estadoAprendiz'])
                ->whereHas('perfiles', function ($query) {
                    $query->where('perfil', 'aprendiz');
                })
                ->where('estado_id', 1);

            // Obtener solo las fichas que tienen aprendices
            $fichas = Ficha::with('programa_formacion')
                ->whereHas('aprendiz')  // Solo las fichas que tienen aprendices
                ->paginate(8); // Paginamos directamente aquí

            return view('aprendiz.ficha', compact('fichas', 'aprendices'));
        }
        }

    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        //
        $tipo_documentos = Tipo_documento::all();
        $sexos           = Sexo::all();
        return view('aprendiz.create')->with('tipo_documentos', $tipo_documentos)->with('sexos', $sexos);
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

        if ($usuario->save()) {
            $perfil = Perfil::where('perfil', 'aprendiz')->first();
            $usuario->perfiles()->attach($perfil->id);
            $aprendiz = Aprendiz::firstOrNew(['usuario_id' => $usuario->id]);
            if (!$aprendiz->exists) {
                $aprendiz->ficha_id = '1';
                $aprendiz->estado_aprendiz_id = '1';
                $aprendiz->save();
            }
            session()->flash('message', 'El usuario ' . $usuario->nombre . ' ' . $usuario->apellido . ' ha sido añadido de manera exitosa');
            return redirect('aprendiz');
        }
    }

    public function search(Request $request)
    {
        $query = $request->q;

        // Realiza la búsqueda de aprendices
        $aprendices = Usuario::query()
            ->with(['estado', 'perfiles'])
            ->whereHas('perfiles', function ($q) {
                $q->where('perfil', 'aprendiz');
            })
            ->where(function ($q) use ($query) {
                $q->where('nombre', 'LIKE', "%$query%");
            })
            ->where('estado_id', 1)
            ->paginate(8);
        return view('aprendiz.search', compact('aprendices'))->render();
        // return view('aprendiz.index', compact('aprendices'))->render();
    }

    public function show($id)
    {
        //dd($id);
        $usuario = Usuario::with('aprendiz', 'perfiles', 'estado', 'sexo', 'tipo_documento')->findOrFail($id);
        $numero_ficha = $usuario->aprendiz->ficha;
        $siglas_programa = $usuario->aprendiz->ficha->programa_formacion;
        $edad = \Carbon\Carbon::parse($usuario->fecha_nacimiento)->age;
        $direccion = \Illuminate\Support\Str::limit($usuario->direccion, 20);
        $fechaNacimiento = \Carbon\Carbon::parse($usuario->fecha_nacimiento)->format('Y-m-d');
        //dd($siglas_programa->toArray());
        return view('aprendiz.show', compact('usuario', 'numero_ficha', 'siglas_programa', 'edad', 'direccion', 'fechaNacimiento'))->render();
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
        $fechaNacimiento = \Carbon\Carbon::parse($usuario->fecha_nacimiento)->format('Y-m-d');
        // dd($fechaNacimiento);
        return view('aprendiz.edit', compact('usuario', 'sexos', 'tipo_documentos', 'direccion', 'fechaNacimiento'))->render();
    }

    public function updateEstado(AprendizRequest $request, $id)
    {
        //dd($request->all());
        //dd($request);
        $usuario = Usuario::findOrFail($id);

        if ($request->input('action') === 'desactivate') {
            $usuario->estado_id = 2;
            $usuario->save();
            $aprendices = Usuario::select('usuarios.*')
                ->with(['estado', 'perfiles'])
                ->whereHas('perfiles', function ($query) {
                    $query->where('perfil', 'aprendiz');
                })
                ->where('estado_id', 1)
                ->paginate(8);
            //dd($aprendices->toArray());

            $cantidadAprendices = Usuario::whereHas('perfiles', function ($query) {
                $query->where('perfil', 'aprendiz');
            })
                ->where('estado_id', 1)
                ->count();
            // dd($cantidadAprendices);

            $aprendicesPorEstado = Usuario::whereHas('perfiles', function ($query) {
                $query->where('perfil', 'aprendiz');
            })
                ->where('estado_id', 1)
                ->with(['aprendiz.estadoAprendiz'])
                ->get()
                ->map(function ($usuario) {
                    return $usuario->aprendiz->estadoAprendiz->nombre;
                })
                ->countBy();
            session()->flash('message', 'El usuario ' . $usuario->nombre . ' ' . $usuario->apellido . ' ha sido desactivado de manera exitosa');
            return view('aprendiz.index', compact('aprendices', 'cantidadAprendices', 'aprendicesPorEstado'));
        } elseif ($request->input('action') === 'activate') {
            $usuario->estado_id = 1;
            $usuario->save();
            $aprendices = Usuario::select('usuarios.*')
                ->with(['estado', 'perfiles'])
                ->whereHas('perfiles', function ($query) {
                    $query->where('perfil', 'aprendiz');
                })
                ->where('estado_id', 2)
                ->paginate(8);
            //dd($aprendices->toArray());

            $cantidadAprendices = Usuario::whereHas('perfiles', function ($query) {
                $query->where('perfil', 'aprendiz');
            })
                ->where('estado_id', 2)
                ->count();
            // dd($cantidadAprendices);

            $aprendicesPorEstado = Usuario::whereHas('perfiles', function ($query) {
                $query->where('perfil', 'aprendiz');
            })
                ->where('estado_id', 2)
                ->with(['aprendiz.estadoAprendiz'])
                ->get()
                ->map(function ($usuario) {
                    return $usuario->aprendiz->estadoAprendiz->nombre;
                })
                ->countBy();

            $aprendicesInactivos = Usuario::whereHas('perfiles', function ($query) {
                $query->where('perfil', 'aprendiz');
            })
                ->where('estado_id', 2)
                ->count();

            session()->flash('message', 'El usuario ' . $usuario->nombre . ' ' . $usuario->apellido . ' ha sido activado de manera exitosa');
            return view('aprendiz.inactivo', compact('aprendices', 'cantidadAprendices', 'aprendicesPorEstado', 'aprendicesInactivos'));
        }
    }

    public function update(AprendizRequest $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
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
        session()->flash('message', 'El usuario ' . $usuario->nombre . ' ' . $usuario->apellido . ' ha sido modificado de manera exitosa');
        return redirect('aprendiz');
    }

    public function destroy($id)
    {
        // $usuario = Usuario::findOrFail($id);
        // $usuario->estado_id = 2;
        // $usuario->save();
        // session()->flash('message', 'El usuario ' . $usuario->nombre . ' ' . $usuario->apellido . ' ha sido eliminado de manera exitosa');
        // return redirect('aprendiz');
    }

    public function aprendizPorFicha($id)
    {
        // Buscar la ficha y cargar los aprendices con sus usuarios
        $aprendices = Usuario::select('usuarios.*')
            ->with(['estado', 'perfiles', 'aprendiz.estadoAprendiz'])
            ->whereHas('perfiles', function ($query) {
                $query->where('perfil', 'aprendiz');  // Filtrar por el perfil "aprendiz"
            })
            ->where('estado_id', 1)  // Filtrar por estado activo
            ->whereHas('aprendiz', function ($query) use ($id) {
                $query->where('ficha_id', $id);  // Filtrar por el `ficha_id` enviado
            })
            ->paginate(8);  // Paginación de los resultados

        return view('aprendiz.index', compact('aprendices'));
        // Aquí podrás ver la estructura de datos

        // Retornar a la vista, pasando los aprendices de la fich
    }
}
