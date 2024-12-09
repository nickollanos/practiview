<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AprendizController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use App\Models\Empresa;
use App\Models\Usuario;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    $cantidadActivos = Usuario::whereHas('perfiles', function ($query) {
        $query->where('perfil', 'aprendiz');
    })
    ->where('estado_id', 1)
    ->count();

    $aprendicesInactivos = Usuario::whereHas('perfiles', function ($query) {
        $query->where('perfil', 'aprendiz');
    })
    ->where('estado_id', 2)
    ->count();

    $cantidadInstructores = Usuario::whereHas('perfiles', function ($query) {
        $query->where('perfil', 'instructor');
    })
    ->where('estado_id', 1)
    ->count();
    $numeroEmpresas = Empresa::where('estado_id', 1)->count();
    //dd($cantidadActivos);

    return view('dashboard', compact('cantidadActivos', 'cantidadInstructores', 'numeroEmpresas','aprendicesInactivos'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('myprofile', function () {
        return view('myprofile');
    });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::get('/aprendiz/{id}', [AprendizController::class, 'show'])->name('aprendiz.show');
    Route::patch('aprendiz/{id}/updateEstado', [AprendizController::class, 'updateEstado']);
    Route::post('aprendiz/search', [AprendizController::class, 'search']);

    Route::resources([
        'usuarios' => UsuarioController::class,
        'aprendiz' => AprendizController::class
]);
});



require __DIR__.'/auth.php';
