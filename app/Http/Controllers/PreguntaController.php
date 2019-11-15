<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PreguntaModel;

class PreguntaController extends Controller
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
 
    $pregunta= new PreguntaModel();
    $pregunta->descripcion=$request->get('descripcion');

    //información de la verificación de ingreso de datos
    if($pregunta->save()){
        return back()->with(['mensajePInfoPregunta'=>'Registro exitoso','estado'=>'success']);
    }else{
        return back()->with(['mensajePInfoPregunta'=>'No se pudo realizar el registro','estado'=>'danger']);
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
        $id=decrypt($id);
        $pregunta=PreguntaModel::find($id);
        return response()->json($pregunta);
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

        $pregunta= PreguntaModel::find(decrypt($id));
        $pregunta->descripcion=$request->get('descripcion');
    
        //información de la verificación de ingreso de datos
        if($pregunta->save()){
            return back()->with(['mensajePInfoPregunta'=>'Registro exitoso','estado'=>'success']);
        }else{
            return back()->with(['mensajePInfoPregunta'=>'No se pudo realizar el registro','estado'=>'danger']);
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
              
     
            //eliminación de datos
            $pregunta= PreguntaModel::find(decrypt($id));
      //información para la verificación de eliminación de datos
            try {
                $pregunta->delete();
                return back()->with(['mensajePInfoPregunta'=>'Registro eliminado con éxito','estado'=>'success']);
            } catch (\Throwable $th) {
                return back()->with(['mensajePInfoPregunta'=>'No se pudo realizar eliminar el registro','estado'=>'danger']);
                
            }
    }
}
