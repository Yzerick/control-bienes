<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\BienController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\AsignacionController;

Route::get('/', function () {
    return view('welcome');
})-> name('welcome');

Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('/bienes', [BienController::class, 'index'])->name('bienes.index');
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::get('/ubicaciones', [UbicacionController::class, 'index'])->name('ubicaciones.index');
Route::get('/asignaciones', [AsignacionController::class, 'index'])->name('asignaciones.index');
