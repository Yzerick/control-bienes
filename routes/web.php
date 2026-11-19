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

//usuarios
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/crear', [UsuarioController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/{usuario}/editar', [UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{usuario}', [UsuarioController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');




//bienes
Route::get('/bienes', [BienController::class, 'index'])->name('bienes.index');

//categorias
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');

//ubicaciones
//ubicaciones
Route::get('/ubicaciones', [UbicacionController::class, 'index'])->name('ubicaciones.index');
Route::get('/ubicaciones/crear', [UbicacionController::class, 'create'])->name('ubicaciones.create');
Route::post('/ubicaciones', [UbicacionController::class, 'store'])->name('ubicaciones.store');
Route::get('/ubicaciones/{ubicacion}/editar', [UbicacionController::class, 'edit'])->name('ubicaciones.edit');
Route::put('/ubicaciones/{ubicacion}', [UbicacionController::class, 'update'])->name('ubicaciones.update');
Route::delete('/ubicaciones/{ubicacion}', [UbicacionController::class, 'destroy'])->name('ubicaciones.destroy');

//asignaciones
Route::get('/asignaciones', [AsignacionController::class, 'index'])->name('asignaciones.index');
