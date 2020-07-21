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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('allPeliculas', 'HomeController@GetPeliculas');
Route::get('pelicula','PeliculaController@Index')->name('pelicula');
Route::post('pelicula','PeliculaController@Store');
Route::get('pelicula/edit/{idPelicula}','PeliculaController@EditPelicula');
Route::post('pelicula/edit','PeliculaController@UpdatePelicula');
Route::get('pelicula/delete/{idPelicula}','PeliculaController@DeletePelicula');