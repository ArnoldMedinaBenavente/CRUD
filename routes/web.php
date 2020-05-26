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


Route::get('/','usersController@usuarios');
Route::get('/nuevo','usersController@nuevo');
Route::post('/guardar','usersController@guardar');
Route::get('/editar/{id}','usersController@editar');
Route::post('/actualizar/{id}','usersController@actualizar');
Route::post('/eliminar/{id}','usersController@eliminar');