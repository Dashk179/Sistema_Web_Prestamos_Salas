<?php

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
    return redirect('home');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Usuarios
Route::delete('/auth/register/{userId}/delete', [App\Http\Controllers\UserController::class,'delete'])->name('usuarios.delete');

Route::get('/auth/register', [App\Http\Controllers\Auth\RegisterController::class,'showRegistrationForm'])->name('register');

Route::get('/salas/{salaId}', [App\Http\Controllers\HomeController::class, 'salas'])->name('salas');


//Salas
Route::get('/admin/salas', [App\Http\Controllers\Admin\SalasController::class, 'index'])->middleware('can:admin.salas.index')->name('admin.salas.index');
Route::post('/admin/salas/store', [App\Http\Controllers\Admin\SalasController::class, 'store'])->middleware('can:admin.salas.store')->name('admin.salas.store');
Route::post('/admin/salas/{salaId}/update', [App\Http\Controllers\Admin\SalasController::class, 'update'])->middleware('can:admin.salas.update')->name('admin.salas.update');
Route::delete('/admin/salas/{salaId}/delete', [App\Http\Controllers\Admin\SalasController::class, 'delete'])->middleware('can:admin.salas.delete')->name('admin.salas.delete');


//Eventos
Route::get('/eventos', [App\Http\Controllers\HomeController::class, 'eventos'])->name('eventos');
Route::get('/admin/eventos', [App\Http\Controllers\Admin\EventosController::class, 'index'])->name('admin.eventos.index');
Route::get('/admin/eventos/getMaterialesPorSala', [App\Http\Controllers\Admin\EventosController::class, 'getMaterialesPorSala'])->name('getMaterialesPorSala');
Route::post('/admin/eventos/store', [App\Http\Controllers\Admin\EventosController::class, 'store'])->name('admin.eventos.store');
Route::post('/admin/eventos/{eventoId}/update', [App\Http\Controllers\Admin\EventosController::class, 'update'])->name('admin.eventos.update');
Route::delete('/admin/eventos/{eventoId}/delete', [App\Http\Controllers\Admin\EventosController::class, 'delete'])->name('admin.eventos.delete');

//Materiales
Route::get('/admin/materiales', [App\Http\Controllers\Admin\MaterialesController::class, 'index'])->middleware('can:admin.materiales.index')->name('admin.materiales.index');
Route::post('/admin/materiales/store', [App\Http\Controllers\Admin\MaterialesController::class, 'store'])->middleware('can:admin.materiales.store')->name('admin.materiales.store');
Route::post('/admin/materiales/{materialId}/update', [App\Http\Controllers\Admin\MaterialesController::class, 'update'])->middleware('can:admin.materiales.update')->name('admin.materiales.update');
Route::delete('/admin/materiales/{materialId}/delete', [App\Http\Controllers\Admin\MaterialesController::class, 'delete'])->middleware('can:admin.materiales.delete')->name('admin.materiales.delete');

//
//Route::get('/admin/eventos', [App\Http\Controllers\Admin\EventomaterialtablasController::class, 'index'])->name('admin.eventos.index');
//Esta ruta GET nos sirve para enviar los correos de Eventos Registrados a los usuarios solicitantes al momento de crear un evento
Route::get('/admin/eventos/store', [App\Http\Controllers\Admin\EventosController::class, 'correoEventoRegistrado'])->name('admin.eventos.store');

//Contenido de correo
Route::get('admin/correoContenido', [App\Http\Controllers\Admin\ContenidoCorreoController::class, 'index'])->middleware('can:admin.materiales.index')->name('admin.correoContenido.index');
Route::post('admin/correoContenido/store', [App\Http\Controllers\Admin\ContenidoCorreoController::class, 'store'])->middleware('can:admin.correoContenido.store')->name('admin.correoContenido.store');
Route::post('admin/correoContenido/{contenidoId}/update', [App\Http\Controllers\Admin\ContenidoCorreoController::class, 'update'])->middleware('can:admin.correoContenido.update')->name('admin.correoContenido.update');

Auth::routes();
