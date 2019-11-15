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
    return view('apprecoleccion.home');
});  

Auth::routes();

//rutas de gestión funcionario
 Route::get('/ruta', 'RutaController@index');
 Route::get('/prueba', 'PruebaApiController@index3');
 //Route::get('/ruta', 'RutaController@index');
 //Route::get('/ruta', 'RutaController@index');
 //Route::get('/ruta', 'RutaController@index');
 //Route::get('/ruta', 'RutaController@index');
 //Route::get('/ruta', 'RutaController@index');
 //Route::get('/ruta', 'RutaController@index');
 //Route::get('/ruta', 'RutaController@index');