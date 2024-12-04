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
    public function index()
    {
            $aprendices = Usuario::select('usuarios.*') // Asegura que todos los campos de usuarios sean seleccionados
            ->with(['estado', 'perfiles']) // Carga las relaciones necesarias
            ->whereHas('perfiles', function ($query) {
                $query->where('perfil', 'aprendiz'); // Filtra usuarios con el perfil 'aprendiz'
            })
            ->paginate(8);
            //dd($aprendices->toArray());

            $cantidadAprendices = Usuario::whereHas('perfiles', function ($query) {
                $query->where('perfil', 'aprendiz');
            })->count();

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
            $image->move(public_path('images'), $foto_perfil); // Mueve la imagen a public/images
        } else {
            $foto_perfil = 'no-photo.png'; // Imagen predeterminada
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
            return redirect('aprendiz')
                ->with('message' . 'The usuario: ' . $usuario->nombre . ' was successfully added!');
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

    public function show(Aprendiz $aprendiz)
    {
        dd($aprendiz->toArray());
        $usuario = Usuario::where('id', $aprendiz->usuario_id)->first();
        dd($usuario->toArray());
        //return view('aprendiz.show')
                //->with('aprendiz',$aprendiz);
    }

}
