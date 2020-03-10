<?php

namespace App\Http\Controllers;

use App\NotificacionModel;
use App\UsuarioModel;
use Illuminate\Http\Request;
class NotificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function obtenerNoficicacion($id)
    {
       $obtener=NotificacionModel::with('puntoReferenciaRuta')->where('idusuario',$id)->get();
       $request=[];
       foreach ($obtener as $key => $value) {
            array_push($request,['idnotificacion'=>$value->idnotificacion,'ruta'=>$value->puntoReferenciaRuta[0]['ruta'][0]['nombre_ruta'],'descripcion'=>$value->puntoReferenciaRuta[0]['ruta'][0]['descripcion'],'puntoReferencia'=>$value->puntoReferenciaRuta[0]['puntoReferencia'][0]['descripcion'],'distancia'=>$value->distancia_metros,'estado'=>$value->estado]);
       }
       return response()->json($request);
    }
    public function actualizarNotificacion(Request $request)
    {
        $actualizar=NotificacionModel::find($request->id);
        $actualizar->distancia_metros=$request->distancia_metros;

        if ($actualizar->save()) {
            return 'success';
        }else{
            return 'false';
        }
    }
    public function activarNotificacion(Request $request)
    {
        $actualizar=NotificacionModel::find($request->id);
        $actualizar->estado=$request->estado;
        if ($actualizar->save()) {
            return 'success';
        }else{
            return 'false';
        }
    }
    public function store(Request $request)
    {
        $notificar=new NotificacionModel();
        $notificar->distancia_metros=300;
        $notificar->idpunto_de_referencia_ruta=$request->idpunto_de_referencia_ruta;
        $notificar->idusuario=$request->idusuario;
        $notificar->estado='1';//estado 1 activo 0 inactivo
        $notificar->cantidad='3';
        if ($notificar->save()) {
            return 'suceess';
        }else{
             return 'error';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
