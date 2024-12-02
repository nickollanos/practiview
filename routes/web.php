<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AprendizController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('aprendiz', function () {
    return view('aprendiz');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('instructor', [InstructorController::class, 'index'])->name('instructor.index');
Route::get('aprendiz', [aprendizController::class, 'index'])->name('aprendiz.index');

Route::middleware('auth')->group(function () {
    Route::get('myprofile', function () {
        return view('myprofile');
    });
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resources([
        'usuarios' => UsuarioController::class,
        'aprendiz' => AprendizController::class,
]);
});

require __DIR__.'/auth.php';
