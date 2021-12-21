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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/carros', [App\Http\Controllers\CarroController::class, 'index'])->name('carros.index');
Route::post('/carros', [App\Http\Controllers\CarroController::class, 'store'])->name('carros.store');
Route::get('/obter-carros', [App\Http\Controllers\CarroController::class, 'create'])->name('carros.create');
Route::delete('/carros/{carro}', [App\Http\Controllers\CarroController::class, 'destroy'])->name('carros.destroy');
Route::get('/obter-carros/falha', [App\Http\Controllers\CarroController::class, 'destroy'])->name('carros.falha');

