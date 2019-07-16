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

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

/** Rotas para listar,cadastrar, atualizar e deletar generos **/
Route::get('/generos','GeneroController@index');

Route::get('generos/cadastrar', 'GeneroController@create');

Route::post('generos', 'GeneroController@store');

Route::get('generos/{id}/editar', 'GeneroController@edit');

Route::patch('/generos/{id}', 'GeneroController@update');

Route::delete('generos/{id}', 'GeneroController@destroy');

/** Rotas para listar,cadastrar, atualizar e deletar filmes **/
Route::get('/filmes','FilmeController@index');

Route::get('filmes/cadastrar', 'FilmeController@create');

Route::post('filmes', 'FilmeController@store');

Route::get('filmes/{id}', 'FilmeController@show');

Route::get('filmes/{id}/editar', 'FilmeController@edit');

Route::patch('/filmes/{id}', 'FilmeController@update');

Route::delete('filmes/{id}', 'FilmeController@destroy');


