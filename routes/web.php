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
    return view('index');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/salas', [App\Http\Controllers\HomeController::class, 'salas'])->name('salas');
Route::get('/admin/salas', [App\Http\Controllers\Admin\SalasController::class, 'index'])->name('admin.salas.index');
Route::post('/admin/salas/store', [App\Http\Controllers\Admin\SalasController::class, 'store'])->name('admin.salas.store');
Route::post('/admin/salas/{salaId}/update', [App\Http\Controllers\Admin\SalasController::class, 'update'])->name('admin.salas.update');
Route::delete('/admin/salas/{salaId}/delete', [App\Http\Controllers\Admin\SalasController::class, 'delete'])->name('admin.salas.delete');

Route::get('/eventos', [App\Http\Controllers\HomeController::class, 'eventos'])->name('eventos');
Route::get('/admin/eventos', [App\Http\Controllers\Admin\EventosController::class, 'index'])->name('admin.eventos.index');
Route::post('/admin/eventos/store', [App\Http\Controllers\Admin\EventosController::class, 'store'])->name('admin.eventos.store');
Route::post('/admin/eventos/{eventoId}/update', [App\Http\Controllers\Admin\EventosController::class, 'update'])->name('admin.eventos.update');
Route::delete('/admin/eventos/{eventoId}/delete', [App\Http\Controllers\Admin\EventosController::class, 'delete'])->name('admin.eventos.delete');


Auth::routes();
