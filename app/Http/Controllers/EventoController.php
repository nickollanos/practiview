<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\PostEventoMail;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('evento.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate(Evento::$rules);

        // Crear el evento usando los datos validados
        $evento = Evento::create([
            'title' => $validated['title'],
            'descripcion' => $validated['descripcion'],
            'start' => $validated['start'],
            'end' => $validated['end'],
        ]);

        Evento::create($request->all());
        Mail::to('practiview@gmail.com')->send(new PostEventoMail);
    
    
        // Retornar una respuesta de éxito con los datos del evento creado
        return response()->json($evento, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Evento $evento)
    {
        //
        $evento= Evento::all();
        return response()->json($evento);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $evento=Evento::find($id);

        $evento->start =Carbon::createFromFormat('Y-m-d H:i:s', $evento->start)->format('Y-m-d');
        $evento->end =Carbon::createFromFormat('Y-m-d H:i:s', $evento->end)->format('Y-m-d');

        return response()->json($evento);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evento $evento)
    {
        //
        request()->validate(Evento::$rules);
        $evento->update($request->all());
        return response()->json($evento);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $evento=Evento::find($id)->delete();
        return response()->json($evento);

    }
}
