<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\BienController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\AsignacionController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Rutas protegidas: obligan a iniciar sesión primero
Route::middleware(['auth'])->group(function () {
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('bienes', BienController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('ubicaciones', UbicacionController::class);
    Route::resource('asignaciones', AsignacionController::class);
});