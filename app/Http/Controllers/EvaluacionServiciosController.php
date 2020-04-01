<?php

namespace App\Http\Controllers;

use App\EvaluacionModel;
use App\PreguntaEvaluacionModel;
use App\Evaluacion_usuarioModel;
use App\PreguntaModel;
use App\RespuestaModel;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;



class EvaluacionServiciosController extends Controller
{

    public function index()
    {
        $listaPreguntas = PreguntaModel::All();
        $listaEvaluacion = EvaluacionModel::all();
        $listaPreguntaEvaluacion = PreguntaEvaluacionModel::with(['pregunta','evaluacion'])->get();
        return view('apprecoleccion.administrador.evaluacionServicios.GestionEvaluacionServicios')->with(['listaPreguntas'=>$listaPreguntas, 'listaEvaluacion'=>$listaEvaluacion,
        'listaPreguntaEvaluacion'=>$listaPreguntaEvaluacion]);
    }

    public function obtenerEvaluacion($id)
    {
        $fecha =date("Y-m-d");
         // $verificarEva=Evaluacion_usuarioModel::with('evaluacion')->whereHas('evaluacion',function ($query) use ($fecha) {
         //    $query->where('fecha_inicio', '>=', $fecha);
         //   })->where('idusuario',$id)->get();
          $consulta=DB::table('evaluacion_usuario')
                                    ->leftjoin('evaluacion','evaluacion_usuario.idevaluacion','=','evaluacion.idevaluacion')
                                    ->where('evaluacion_usuario.idusuario','=',$id)
                                    ->where('evaluacion.fecha_inicio','<=',$fecha)
                                     ->where('evaluacion.fecha_fin','>=',$fecha)
                                    ->where('evaluacion_usuario.idusuario','=',$id)
                                    ->where('evaluacion.estado','=','E')
                                    ->where('evaluacion_usuario.estado','=','E')
                                    ->get();
        return  response()->json($consulta);
    }
    public function obtenerEvaluacionPregunta($id)
    {
         $preguntas=PreguntaEvaluacionModel::with('pregunta')->where('idevaluacion',$id)->get();
         $array=[];
         foreach ($preguntas as $key => $value) {
              $array[$key]=['descripcion'=>$value->pregunta->descripcion,'idE_P'=>$value->idpregunta_evaluacion];
         }
         return  response()->json($array);
    }

    public function store(Request $request)
    {
        //
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
