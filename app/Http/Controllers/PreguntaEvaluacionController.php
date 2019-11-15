<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PreguntaEvaluacionModel;

class PreguntaEvaluacionController extends Controller
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

 //se guardan los valores en la base de datos
    $pregunta_evaluacion = new PreguntaEvaluacionModel();
    $pregunta_evaluacion->idpregunta=$request->get('pregunta');
    $pregunta_evaluacion->idevaluacion=$request->get('evaluacion');
    //para verificar que no se realice la misma asignacion dos veces
    $verificarAsignacion = PreguntaEvaluacionModel::where('idpregunta',$pregunta_evaluacion->idpregunta)
                                            ->where('idevaluacion', $pregunta_evaluacion->idevaluacion)
                                            ->first();
    if(!is_null($verificarAsignacion)){
        return back()->with(['mensajePInfoPreguntaEvaluacion'=>'La asignación ya existe','estado'=>'info']);
    }
//informacion de la verificación del registro de los datos
    try {
        $pregunta_evaluacion->save();
        return back()->with(['mensajePInfoPreguntaEvaluacion'=>'Registro Exitoso','estado'=>'success']);
    } catch (\Throwable $th) {
        return back()->with(['mensajePInfoPreguntaEvaluacion'=>'No se pudo realizar el registro','estado'=>'danger']);
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
        $pregunta_evaluacion = PreguntaEvaluacionModel::find(decrypt($id));
        return response()->json($pregunta_evaluacion);
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
        //actualización de datos 

        $pregunta_evaluacion = PreguntaEvaluacionModel::find(decrypt($id));
        $pregunta_evaluacion->idpregunta=$request->get('pregunta');
        $pregunta_evaluacion->idevaluacion=$request->get('evaluacion');

        //para verificar que no se realice nuevamente una misma asignacion
        $buscarAsignacion = PreguntaEvaluacionModel::where('idpregunta',$pregunta_evaluacion->idpregunta)
                                                ->where('idevaluacion', $pregunta_evaluacion->idevaluacion)
                                                ->first();                     
        if(!is_null($buscarAsignacion)){
            return back()->with(['mensajePInfoPreguntaEvaluacion'=>'La asignación ya existe','estado'=>'info']);
        }
  //informacion de la verificación de la actualizacioon de los datos
        try {
            $pregunta_evaluacion->save();
            return back()->with(['mensajePInfoPreguntaEvaluacion'=>'Registro actualizado con exito','estado'=>'success']);
        } catch (\Throwable $th) {
            return back()->with(['mensajePInfoPreguntaEvaluacion'=>'No se logró actualizar el registro','estado'=>'danger']);
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
        $pregunta_evaluacion = PreguntaEvaluacionModel::find(decrypt($id));

        try {
            $pregunta_evaluacion->delete();
            return back()->with(['mensajePInfoPreguntaEvaluacion'=>'Registro eliminado con exito','estado'=>'success']);
        } catch (\Throwable $th) {
            return back()->with(['mensajePInfoPreguntaEvaluacion'=>'No se pudo eliminar el registro porque esta relacionado','estado'=>'danger']);
        }
    }
}
