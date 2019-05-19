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
    return view('welcome');
});
Route::get('/grupos/{grupo}','ResultadosController@grupos');
Route::get('/eliminatoria','ResultadosController@eliminatoria');


Auth::routes();
	
Route::get('/home', 'HomeController@index')->name('home');

// No sé de quién - alguien creó otro controlador para los equipos
Route::resource('/equipos','equiposController');
Route::get('/apuestas','equiposController@index')->name('apuestas');

// Route::resource('/equipos', 'EquipoController');

Route::resource('/partidos', 'PartidoController');

Route::resource('/user', 'UserController');
