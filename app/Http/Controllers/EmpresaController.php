<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresaRequest;
use App\Models\Empresa;
use App\Models\Zona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $estadoVista = $request->input('estado');
        if ($estadoVista == 'activos') {
            $empresas = Empresa::select('empresas.*') // Asegura que todos los campos de usuarios sean seleccionados
                ->where('estado_id', 1)
                ->paginate(8);
            //dd($aprendices->toArray());

            $cantidadEmpresas = Empresa::select('empresas.*')
                ->where('estado_id', 1)
                ->count();

            $empresasPorEstado = Empresa::selectRaw('estado_id, COUNT(*) as cantidad')
                ->groupBy('estado_id') // Agrupar por estado_aprendiz_id
                ->with('estado') // Cargar los datos del estado
                ->get()
                ->mapWithKeys(function ($item) {
                    return [$item->estado->estado => $item->cantidad];
                });
            //dd($aprendicesPorEstado);

            return view('empresa.index', compact('empresas', 'cantidadEmpresas', 'empresasPorEstado'));
        } elseif ($estadoVista == 'E.zona') {
            // Obtener las empresas con su zona asociada y filtrar por estado activo
            $empresas = Empresa::with('zona') // Cargar la zona asociada
                ->where('estado_id', 1) // Filtrar empresas activas
                ->paginate(8);

            return view('empresa.zona', compact('empresas'));
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        //
        $zonas           = Zona::all();
        return view('empresa.create')->with('zonas', $zonas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $empresa = new Empresa();
        $empresa->nombre = $request->nombre;
        $empresa->numero_nit = $request->numero_nit;
        $empresa->zona_id = $request->zona_id;
        $empresa->telefono = $request->telefono;
        $empresa->email = $request->email;
        $empresa->estado_id = 1;
        $empresa->direccion = $request->direccion;

        $empresa->save();
        session()->flash('message', 'El usuario ' . $empresa->nombre . ' ha sido añadido de manera exitosa');
        return redirect('empresa');
    }

    public function search(Request $request)
    {
        $empresas = Empresa::names($request->q)->where('estado_id', 1)->paginate(8);
        return view('empresa.search')->with('empresas', $empresas);
    }

    public function show($id)
    {
        //dd($id);
        $empresa = Empresa::with('estado', 'zona')->findOrFail($id);
        $zona = $empresa->zona->nombre;
        //dd($siglas_programa->toArray());
        return view('empresa.show', compact('empresa', 'zona'))->render();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //dd($id);
        $zonas = Zona::all();
        $empresa = Empresa::with('estado', 'zona')->findOrFail($id);
        return view('empresa.edit', compact('empresa', 'zonas'))->render();
    }

    public function update(EmpresaRequest $request, $id)
    {
        $empresa = Empresa::findOrFail($id);
        //dd($request->toArray());

        $empresa->nombre = $request->nombre;
        $empresa->numero_nit = $request->numero_nit;
        $empresa->zona_id = $request->zona_id;
        $empresa->telefono = $request->telefono;
        $empresa->email = $request->email;
        $empresa->estado_id = 1;
        $empresa->direccion = $request->direccion;

        $empresa->save();
        session()->flash('message', 'El usuario ' . $empresa->nombre . ' ha sido modificado de manera exitosa');
        return redirect('empresa');
    }

    public function destroy($id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->estado_id = 2;
        $empresa->save();
        session()->flash('message', 'El usuario ' . $empresa->nombre . ' ha sido eliminado de manera exitosa');
        return redirect('empresa');
    }

    public function empresaPorZona($id)
    {
        // Buscar las empresas por zona
        $empresas = Empresa::with('zona') // Cargar la relación con zonas
            ->where('estado_id', 1) // Filtrar empresas activas
            ->where('zona_id', $id) // Filtrar por la zona
            ->paginate(8); // Paginación de los resultados

        $cantidadEmpresas = Empresa::select('empresas.*')
            ->where('estado_id', 1)
            ->count();

        $empresasPorEstado = Empresa::selectRaw('estado_id, COUNT(*) as cantidad')
            ->groupBy('estado_id') // Agrupar por estado_aprendiz_id
            ->with('estado') // Cargar los datos del estado
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->estado->estado => $item->cantidad];
            });

        return view('empresa.index', compact('empresas', 'cantidadEmpresas', 'empresasPorEstado'));
    }
}
