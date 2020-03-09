<?php

namespace App\Http\Controllers;

use App\PuntoReferenciaModel;
use App\UsuarioModel;
use Illuminate\Http\Request;
class PuntoReferenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function getPundoInteres($id){
        $punto=PuntoReferenciaModel::where('usuario_idusuario',$id)->get();
        return response()->json($punto);
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
        //return $request->id;
         $registrar=new PuntoReferenciaModel();
          $registrar->longuitud=$request->lng;
          $registrar->latitud=$request->lat;
          $registrar->descripcion=$request->des;
          $registrar->estado='true';
          $registrar->usuario_idusuario=$request->id;
          if ($registrar->save()) {
            $updateUser=UsuarioModel::find($registrar->usuario_idusuario);
            $updateUser->estado_configuracion='1';
            if ($updateUser->save()) {
                 return response()->json($registrar->idpunto_de_referencia);
            }else{
               return 'error';
            }
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
        return 'hola';
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
        $puntoRe=PuntoReferenciaModel::find($id);
        $puntoRe->estado=$request->estado;
        if ($puntoRe->save()) {
            return response()->json($puntoRe->estado);
        }else{
            return 'error';
        }
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
