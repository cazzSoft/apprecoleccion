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


Route::get('/home', 'HomeController@index');

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/inicio', function () {
    return view('apprecoleccion.home');
});


Auth::routes();

//=============== RUTAS DEL FUNCIONARIO ================
//Rutas de la Gestion Ruta
//Route::get('/gestionRutas','GestionRutasController@index');
 Route::resource('/ruta', 'RutaController');
 Route::get('/obtenerRuta', 'RutaController@obtenerRuta');
 Route::get('/obtenerPunto/{id}', 'RutaController@obtenerRutaGrafica');
 Route::resource('/puntoRuta', 'PuntoRutaController');
 //Rutas de la Gestión Vehiculo
 Route::resource('/vehiculo', 'RecolectorController');

//Rutas de puntos de rutas del mapa


 // Rutas de la Gestión del Chofer
 Route::resource('/chofer', 'ChoferController');

 // Rutas del registro de la ACTIVIDAD DIARIA
 Route::resource('/actividad_diaria', 'ActividadDiariaController');


//===============  RUTAS DEL ADMINISTRADOR ================
//bandeja de opiniones
 Route::resource('/bandejaOpiniones', 'BandejaOpinionesController');
 Route::get("datos_usuario/{id}","BandejaOpinionesController@datos_usuario");


//Rutas de la Evaluacion de Servicios
 Route::get('/EvaluacionServicios', 'EvaluacionServiciosController@index');
 Route::resource('/pregunta', 'PreguntaController');
 Route::resource('/evaluacion', 'EvaluacionController');
 Route::resource('/pregunta_evaluacion', 'PreguntaEvaluacionController');
//===============  REPORTES DE LA EVALUACION DE SERVICIOS ================
Route::resource('/reportes', 'RespuestaController');
Route::get("ReporteEvaluacionServiciosGeneral","RespuestaController@imprimirReporteGeneral");
Route::post("ReporteEvaluacionServiciosIndividual","RespuestaController@imprimirReporteIndividual");
Route::get("ObtenerDatos/{id}","RespuestaController@ObtenerDatos");
Route::get("ObtenerRespuestas/{id}","RespuestaController@ObtenerRespuestas");

//rutas de services api gps
 Route::get('/token', 'ServiciosApiGpsController@postToken');
 Route::get('/refreshToken', 'ServiciosApiGpsController@postRefreshToken');
 Route::get('/all', 'ServiciosApiGpsController@getDetalle');
 //Route::get('/carrosUser/{id}', 'ServiciosApiGpsController@rutasDeUsuario');
//Route::get('/evaluacion', 'EvaluacionServiciosController@obtenerEvaluacion');
//Route::get('/puntosRutas', 'PuntoRutaController@obtenerPuntosRutas');
 //Route::get('/cazz', 'ServiciosApiGpsController@prueba');
 //
// Route::resource('gato', 'PruebaController');
