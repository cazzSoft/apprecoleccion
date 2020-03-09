<?php

namespace App\Http\Controllers;

use App\EvaluacionModel;
use App\Evaluacion_usuarioModel;
use App\PreguntaEvaluacionModel;
use App\PreguntaModel;
use App\RespuestaModel;
use App\UsuarioModel;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use PDF;

class RespuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {//meotodo para la obtencion de los datos almacenados
       $respuesta=RespuestaModel::with(['pregunta_evaluacion','usuario'])
       ->get();
       //TRAER SOLO LAS EVALUACIONES QUE YA CUMPLIERON SU TIEMPO DE EVALUACION Y AHORA PASARON A UN ESTADO DE FINALIZADAS
      $pregunta_evaluacion=PreguntaEvaluacionModel::with('respuesta')->where('evaluacion.estado','=','F')
      ->join('evaluacion','pregunta_evaluacion.idevaluacion','=','evaluacion.idevaluacion')
     ->select('evaluacion.idevaluacion')
     ->groupBy('evaluacion.idevaluacion')
        ->get();
      $usuario=UsuarioModel::with('respuesta')->get();
        return view('apprecoleccion.administrador.reportes.reportesPrincipal')->with(['datosRespuesta'=>$respuesta,'datosPreguntaEvaluacion'=>$pregunta_evaluacion,'datosUsuario'=>$usuario]);

    }

    public function imprimirReporteGeneral(){
    //metodo para obtener los datos en un  pdf
    //datos de un reporte general de todas las evaluaciones
        $respuesta=RespuestaModel::with('pregunta_evaluacion','usuario')->get();
        $today = Carbon::now()->format('d/m/Y');//la fecha de hoy
       $pdf = PDF::loadView('apprecoleccion.administrador.reportes.reporteEvaluaciones', compact('today'), ['mostrarRespuesta'=>$respuesta]);
       return $pdf->stream();


  }
  public function ObtenerDatos($id){
 //METODO PARA OBTENER LOS DATOS QUE VAN EN LAS GRAFICAS DE RESULTADOS
    $pregunta_evaluacion=PreguntaModel::select('pregunta.descripcion','pregunta.idpregunta')
    ->join('pregunta_evaluacion','pregunta_evaluacion.idpregunta','=','pregunta.idpregunta')

     ->where('pregunta_evaluacion.idevaluacion',$id)
      ->get();
      $evaluacion=EvaluacionModel::find($id);
       return response()->json([$pregunta_evaluacion,$evaluacion]);


  }
  public function ObtenerRespuestas($id){

    //METODO PARA OBTENER LAS RESPUESTAS DADAS EN LAS EVALUACIONES PARA LAS GRAFICAS DE LOS RESULTADOS
    $pregunta_evaluacion=PreguntaModel::select('pregunta.descripcion','respuesta.puntaje','respuesta.idrespuesta','pregunta.idpregunta')
    ->join('pregunta_evaluacion','pregunta_evaluacion.idpregunta','=','pregunta.idpregunta')

    ->join('respuesta','respuesta.idpregunta_evaluacion','=','pregunta_evaluacion.idpregunta_evaluacion')

     ->where('pregunta.idpregunta',$id)
      ->get();
      $evaluacion=EvaluacionModel::find($id);
      return response()->json($pregunta_evaluacion);
  }
//reporte de indivual de cada evaluacion FINALIZADA
  public function imprimirReporteIndividual(Request $request){
    $pregunta_evaluacion=PreguntaEvaluacionModel::with('respuesta')->where('idevaluacion',$request->id)
  ->join('respuesta','respuesta.idpregunta_evaluacion','=','respuesta.idrespuesta')

    ->join('pregunta','pregunta_evaluacion.idpregunta','=','pregunta.idpregunta')
    ->select('pregunta.descripcion','respuesta.puntaje')
    ->get();
    $evaluacion=EvaluacionModel::find($request->id);
    $chart=$request->hidden_html;
    $totalUsuarios=RespuestaModel::distinct('idusuario')->count('idusuario');
    $today = Carbon::now()->format('d/m/Y');//la fecha de hoy
    $pdf = PDF::loadView('apprecoleccion.administrador.reportes.reporteEvaluaciones', compact('today'), ['evaluacion'=>$evaluacion,'datosRespuesta'=>$pregunta_evaluacion,'totalUsuarios'=>$totalUsuarios,'chart'=>$chart]);

    return $pdf->stream();

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
         //return  $request;
        // for ($i=0; $request->len; $i++) {
        //     $var=$request[$i];
        // }
    $eva_user=0;
         foreach ($request->all() as $key => $item) {
            //return  $item['puntaje'];
            $eva_user= $item['evaluacion_usuario'];
            $consulta= new RespuestaModel();
            $consulta->puntaje=$item['puntaje'];
            $consulta->idpregunta_evaluacion=$item['idpregunta_evaluacion'];
            $consulta->idusuario=$item['idusuario'];
            $consulta->save();
        }
       // return $eva_user;
        if ($eva_user!=0) {
            $actualizarEva_user=Evaluacion_usuarioModel::find($eva_user);
            $actualizarEva_user->estado='F';
            $actualizarEva_user->save();
        }
        return "true";
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
