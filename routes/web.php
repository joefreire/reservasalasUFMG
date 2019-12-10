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
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');




Route::middleware('auth')->group(function () {   
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('salas', 'SalaController');
	Route::get('/salas/agenda/{id}', 'SalaController@agenda')->name('salas.agenda');
	Route::resource('departamentos', 'DepartamentoController');
	Route::post('/departamentos/getData', 'DepartamentoController@getData')->name('departamentos.data');
});

