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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//api prueba
  // Route::get('/ObtenerDatosGps', 'ServiciosGpsController@obtenerCoordenada');
  Route::get('/loqinAutenticate/{dni?}/{pass?}', 'ServiciosApiGpsController@autenticateLogin');
  // Route::resource('crear', 'BandejaOpinionesController');

  // Route::get('/prue/{lat?}/{lng?}', 'ServiciosApiGpsController@calle');//para prueba

  Route::resource('postOpinion','BandejaOpinionesController');//insertar opinion

  Route::get('/Getevaluacion/{id?}', 'EvaluacionServiciosController@obtenerEvaluacion');//traer evaluaciones
  Route::get('/GetevaluacionPregunta/{id}', 'EvaluacionServiciosController@obtenerEvaluacionPregunta');//traer pregunta eva
  Route::resource('postRespuesta','RespuestaController');//guardar respuestas de la evaluacion

  Route::get('/carrosUser/{id}', 'ServiciosApiGpsController@rutasDeUsuario');//coordenadas de los vehiculos


  Route::get('/puntoInteres/{id}', 'PuntoReferenciaController@getPundoInteres');//obtiene los puntos
  Route::get('/rutaCercana/{lat?}/{lng?}/{idp}/{idr}', 'PuntoRutaController@autoRuta');//esto era para prueba
  //funcion para obtener ruta
  Route::get('/obtenerRuta/{ruta?}', 'PuntoRutaController@obtenerRuta');
  Route::get('/obtenerRutId/{id}', 'PuntoRutaController@obtenerRutaId');
  //configuracion de notificaciones
  Route::resource('/notificacion', 'NotificacionController');
  Route::get('/obtenerNotificacion/{id}', 'NotificacionController@obtenerNoficicacion');
  // Route::get('/notificar/{id}', 'NotificacionController@NoficicacionRuta');//para notificar
  Route::post('/postNotificacionDistancia', 'NotificacionController@actualizarNotificacion');
  //crear punto referencia ruta
  Route::resource('/postPuntoReferenciaRuta','PuntoReferenciaRutaController');
//insertar punto de referencia
  Route::resource('postPuntoReferencia','PuntoReferenciaController');
  //obtenerHorarios
  Route::get('/obtenrHorario/{id}', 'ActividadDiariaController@getHorarioRecolector');
