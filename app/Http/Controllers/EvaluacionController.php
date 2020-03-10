<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EvaluacionModel;
use App\UsuarioModel;
use App\Evaluacion_usuarioModel;

class EvaluacionController extends Controller
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
    //funcion para no ingresar una evaluacion con fecha iguales
    public function store(Request $request)
    {
          //Validación de los datos que vienen en el request para verificar que no se ingresen caracteres especiales
        $validar=array(
            'nombre'=>$request->get('nombre'),
            'objetivo'=>$request->get('objetivo'),
         );

        if(tieneCaracterEspecialRequest($validar)){
            return back()->with(['mensajeInfoEvaluacion'=>'No puede ingresar caracteres especiales','estado'=>'danger']);
        };
        $validarFecha=EvaluacionModel::where('estado','E')->get();
        $validarFecha=$validarFecha->last();
       // dd($validarFecha->fecha_fin);

        //validar fechas
        if($request->fecha_inicio < $request->fecha_fin ){

            $evaluacion= new EvaluacionModel();
            $evaluacion->nombre=$request->get('nombre');
            $evaluacion->fecha_inicio=$request->get('fecha_inicio');
            $evaluacion->fecha_fin=$request->get('fecha_fin');
            $evaluacion->objetivo=$request->get('objetivo');
            $evaluacion->estado='E';
            if($evaluacion->save()){
                $user=UsuarioModel::all();
                foreach ($user as $key => $idusuario) {
                    $asignarEvaUsuario=new Evaluacion_usuarioModel();
                    $asignarEvaUsuario->idevaluacion=$evaluacion->idevaluacion;
                    $asignarEvaUsuario->idusuario=$idusuario->idusuario;
                    $asignarEvaUsuario->estado='E';//estado pendiente
                    $asignarEvaUsuario->save();
                }
                return back()->with(['mensajeInfoEvaluacion'=>'Registro exitoso','estado'=>'success']);
            }else{
                return back()->with(['mensajeInfoEvaluacion'=>'No se pudo realizar el registro','estado'=>'danger']);
            }
        }else{
            return back()->with(['mensajeInfoEvaluacion'=>'Error la fecha fin es menor a la de inicio','estado'=>'warning']);
        }
    }

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
        $evaluacion=EvaluacionModel::find($id);
        return response()->json($evaluacion);
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
       //Validación de los datos que vienen en el request para verificar que no se ingresen caracteres especiales
       $validar=array(
        'id'=>decrypt($id),
        'nombre'=>$request->get('nombre'),
        'objetivo'=>$request->get('objetivo'),

        );

        if(tieneCaracterEspecialRequest($validar)){
            return back()->with(['mensajeInfoEvaluacion'=>'No puede ingresar caracteres especiales','estado'=>'danger']);
        };
        //almacenamiento de los datos
        $evaluacion= EvaluacionModel::find(decrypt($id));
        $evaluacion->nombre=$request->get('nombre');
        $evaluacion->fecha_inicio=$request->get('fecha_inicio');
        $evaluacion->fecha_fin=$request->get('fecha_fin');
        $evaluacion->objetivo=$request->get('objetivo');

        //información de la verificación de los datos quefueron ingresados
        if($evaluacion->save()){
            return back()->with(['mensajeInfoEvaluacion'=>'Registro exitoso','estado'=>'success']);
        }else{
            return back()->with(['mensajeInfoEvaluacion'=>'No se pudo realizar el registro','estado'=>'danger']);
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

               //Validación de los datos que vienen en el request para verificar que no se ingresen caracteres especiales
               $validar=array(
                'id'=>decrypt($id)
            );

            if(tieneCaracterEspecialRequest($validar)){
                return back()->with(['mensajeInfoEvaluacion'=>'No puede ingresar caracteres especiales','estado'=>'danger']);
            };
           //eliminando los datos
            $evaluacion= EvaluacionModel::find(decrypt($id));
              //información para la verificación de la eliminación de datos
            try {
                $evaluacion->delete();
                $user=UsuarioModel::all();
                foreach ($user as $key => $idusuario) {
                    $asignarEvaUsuario= Evaluacion_usuarioModel::where('idevaluacion',$evaluacion->idevaluacion)->first();
                    $asignarEvaUsuario->delete();
                }
                return back()->with(['mensajeInfoEvaluacion'=>'Registro eliminado con éxito','estado'=>'success']);
            } catch (\Throwable $th) {
                return back()->with(['mensajeInfoEvaluacion'=>'No se pudo realizar eliminar el registro','estado'=>'danger']);

            }
    }
}
