<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/admin/categorias', function(){
    return view('admin.categorias');
});
Route::get('/admin/clientes', function(){
    return view('admin.clientes');
});
Route::get('/admin/productos', function(){
    return view('admin.productos');
});

Route::get('/admin/persona', function(){
    return view('admin.persona.index');
});