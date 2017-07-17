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



//Route::resource('usuario/publicacion','PublicacionControlador');

Route::get('/usuario/sesion', function () {
    return view('usuarios.vistasesion');
})->name('/usuario/sesion')->middleware('guest');

Route::resource('/cuenta/usuario','CuentaUsuario');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('area', function () {

//     return view('prueba')->with(['areas'=>DB::table('areas')->get(),
//     							'publicaciones'=>'sdf']);
// });

Route::resource('cuenta/publicaciones','PublicacionControlador');
Route::get('cuenta/publicaciones/destroyFile/{id}','PublicacionControlador@destroyFile');
Route::get('cuenta/publicaciones/addFilePulication/{id}','PublicacionControlador@addFilePulication');
Route::get('cuenta/publicaciones/pagePublication/{inicial}/{final}','PublicacionControlador@pagePublication');
Route::get('prueba','PublicacionControlador@prueba');