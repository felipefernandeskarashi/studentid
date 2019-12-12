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

Route::get('/home', 'StudentController@index');
Route::get('/adiciona', 'StudentController@create');
Route::post('/salva', 'StudentController@store');
Route::get('/estudantes/mostra/{student}', 'StudentController@show')->where('id','[0-9]+');
Route::get('/estudantes/{student}', 'StudentController@destroy');
Route::get('/estudantes/{student}/editar', 'StudentController@edit');
Route::put('/estudantes/{student}/atualizar', 'StudentController@update');

