<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AprendizController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use App\Models\Usuario;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('aprendiz', function () {
    return view('aprendiz');
});

Route::get('/dashboard', function () {
    $cantidadAprendices = Usuario::whereHas('perfiles', function ($query) {
        $query->where('perfil', 'aprendiz');
    })->count();
    return view('dashboard', compact('cantidadAprendices'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('myprofile', function () {
        return view('myprofile');
    });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::get('/aprendiz/{id}', [AprendizController::class, 'show'])->name('aprendiz.show');
    Route::post('aprendiz/search', [AprendizController::class, 'search']);

    Route::resources([
        'usuarios' => UsuarioController::class,
        'aprendiz' => AprendizController::class,
]);
});



require __DIR__.'/auth.php';
