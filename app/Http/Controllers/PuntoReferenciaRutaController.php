<?php

namespace App\Http\Controllers;

use App\NotificacionModel;
use App\PuntoReferenciaModel;
use App\PuntoReferenciaRutaModel;
use Illuminate\Http\Request;
class PuntoReferenciaRutaController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // return $request;
        $crear=new PuntoReferenciaRutaModel();
        $crear->ruta_idruta=$request->ruta_idruta;
        $crear->idpunto_de_referencia=$request->idpunto_de_referencia;
        if ( $crear->save()) {
            return response()->json($crear->idpunto_de_referencia_ruta);
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
        //
    }

    public function destroy($id)
    {
       // return  $puntoRuta=PuntoReferenciaModel::find($id);
        $ruta=PuntoReferenciaRutaModel::where('idpunto_de_referencia',$id)->get();
        foreach ($ruta as $key => $value) {
          $noti=NotificacionModel::where('idpunto_de_referencia_ruta',$value->idpunto_de_referencia_ruta)->first();
          if (isset($noti)) {
                 $noti->delete();
          }
          $info=  PuntoReferenciaRutaModel::find($value->idpunto_de_referencia_ruta);
          if (isset($info)) {
                $info->delete();
          }
        }
        $puntoRuta=PuntoReferenciaModel::find($id);
        $puntoRuta->delete();
        return 'success';
    }
}
