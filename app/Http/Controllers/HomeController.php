<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EvaluacionModel;
use App\Evaluacion_usuarioModel;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Finalizavion de las evaluacion por fecha fin de la evaluacion
         $fecha =date("Y-m-d");
         $listaEvaluacion = EvaluacionModel::where('fecha_fin','<=',$fecha)->where('estado','E')->get();
        foreach ($listaEvaluacion as $key => $value) {
            $actualizarEstadoEvaluacion =  EvaluacionModel::find($value->idevaluacion);
            $actualizarEstadoEvaluacion->estado='F';
            $actualizarEstadoEvaluacion->save();
        }
        //asignamos las evaluaciones a los usuarios en fecha de inicio de la evaluacion
       // $consultaEva=EvaluacionModel::where('fecha_inicio','=',$fecha)->where('estado','E')->get();

        //return $res;

        return view('apprecoleccion.home');
    }
}
