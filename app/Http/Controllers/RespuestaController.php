<?php

namespace App\Http\Controllers;

use App\RespuestaModel;
use Illuminate\Http\Request;

class RespuestaController extends Controller
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
     // $existe=[''];
      $existe=RespuestaModel::where('idpregunta_evaluacion',$request->idpregunta_evaluacion)->where('idusuario',$request->idusuario)->get();
       $res=$existe->pluck('idrespuesta');

       if ($existe=="[]") {
            $consulta= new RespuestaModel();
            $consulta->puntaje=$request->puntaje;
            $consulta->idpregunta_evaluacion=$request->idpregunta_evaluacion;
            $consulta->idusuario=$request->idusuario;
            $consulta->estado=$request->estado;
            $consulta->save();
             return "ingresado";
       }else{
            return $this->update($request,$res[0]);
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
        $consulta =RespuestaModel::find($id);
        $consulta->puntaje=$request->puntaje;
        $consulta->idpregunta_evaluacion=$request->idpregunta_evaluacion;
        $consulta->idusuario=$request->idusuario;
        $consulta->estado=$request->estado;
        $consulta->save();
        return "act";
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
