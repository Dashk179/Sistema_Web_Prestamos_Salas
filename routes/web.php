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

Route::get('/cubiculos', [App\Http\Controllers\HomeController::class, 'cubiculos'])->name('cubiculos');
Route::get('/admin/cubiculos', [App\Http\Controllers\Admin\CubiculosController::class, 'index'])->name('admin.cubiculos.index');
Route::post('/admin/cubiculos/store', [App\Http\Controllers\Admin\CubiculosController::class, 'store'])->name('admin.cubiculos.store');
Route::post('/admin/cubiculos/{cubiculoId}/update', [App\Http\Controllers\Admin\CubiculosController::class, 'update'])->name('admin.cubiculos.update');


Auth::routes();
