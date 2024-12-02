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

class AprendizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $aprendices = Usuario::with(['estado', 'perfiles'])

            ->whereHas('perfiles', function ($query) {
                $query->where('perfil', 'aprendiz'); // Cambia 'perfil' por la columna correcta en tu tabla `perfils`
            })
            ->paginate(8);
            // dd($aprendices->toArray());

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
        // dd($request->all());
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
        $usuario->firma = $firma1;
        $usuario->foto_perfil = $foto_perfil1;

        if ($usuario->save()) {
            $perfil = Perfil::where('perfil', 'aprendiz')->first();
            $usuario->perfiles()->attach($perfil->id);
            return redirect('dashboard')
                ->with('message' . 'The usuario: ' . $usuario->fullname . ' was successfully added!');
        }
    }

    public function search(Request $request)
    {
        $query = $request->q;
        $aprendices = Usuario::query()->aprendiz()->names($query, $query)->paginate(8);
        return view('aprendiz.search', compact('aprendices'))->render();
    }

}
