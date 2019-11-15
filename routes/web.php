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

//=============== RUTAS DEL FUNCIONARIO ================
//Rutas de la Gestion Ruta
Route::get('/gestionRutas','GestionRutasController@index');
 Route::resource('/ruta', 'RutaController');
 Route::resource('/puntoRuta', 'EstablecerRutaController');

 //Rutas de la Gestión Vehiculo
 Route::resource('/vehiculo', 'RecolectorController');


 // Rutas de la Gestión del Chofer
 Route::resource('/chofer', 'ChoferController');

 // Rutas del registro de la ACTIVIDAD DIARIA
 Route::resource('/actividad_diaria', 'ActividadDiariaController');


//===============  RUTAS DEL ADMINISTRADOR ================
 Route::resource('/bandejaOpiniones', 'BandejaOpinionesController');
//Rutas de la Evaluacion de Servicios
 Route::get('/EvaluacionServicios', 'EvaluacionServiciosController@index');
 Route::resource('/pregunta', 'PreguntaController');
 Route::resource('/evaluacion', 'EvaluacionController');
 Route::resource('/pregunta_evaluacion', 'PreguntaEvaluacionController');



 
 //PRUEBAS
 Route::get('/prueba', 'PruebaApiController@index3');
 


