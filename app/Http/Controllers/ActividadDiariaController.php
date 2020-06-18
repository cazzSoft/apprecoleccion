<?php

namespace App\Http\Controllers;

use App\ActividadDiariaModel;
use App\ChoferModel;
use App\PuntoReferenciaRutaModel;
use App\RecolectorModel;
use App\RutaModel;
use Illuminate\Http\Request;

class ActividadDiariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //consultas de datos
        $listaActividadDiaria = ActividadDiariaModel::with('ruta')->with('recolector')->with('chofer')->get();
        $listaRutas = RutaModel::All();
        $listaRecolectores = RecolectorModel::All();
        $listaChoferes = ChoferModel::All();
        return view('apprecoleccion.funcionario.actividadDiaria.actividadDiariaGestion')->with([
            'listaActividadDiaria'=>$listaActividadDiaria,
            'listaRutas'=>$listaRutas,
            'listaRecolectores'=>$listaRecolectores,
            'listaChoferes'=>$listaChoferes
        ]);
         //return view('apprecoleccion.funcionario.actividadDiaria.actividadDiariaGestion');
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
        //INGRESO DE DATOS
            $ActDiaria= new ActividadDiariaModel();
            if($request->ruta==''){
                return back()->with(['mensajeInfoAcDiaria'=>'No ha seleccionado una ruta','estado'=>'danger']);
            }else{
                $ActDiaria->ruta_idruta=$request->get('ruta');
            }
            if($request->dia==''){
                return back()->with(['mensajeInfoAcDiaria'=>'No ha seleccionado días de la semana','estado'=>'danger']);
            }else{
                    //almacenamiento de los valores de los checkbox en un campo de la base de datos (dias de la semana)
                    //primero declaro una variable vacia
                    $dias = '';
                    //realizo el foreach con el request que recibo
                    foreach ($request->dia as $d){
                        //la variable $s es solo un separador para los dias de la semana que se van almacenando
                        $s = ', ';
                        //y entonces pregunto en el if si la cadena de datos esta vacia, si esta vacia guardo una vez el dia sin separador (porque hago esto? porque la primera vez que entre al foreach estará vacio
                        //y ingresa el primer valor que tenga, por lo tanto si  se escoge un solo día, se guarda sin la coma, que es el separador)
                        //entonces sucede que la segunda vez que entre al foreach ya no estará vacia la cadena y meto el o los siguientes días con el separador (la coma) y listo.
                        if($dias == ''){
                            $dias =$d;
                        }else{
                            $dias .= $s.$d;
                        }
                    }
                    $ActDiaria->dia=$dias;
            }
        $ActDiaria->hora_inicio=$request->get('hora_inicio');
        $ActDiaria->hora_fin=$request->get('hora_fin');

        if($request->vehiculo==''){
            return back()->with(['mensajeInfoAcDiaria'=>'No ha seleccionado un recolector','estado'=>'danger']);
        }else{
            $ActDiaria->recolector_idrecolector=$request->get('vehiculo');
        }
        if($request->chofer==''){
            return back()->with(['mensajeInfoAcDiaria'=>'No ha seleccionado un chofer','estado'=>'danger']);
        }else{
            $ActDiaria->persona_idpersona=$request->get('chofer');
        }
        //información de la verificación de ingreso de datos
        if($ActDiaria->save()){
            return back()->with(['mensajeInfoAcDiaria'=>'Registro exitoso','estado'=>'success']);
        }else{
            return back()->with(['mensajeInfoAcDiaria'=>'No se pudo realizar el registro','estado'=>'danger']);
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

    }
    public function getHorarioRecolector($id)
    {
      try {
        $rutas=PuntoReferenciaRutaModel::where('idpunto_de_referencia',$id)->get();
        if (isset($rutas)) {
         $horarios=[];
           foreach ($rutas as $key => $value) {
             $consulta=ActividadDiariaModel::with('ruta')->where('ruta_idruta',$value->ruta_idruta)->first();
              if (isset($consulta)) {
                 $horarios[$key]=['ruta'=>$consulta->ruta->descripcion,
                                   'horario'=>$consulta->dia,
                                     'hI'=>$consulta->hora_inicio,
                                       'hF'=>$consulta->hora_fin
                                 ];
              }
           }
            return response()->json($horarios);
        }
      } catch (\Throwable $th) {
          return 'error';
      }
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
        $ActDiaria=ActividadDiariaModel::with('ruta','recolector','chofer')->find($id);
        return response()->json($ActDiaria);
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
        //ACTUALIZACION DE DATOS

        //se guardan los datos
        $ActDiaria= ActividadDiariaModel::find(decrypt($id));
        if($request->ruta==''){
            return back()->with(['mensajeInfoAcDiaria'=>'No ha seleccionado una ruta','estado'=>'danger']);
        }else{

        $ActDiaria->ruta_idruta=$request->get('ruta');

        }

        if($request->dia==''){
            return back()->with(['mensajeInfoAcDiaria'=>'No ha seleccionado días de la semana','estado'=>'danger']);
        }else{
//almacenamiento de los valores de los checkbox en un campo de la base de datos (dias de la semana)
//primero declaro una variable vacia
            $dias = '';
            //realizo el foreach con el request que recibo
            foreach ($request->dia as $d){
                //la variable $s es solo un separador para los dias de la semana que se van almacenando
                $s = ', ';
                //y entonces pregunto en el if si la cadena de datos esta vacia, si esta vacia guardo una vez el dia sin separador (porque hago esto? porque la primera vez que entre al foreach estará vacio
                //y ingresa el primer valor que tenga, por lo tanto si  se escoge un solo día, se guarda sin la coma, que es el separador)
                //entonces sucede que la segunda vez que entre al foreach ya no estará vacia la cadena y meto el o los siguientes días con el separador (la coma) y listo.
                if($dias == ''){
                    $dias =$d;
                }else{
                    $dias .= $s.$d;
                }
            }
        $ActDiaria->dia=$dias;
        }

        $ActDiaria->hora_inicio=$request->get('hora_inicio');
        $ActDiaria->hora_fin=$request->get('hora_fin');

        if($request->vehiculo==''){
            return back()->with(['mensajeInfoAcDiaria'=>'No ha seleccionado un recolector','estado'=>'danger']);
        }else{

            $ActDiaria->recolector_idrecolector =$request->get('vehiculo');
        }

        if($request->chofer==''){
            return back()->with(['mensajeInfoAcDiaria'=>'No ha seleccionado un chofer','estado'=>'danger']);
        }else{
        $ActDiaria->persona_idpersona=$request->get('chofer');
        }


        //información de la verificación de ingreso de datos
        if($ActDiaria->save()){
            return back()->with(['mensajeInfoAcDiaria'=>'Registro exitoso','estado'=>'success']);
        }else{
            return back()->with(['mensajeInfoAcDiaria'=>'No se pudo realizar el registro','estado'=>'danger']);
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
        //ELIMINACION DE DATOS
        //Validación de los datos que vienen en el request para verificar que no se utilicen caracteres especiales
        $validar=array(
            'id'=>decrypt($id)
        );

        if(tieneCaracterEspecialRequest($validar)){
            return back()->with(['mensajeInfoAcDiaria'=>'No puede ingresar caracteres especiales','estado'=>'danger']);
        };
        //eliminación de datos
        $ActDiaria= ActividadDiariaModel::find(decrypt($id));
            //información para la verificación de eliminación de datos
        try {
            $ActDiaria->delete();
            return back()->with(['mensajeInfoAcDiaria'=>'Registro eliminado con éxito','estado'=>'success']);
        } catch (\Throwable $th) {
            return back()->with(['mensajeInfoAcDiaria'=>'No se pudo eliminar el registro','estado'=>'danger']);

        }
    }
}
