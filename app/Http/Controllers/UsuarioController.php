<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Http\Requests\UsuarioRequest;
use PDF;
use App\Exports\UsuarioExport;

class UsuarioController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$users = User::all();
        $usuarios = Usuario::paginate(5);
        return view('usuarios.index')->with('usuarios',$usuarios);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsuarioRequest $request)
    {
        //
        // dd($request->all());
        if($request->hasFile('photo')){
            $photo = time() . '.' . $request->photo->extension();
            dd($photo);
            $request->photo->move(public_path('images'), $photo);
        }


    $usuario = new Usuario;
    $usuario->document = $request->document;
    $usuario->fullname = $request->fullname;
    $usuario->gender = $request->gender;
    $usuario->birthdate = $request->birthdate;
    $usuario->photo = $request->photo;
    $usuario->phone = $request->phone;
    $usuario->email = $request->email;
    $usuario->password = bcrypt($request->password);

    if($usuario->save()){
        return redirect('usuarios')
                ->with('message' . 'The usuario: ' . $usuario->fullname . ' was successfully added!');
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //dd($usuario->toArray());
        return view('usuarios.show')
                ->with('usuario',$usuario);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        //dd($usuario->toArray());
        return view('usuarios.edit')
                ->with('usuario',$usuario);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsuarioRequest $request, Usuario $usuario)
    {

        if($request->hasFile('photo')){
                // $file = $request->file('photo');
                // $photo = $file->getClientOriginalName();
                $photo = time() . '.' . $request->photo->extension();//getClientOriginalName();
                $request->photo->move(public_path('images'), $photo);
        }else{
            $photo = $request->originphoto;
        }

        $usuario->document = $request->document;
        $usuario->fullname = $request->fullname;
        $usuario->gender = $request->gender;
        $usuario->birthdate = $request->birthdate;
        $usuario->photo = $photo;
        $usuario->phone = $request->phone;
        $usuario->email = $request->email;

        if($usuario->save()){
            return redirect('usuarios')
                    ->with('message' . 'The usuario: ' . $usuario->fullname . ' was successfully updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Usuario $usuario)
    // {
    //     if($usuario->delete()){
    //         return redirect('usuarios')
    //                 ->with('message' . 'The usuario: ' . $usuario->fullname . ' was successfully deleted!');
    //     }
    // }

    public function destroy($id)
    {
    $usuario = Usuario::findOrFail($id);
    $usuario->delete();

    return redirect()->route('usuarios.index')->with('message', 'Usuario eliminado exitosamente');
    }

    public function search(Request $request){
        $usuarios = Usuario::names($request->q)->paginate(5);
        return view('usuarios.search')->with('usuarios', $usuarios);
    }

    // public function pdf(){
    //     $usuarios = Usuario::all();
    //     $pdf = PDF::loadView('usuarios.pdf', compact('usuarios'));
    //     return $pdf->download('allusuarios.pdf');
    // }

    // public function excel(){
    //     return \Excel::download(new UsuarioExport, 'allusuarios.xlsx');
    // }
}
