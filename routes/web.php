<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AprendizController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\InstructorController;
use App\Models\Empresa;
use App\Models\Usuario;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $aprendicesActivos = Usuario::whereHas('perfiles', function ($query) {
        $query->where('perfil', 'aprendiz');
    })
        ->where('estado_id', 1)
        ->count();

    $aprendicesInactivos = Usuario::whereHas('perfiles', function ($query) {
        $query->where('perfil', 'aprendiz');
    })
        ->where('estado_id', 2)
        ->count();

    $instructoresActivos = Usuario::whereHas('perfiles', function ($query) {
        $query->where('perfil', 'instructor');
    })
    ->where('estado_id', 1)
    ->count();

    $instructoresInactivos = Usuario::whereHas('perfiles', function ($query) {
        $query->where('perfil', 'instructor');
    })
    ->where('estado_id', 2)
    ->count();

    $numeroEmpresas = Empresa::where('estado_id', 1)->count();
    //dd($cantidadActivos);

    return view('dashboard', compact('aprendicesActivos', 'instructoresActivos', 'numeroEmpresas','aprendicesInactivos','instructoresInactivos'));
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
    Route::post('aprendiz/searchFicha', [AprendizController::class, 'searchFicha']);
    Route::post('instructor/search', [InstructorController::class, 'search']);
    Route::get('aprendiz', [AprendizController::class, 'index'])->name('aprendiz.index');
    Route::get('aprendiz/paginate/{page}', [AprendizController::class, 'index'])->name('aprendiz.paginate');

    Route::resources([
        'usuarios' => UsuarioController::class,
        'aprendiz' => AprendizController::class,
        'instructor' => InstructorController::class,
        'empresa' => EmpresaController::class,
    ]);

    Route::get('/aprendiz/ficha/{id}', action: [AprendizController::class, 'aprendizPorFicha']);
    Route::get('/empresa/zona/{id}', action: [EmpresaController::class, 'empresaPorZona']);

    Route::get('/evento', [EventoController::class, 'index']);
    Route::get('/evento/mostrar', [EventoController::class, 'show']);

    Route::post('/evento/agregar', [EventoController::class, 'store']);
    Route::post('/evento/editar/{id}', action: [EventoController::class, 'edit']);
    Route::post('/evento/actualizar/{evento}', action: [EventoController::class, 'update']);
    Route::post('/evento/borrar/{id}', action: [EventoController::class, 'destroy']);
});



require __DIR__ . '/auth.php';
