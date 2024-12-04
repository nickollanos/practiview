<?php

namespace App\Http\Controllers;

use App\Http\Requests\AprendizRequest;
use App\Http\Requests\UsuarioRequest;
use App\Models\Perfil;
use App\Models\Sexo;
use App\Models\Tipo_documento;
use App\Models\Usuario;
use App\Models\Aprendiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AprendizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
            $aprendices = Usuario::select('usuarios.*') // Asegura que todos los campos de usuarios sean seleccionados
            ->with(['estado', 'perfiles']) // Carga las relaciones necesarias
            ->whereHas('perfiles', function ($query) {
                $query->where('perfil', 'aprendiz'); // Filtra usuarios con el perfil 'aprendiz'
            })
            //->where('estado_id', 1)
            ->paginate(8);
            //dd($aprendices->toArray());

            $cantidadAprendices = Usuario::whereHas('perfiles', function ($query) {
                $query->where('perfil', 'aprendiz');
            })
            ->where('estado_id', 1)
            ->count();

            $aprendicesPorEstado = Aprendiz::selectRaw('estado_aprendiz_id, COUNT(*) as cantidad')
            ->groupBy('estado_aprendiz_id') // Agrupar por estado_aprendiz_id
            ->with('estadoAprendiz') // Cargar los datos del estado
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->estadoAprendiz->nombre => $item->cantidad];
            });
            //dd($aprendicesPorEstado);

            return view('aprendiz.index', compact('aprendices', 'cantidadAprendices', 'aprendicesPorEstado'));
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
            session()->flash('message', 'El usuario ' . $usuario->nombre . ' ha sido añadido de manera exitosa');
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
        ->paginate(8);
        return view('aprendiz.search', compact('aprendices'))->render();
        return view('aprendiz.index', compact('aprendices'))->render();
    }

    public function show($id)
    {
        //dd($id);
        $usuario = Usuario::with('aprendiz', 'perfiles', 'estado', 'sexo', 'tipo_documento')->findOrFail($id);
        $numero_ficha = $usuario->aprendiz->ficha;
        $siglas_programa = $usuario->aprendiz->ficha->programa_formacion;
        //dd($siglas_programa->toArray());
        return view('aprendiz.show', compact('usuario', 'numero_ficha', 'siglas_programa'))->render();
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
        return view('aprendiz.edit', compact('usuario', 'sexos', 'tipo_documentos'))->render();
    }

    public function update(AprendizRequest $request, $id)
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
        return redirect('aprendiz');
    }

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->estado_id = 2;
        $usuario->save();
        session()->flash('message', 'El usuario ' . $usuario->nombre . ' ha sido eliminado de manera exitosa');
        return redirect('aprendiz');
    }

}
