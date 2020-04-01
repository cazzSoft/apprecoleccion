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


Route::get('/home', 'HomeController@index')->middleware('auth');

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/inicio', function () {
//     return view('apprecoleccion.home');
// });


Auth::routes();

//=============== RUTAS DEL FUNCIONARIO ================
//Rutas de la Gestion Ruta
//Route::get('/gestionRutas','GestionRutasController@index');
 Route::resource('/ruta', 'RutaController')->middleware('auth');
 Route::get('/obtenerRuta', 'RutaController@obtenerRutamapa')->middleware('auth');
 Route::get('/obtenerPunto/{id}', 'RutaController@obtenerRutaGrafica')->middleware('auth');
 Route::resource('/puntoRuta', 'PuntoRutaController')->middleware('auth');
 //Rutas de la Gestión Vehiculo
 Route::resource('/vehiculo', 'RecolectorController')->middleware('auth');

//Rutas de puntos de rutas del mapa


 // Rutas de la Gestión del Chofer
 Route::resource('/chofer', 'ChoferController')->middleware('auth');

 // Rutas del registro de la ACTIVIDAD DIARIA
 Route::resource('/actividad_diaria', 'ActividadDiariaController')->middleware('auth');


//===============  RUTAS DEL ADMINISTRADOR ================
//bandeja de opiniones
 Route::resource('/bandejaOpiniones', 'BandejaOpinionesController')->middleware('auth');
 Route::get("datos_usuario/{id}","BandejaOpinionesController@datos_usuario")->middleware('auth');


//Rutas de la Evaluacion de Servicios
 Route::get('/EvaluacionServicios', 'EvaluacionServiciosController@index')->middleware('auth');
 Route::resource('/pregunta', 'PreguntaController')->middleware('auth');
 Route::resource('/evaluacion', 'EvaluacionController')->middleware('auth');
 Route::resource('/pregunta_evaluacion', 'PreguntaEvaluacionController')->middleware('auth');
//===============  REPORTES DE LA EVALUACION DE SERVICIOS ================
Route::resource('/reportes', 'RespuestaController')->middleware('auth');
Route::get("ReporteEvaluacionServiciosGeneral","RespuestaController@imprimirReporteGeneral")->middleware('auth');
Route::post("ReporteEvaluacionServiciosIndividual","RespuestaController@imprimirReporteIndividual")->middleware('auth');
Route::get("ObtenerDatos/{id}","RespuestaController@ObtenerDatos")->middleware('auth');
Route::get("ObtenerRespuestas/{id}","RespuestaController@ObtenerRespuestas")->middleware('auth');

//rutas de services api gps
 Route::get('/token', 'ServiciosApiGpsController@postToken')->middleware('auth');
 Route::get('/refreshToken', 'ServiciosApiGpsController@postRefreshToken')->middleware('auth');
 Route::get('/all', 'ServiciosApiGpsController@getDetalle')->middleware('auth');
 //Route::get('/carrosUser/{id}', 'ServiciosApiGpsController@rutasDeUsuario');
//Route::get('/evaluacion', 'EvaluacionServiciosController@obtenerEvaluacion');
//Route::get('/puntosRutas', 'PuntoRutaController@obtenerPuntosRutas');
 //Route::get('/cazz', 'ServiciosApiGpsController@prueba');
 //
// Route::resource('gato', 'PruebaController');
