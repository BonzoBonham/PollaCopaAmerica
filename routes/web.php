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

Auth::routes();
	
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/equipos','equiposController');

Route::GET('/partidos','ResultadosController@partidos');

Route::GET('/eliminatoria','ResultadosController@eliminatoria');

Route::GET('/grupos/{grupo}','ResultadosController@grupos')->name('resultados.grupos');