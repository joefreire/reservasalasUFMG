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
Route::get('/teste', function () {
	$sala = \DB::connection('mysql')->table('sala')
	->join('sala_departamentos', 'sala_departamentos.id_sala', '=', 'sala.id_sala')
	->join('departamento', 'departamento.id_departamento', '=', 'sala_departamentos.id_departamento')
	->first();
	dd($sala);
});
Route::get('/teste2', function () {
	$sala = \App\Models\Departamento::all()->pluck('nome','unidade.nome','_id');
	dd($sala);
});
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');




Route::middleware('auth')->group(function () {   
	Route::get('/home', 'HomeController@index')->name('home');

	Route::prefix('salas')->group(function () {
		Route::get('/', 'SalaController@index')->name('salas.index');
		Route::get('/novo', 'SalaController@create')->name('salas.create');
		Route::get('/{id}/destroy', 'SalaController@destroy')->name('salas.destroy');
		Route::get('/{id}/editar', 'SalaController@edit')->name('salas.edit');
		Route::post('/store', 'SalaController@store')->name('salas.store');
		Route::post('/getData', 'SalaController@getData')->name('salas.data');
		Route::get('/agenda/{id}', 'SalaController@agenda')->name('salas.agenda');
	});

	Route::prefix('departamentos')->group(function () {
		Route::get('/', 'DepartamentoController@index')->name('departamentos.index');
		Route::get('/novo', 'DepartamentoController@create')->name('departamentos.create');
		Route::get('/unidade/novo', 'DepartamentoController@createUnidade')->name('departamentos.create.unidade');
		Route::get('/{id}/destroy', 'DepartamentoController@destroy')->name('departamentos.destroy');
		Route::get('/{id}/editar', 'DepartamentoController@edit')->name('departamentos.edit');
		Route::get('/unidade/{id}/novo', 'DepartamentoController@editUnidade')->name('departamentos.edit.unidade');
		Route::post('/store', 'DepartamentoController@store')->name('departamentos.store');
		Route::post('/unidade/store', 'DepartamentoController@storeUnidade')->name('departamentos.store.unidade');
		Route::post('/getData', 'DepartamentoController@getData')->name('departamentos.data');
	});

	Route::prefix('usuarios')->group(function () {
		Route::get('/', 'UsersController@index')->name('users.index');
		Route::get('/novo', 'UsersController@create')->name('users.create');
		Route::get('/{id}/destroy', 'UsersController@destroy')->name('users.destroy');
		Route::get('/{id}/editar', 'UsersController@edit')->name('users.edit');
		Route::post('/store', 'UsersController@store')->name('users.store');
		Route::post('/getData', 'UsersController@getData')->name('users.data');
	});

	Route::prefix('disciplinas')->group(function () {
		Route::get('/', 'DisciplinaController@index')->name('disciplinas.index');
		Route::get('/novo', 'DisciplinaController@create')->name('disciplinas.create');
		Route::get('/{id}/destroy', 'DisciplinaController@destroy')->name('disciplinas.destroy');
		Route::get('/{id}/editar', 'DisciplinaController@edit')->name('disciplinas.edit');
		Route::post('/store', 'DisciplinaController@store')->name('disciplinas.store');
		Route::post('/getData', 'DisciplinaController@getData')->name('disciplinas.data');
	});

	Route::prefix('reservas')->group(function () {
		Route::get('/', 'ReservaController@index')->name('reservas.index');
		Route::get('/novo', 'ReservaController@create')->name('reservas.create');
		Route::get('/{id}/destroy', 'ReservaController@destroy')->name('reservas.destroy');
		Route::get('/{id}/editar', 'ReservaController@edit')->name('reservas.edit');
		Route::post('/store', 'ReservaController@store')->name('reservas.store');
		Route::post('/getData', 'ReservaController@getData')->name('reservas.data');
	});
});

