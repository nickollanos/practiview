<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class AdminController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$users = User::all();
        $usuarios = Usuario::paginate(5);
        return view('usuarios.index')->with('usuarios', $usuarios);
    }

    public function create()
    {
        //
        
        return view('admin.create');
    }
}
