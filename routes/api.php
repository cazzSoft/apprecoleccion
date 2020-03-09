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

  Route::get('/prue/{lat?}/{lng?}', 'ServiciosApiGpsController@calle');

  Route::resource('postOpinion','BandejaOpinionesController');

  Route::get('/Getevaluacion/{id?}', 'EvaluacionServiciosController@obtenerEvaluacion');
  Route::get('/GetevaluacionPregunta/{id}', 'EvaluacionServiciosController@obtenerEvaluacionPregunta');
  Route::resource('postRespuesta','RespuestaController');

  Route::get('/carrosUser/{id}', 'ServiciosApiGpsController@rutasDeUsuario');

  Route::get('/puntoInteres/{id}', 'PuntoReferenciaController@getPundoInteres');
  Route::get('/puntosRutas', 'PuntoRutaController@obtenerPuntosRutas');//esto era para prueba
  //funcion para obtener ruta
  Route::get('/obtenerRuta/{ruta?}', 'PuntoRutaController@obtenerRuta');

  //configuracion de notificaciones
  Route::resource('/notificacion', 'NotificacionController');
  Route::get('/obtenerNotificacion/{id}', 'NotificacionController@obtenerNoficicacion');
  Route::post('/postNotificacion', 'NotificacionController@actualizarNotificacion');
  Route::post('/activarNotificacion', 'NotificacionController@activarNotificacion');
  //crear punto referencia ruta
  Route::resource('/postPuntoReferenciaRuta','PuntoReferenciaRutaController');
//insertar punto de referencia
  Route::resource('postPuntoReferencia','PuntoReferenciaController');