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
    return view('home.index');
});

Auth::routes();
	
Route::get('/lahome', 'HomeController@index')->name('home');

Route::resource('/equipos','equiposController');
Route::get('/apuestas','equiposController@index')->name('apuestas');

// Route::resource('/equipos', 'EquipoController');

Route::resource('/partidos', 'PartidoController');

Route::resource('/user', 'UserController');
