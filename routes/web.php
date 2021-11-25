<?php

use App\Http\Controllers\ServicioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SobreNosotrosController;
use App\Http\Controllers\TerminosController;
use App\Http\Controllers\CompraController;
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

Route::resource('admin/servicios', ServicioController::class);
Route::resource('admin/productos', ProductoController::class);
Route::resource('admin/clientes', ClienteController::class);
Route::resource('admin/categorias', CategoriaController::class);
Route::resource('admin/sobreNosotros', SobreNosotrosController::class);
Route::resource('admin/terminos', TerminosController::class);
Route::resource('admin/compra', CompraController::class);


Route::get('eliminarImagenProducto/{id}', [ProductoController::class, 'eliminarImagen'])->name('eliminarImagen');
Route::post('/guardarImagen', [ProductoController::class, 'guardarImagen']);
Route::post('/guardarImagenGaleria', [ProductoController::class, 'guardarImagenGaleria'])->name('guardarImagenGaleria');




//Vista web

Route::get('/', [ProductoController::class, 'mostrar_index']);
Route::get('/productos', [ProductoController::class, 'get_productos']);
Route::get('/detalleProducto/{id}', [ProductoController::class, 'detalle_producto'])->name('detalleProducto');
Route::post('/producto', [ProductoController::class, 'buscar_producto'])->name('buscar_producto');

Route::get('/sobreNosotros', [SobreNosotrosController::class, 'get_sobreNosotros']);
Route::get('/terminos', [TerminosController::class, 'get_terminos']);
Route::get('/comoComprar', [CompraController::class, 'get_comoComprar']);
Route::get('/prensa', [CompraController::class, 'get_prensa']);



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
