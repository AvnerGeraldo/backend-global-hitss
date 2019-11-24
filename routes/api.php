<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Personagens
Route::get('/personagens', 'PersonagemController@index');
Route::get('/personagens/{id}', 'PersonagemController@show');
Route::match(['post', 'put', 'delete'], '/personagens/{any?}', 'PersonagemController@notAuthorized');

//Turnos
Route::get('/turnos', 'TurnoController@index');
Route::get('/turnos/{id}', 'TurnoController@show');
Route::post('/turnos', 'TurnoController@store');
Route::put('/turnos', 'TurnoController@update');
Route::delete('/turnos/{any?}', 'TurnoController@notAuthorized');

//Batalhas
Route::post('/batalhas', 'BatalhaController@store');