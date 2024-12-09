<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AprendizController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use App\Models\Empresa;
use App\Models\Usuario;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/evento', [EventoController::class, 'index']);
Route::get('/evento/mostrar', [EventoController::class, 'show']);

Route::post('/evento/agregar', [EventoController::class, 'store']);
Route::post('/evento/editar/{id}', action: [EventoController::class, 'edit']);
Route::post('/evento/actualizar/{evento}', action: [EventoController::class, 'update']);
Route::post('/evento/borrar/{id}', action: [EventoController::class, 'destroy']);

Route::get('aprendiz', function () {
    return view('aprendiz');
});

Route::get('/dashboard', function () {
    $cantidadAprendices = Usuario::whereHas('perfiles', function ($query) {
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

    return view('dashboard', compact('cantidadAprendices', 'cantidadInstructores', 'numeroEmpresas','aprendicesInactivos'));
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
    Route::post('empresa/search', [EmpresaController::class, 'search']);

    Route::resources([
        'usuarios' => UsuarioController::class,
        'aprendiz' => AprendizController::class,
        'empresa' => EmpresaController::class,
]);
});



require __DIR__.'/auth.php';
