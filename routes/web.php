<?php

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\DirectorioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Rutas de directorio
Route::get('/', [DirectorioController::class, 'index'])->name('directorio.inicio');

Route::get('/crear', [DirectorioController::class, 'crear'])->name('directorio.crear');
Route::post('/store', [DirectorioController::class, 'store'])->name('directorio.store');

Route::get('/buscar', [DirectorioController::class, 'buscar'])->name('directorio.buscar');
Route::get('/find', [DirectorioController::class, 'find'])->name('directorio.find');


Route::get('/ver/{codigo}', [DirectorioController::class, 'ver'])->name('directorio.ver');

Route::get('/eliminar/{codigo}', [DirectorioController::class, 'eliminar'])->name('directorio.eliminar');
Route::get('/destroy/{codigo}', [DirectorioController::class, 'destroy'])->name('directorio.destroy');

//Rutas de contactos
Route::get('/contactos/crear/{codigoEntrada}',[ContactoController::class, 'agregarNuevoContacto'])->name('contacto.agregar');
Route::post('/contactos/store', [ContactoController::class, 'store'])->name('contacto.store');

Route::get('/contactos/eliminar/{id}', [ContactoController::class, 'eliminar'])->name('contacto.eliminar');
Route::get('/contactos/destroy/{id}', [ContactoController::class, 'destroy'])->name('contacto.destroy');


