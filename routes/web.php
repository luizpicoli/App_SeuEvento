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

//Route::get('/', function () {
//    return view('index');
//});

Route::resource('eventos', 'EventoController');
Route::get('eventosfoto/{id}', 'EventoController@foto')
        ->name('eventos.foto');
Route::post('eventosfotostore', 'EventoController@storefoto')
        ->name('eventos.storefoto');
Route::get('eventospesq', 'EventoController@pesq')
        ->name('eventos.pesq');
Route::post('eventosfiltro', 'EventoController@filtro')
        ->name('eventos.filtro');

Route::get('eventosgraf', 'EventoController@graf')
        ->name('eventos.graf');


Auth::routes();

Route::get('/', 'HomeController@index');

//Route::get('register', function() {
  //  return "<h1> Permissão Negada </h1>";
//});



