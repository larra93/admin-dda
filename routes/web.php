<?php

use App\Http\Controllers\ServicioController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('servicios', ServicioController::class);
Route::resource('productos', ProductoController::class);

Route::get('eliminarImagenProducto/{id}', [ProductoController::class, 'eliminarImagen'])->name('eliminarImagen');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
