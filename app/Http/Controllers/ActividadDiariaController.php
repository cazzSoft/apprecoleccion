<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ActividadDiariaModel;
use App\RutaModel;
use App\RecolectorModel;
use App\ChoferModel;

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
        $ActDiaria->ruta_idruta=$request->get('ruta');
        
        $ActDiaria->dia=$request->get('dia'); // falta guardar en un arreglo la seleccion multiple del checkbox
        $ActDiaria->hora_inicio=$request->get('hora_inicio');
        $ActDiaria->hora_fin=$request->get('hora_fin');
        $ActDiaria->recolector_idrecolector =$request->get('vehiculo');
        $ActDiaria->persona_idpersona=$request->get('chofer');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id=decrypt($id);
        $ActDiaria=ActividadDiariaModel::find($id);
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
        $ActDiaria->ruta_idruta=$request->get('ruta');
        $ActDiaria->dia=$request->get('dia');
        $ActDiaria->hora_inicio=$request->get('hora_inicio');
        $ActDiaria->hora_fin=$request->get('hora_fin');
        $ActDiaria->recolector_idrecolector =$request->get('vehiculo');
        $ActDiaria->persona_idpersona=$request->get('chofer');
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
