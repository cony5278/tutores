<?php

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
    return view('principal.index');
})->name('/')->middleware('guest');
Route::resource('/usuario/sesion','Usuarios');
Route::get('/usuario/sesion', function () {
    return view('usuarios.vistasesion');
})->name('/usuario/sesion')->middleware('guest');

Route::get('/cuenta/usuario', function () {
    return view('usuarios.vistacuenta');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
