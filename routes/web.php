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
Route::get('/test', function () {
    return view('test');
});

Route::get('/grupos/{grupo}','ResultadosController@grupos');
Route::get('/eliminatoria','ResultadosController@eliminatoria');
Route::get('/partidos','ResultadosController@partidos');

Auth::routes();
	
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/equipos','equiposController');

Route::resource('/user', 'UserController');

Route::GET('/partidos','ResultadosController@partidos');

Route::GET('/eliminatoria','ResultadosController@eliminatoria');

Route::GET('/grupos/{grupo}','ResultadosController@grupos')->name('resultados.grupos');