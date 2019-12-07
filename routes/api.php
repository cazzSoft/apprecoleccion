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

  //Route::post('/vehiculo', 'ServiciosGpsController@');
  Route::resource('postOpinion','BandejaOpinionesController');
  Route::get('/Getevaluacion/{id?}', 'EvaluacionServiciosController@obtenerEvaluacion');
  Route::resource('postRespuesta','RespuestaController');
  Route::resource('postPuntoReferencia','PuntoReferenciaController');

