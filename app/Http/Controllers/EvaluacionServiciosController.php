<?php

namespace App\Http\Controllers;

use App\EvaluacionModel;
use App\PreguntaEvaluacionModel;
use App\PreguntaModel;
use App\RespuestaModel;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;



class EvaluacionServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaPreguntas = PreguntaModel::All();
        $listaEvaluacion = EvaluacionModel::All();
        $listaPreguntaEvaluacion = PreguntaEvaluacionModel::All();
        return view('apprecoleccion.administrador.evaluacionServicios.GestionEvaluacionServicios')->with(['listaPreguntas'=>$listaPreguntas, 'listaEvaluacion'=>$listaEvaluacion,
        'listaPreguntaEvaluacion'=>$listaPreguntaEvaluacion]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function obtenerEvaluacion($id)
    {
        $verificar=null;
        $verificar=RespuestaModel::where('idusuario',$id)->get();
        //return $verificar;
        // if ($verificar==false) {
        //     return $verificar;
        // }else{
        //     return 2;
        // }
        $fecha =date("Y-m-d");
        $primerEncuest=EvaluacionModel::where('estado','E')->first();
       // dd($primerEncuest->idevaluacion);
        $consulta=DB::table('pregunta_evaluacion')
                            ->join('evaluacion','pregunta_evaluacion.idevaluacion','=','evaluacion.idevaluacion')
                            ->join('pregunta','pregunta_evaluacion.idpregunta','=','pregunta.idpregunta')
                            ->where('evaluacion.estado','=','E')
                            ->where('pregunta_evaluacion.idevaluacion','=',$primerEncuest->idevaluacion)
                            ->select('pregunta_evaluacion.idpregunta_evaluacion',
                                    'evaluacion.idevaluacion',
                                    'evaluacion.fecha_inicio',
                                    'evaluacion.fecha_fin',
                                    'evaluacion.nombre',
                                    'evaluacion.objetivo',
                                    'pregunta.descripcion',
                                    'pregunta.idpregunta',
                                    )
                            ->get();
        //$consulta=$consulta->groupBy('nombre');
        return  response()->json($consulta);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
