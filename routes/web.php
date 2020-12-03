<?php

use Illuminate\Support\Facades\Route;

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

//LIVROS

Route::get('/livros','App\Http\Controllers\LivrosController@index')->name('livros.index');

Route::get('/livros/{id}/show','App\Http\Controllers\LivrosController@show')->name('livros.show');

Route::get('/livros/{id}/edit','App\Http\Controllers\LivrosController@edit')->name('livros.edit');

Route::patch('/livros/{id}','App\Http\Controllers\LivrosController@update')->name('livros.update');

Route::get('/livros/create','App\Http\Controllers\LivrosController@create')->name('livros.create');

Route::post('/livros/store', 'App\Http\Controllers\LivrosController@store')->name('livros.store');

Route::get('/livros/{id}/delete', 'App\Http\Controllers\LivrosController@delete')->name('livros.delete');

Route::delete('/livros', 'App\Http\Controllers\LivrosController@destroy')->name('livros.destroy');

//GENEROS


Route::get('/generos','App\Http\Controllers\GenerosController@index')->name('generos.index');

Route::get('/generos/{idg}/show','App\Http\Controllers\GenerosController@show')->name('generos.show');

Route::get('/generos/create','App\Http\Controllers\GenerosController@create')->name('generos.create');

Route::post('/generos/store', 'App\Http\Controllers\GenerosController@store')->name('generos.store');

Route::get('/generos/{idg}/edit','App\Http\Controllers\GenerosController@edit')->name('generos.edit');

Route::patch('/generos/{idg}','App\Http\Controllers\GenerosController@update')->name('generos.update');

Route::get('/generos/{idg}/delete', 'App\Http\Controllers\GenerosController@delete')->name('generos.delete');

Route::delete('/generos', 'App\Http\Controllers\GenerosController@destroy')->name('generos.destroy');

//EDITORAS


Route::get('/editoras','App\Http\Controllers\EditorasController@index')->name('editoras.index');

Route::get('/editoras/{ide}/show','App\Http\Controllers\EditorasController@show')->name('editoras.show');

Route::get('/editoras/create','App\Http\Controllers\EditorasController@create')->name('editoras.create');

Route::post('/editoras/store', 'App\Http\Controllers\EditorasController@store')->name('editoras.store');

Route::get('/editoras/{ide}/edit','App\Http\Controllers\EditorasController@edit')->name('editoras.edit');

Route::patch('/editoras/{ide}','App\Http\Controllers\EditorasController@update')->name('editoras.update');

Route::get('/editoras/{ide}/delete', 'App\Http\Controllers\EditorasController@delete')->name('editoras.delete');

Route::delete('/editoras', 'App\Http\Controllers\EditorasController@destroy')->name('editoras.destroy');



//AUTORES


Route::get('/autores','App\Http\Controllers\AutoresController@index')->name('autores.index');

Route::get('/autores/{ida}/show','App\Http\Controllers\AutoresController@show')->name('autores.show');

Route::get('/autores/create','App\Http\Controllers\AutoresController@create')->name('autores.create');

Route::post('/autores/store', 'App\Http\Controllers\AutoresController@store')->name('autores.store');

Route::get('/autores/{ida}/edit','App\Http\Controllers\AutoresController@edit')->name('autores.edit');

Route::patch('/autores/{ida}','App\Http\Controllers\AutoresController@update')->name('autores.update');

Route::get('/autores/{ida}/delete', 'App\Http\Controllers\AutoresController@delete')->name('autores.delete');

Route::delete('/autores', 'App\Http\Controllers\AutoresController@destroy')->name('autores.destroy');

//EDICOES


Route::get('/edicoes','App\Http\Controllers\EdicoesController@index')->name('edicoes.index');

Route::get('/edicoes/{}/show','App\Http\Controllers\EdicoesController@index')->name('edicoes.show');


//FORMULARIO

Route::get('/','App\Http\Controllers\PesquisaController@index')->name('pesquisa.index');

Route::post('/form','App\Http\Controllers\PesquisaController@formenviado')->name('pesquisa.form');








