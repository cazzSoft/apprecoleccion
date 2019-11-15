<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RecolectorModel;

class RecolectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //consultas de datos
        $listaVehiculos = RecolectorModel::All();

        return view('apprecoleccion.funcionario.vehiculos.gestionVehiculos')->with([
            'listaVehiculos'=>$listaVehiculos
        ]);
       // return view('apprecoleccion.funcionario.vehiculos.gestionVehiculos');
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
        //Validación de los datos que vienen en el request para verificar que no se utilicen caracteres especiales
        $validar=array(
            'numero'=>$request->get('numero'),
            'placa'=>$request->get('placa'),
            'tipo_vehiculo'=>$request->get('tipo_vehiculo'),
        );

        if(tieneCaracterEspecialRequest($validar)){
            return back()->with(['mensajeInfoVehiculo'=>'No puede ingresar caracteres especiales','estado'=>'danger']);
        };
        //se guardan los datos
        $vehiculo= new RecolectorModel();
        $vehiculo->numero=$request->get('numero');
        $vehiculo->placa=$request->get('placa');
        $vehiculo->tipo_vehiculo=$request->get('tipo_vehiculo');
        //información de la verificación de ingreso de datos
        if($vehiculo->save()){
            return back()->with(['mensajeInfoVehiculo'=>'Registro exitoso','estado'=>'success']);
        }else{
            return back()->with(['mensajeInfoVehiculo'=>'No se pudo realizar el registro','estado'=>'danger']);
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
        $vehiculo=RecolectorModel::find($id);
        return response()->json($vehiculo);
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
       //Validación de los datos que vienen en el request para verificar que no se utilicen caracteres especiales
       $validar=array(
        'id'=>decrypt($id),
        'numero'=>$request->get('numero'),
        'placa'=>$request->get('placa'),
        'tipo_vehiculo'=>$request->get('tipo_vehiculo'),
        );

        if(tieneCaracterEspecialRequest($validar)){
            return back()->with(['mensajeInfoVehiculo'=>'No puede ingresar caracteres especiales','estado'=>'danger']);
        };
        //se guardan los datos
        $vehiculo= RecolectorModel::find(decrypt($id));
        $vehiculo->numero=$request->get('numero');
        $vehiculo->placa=$request->get('placa');
        $vehiculo->tipo_vehiculo=$request->get('tipo_vehiculo');
        //información de la verificación de ingreso de datos
        if($vehiculo->save()){
            return back()->with(['mensajeInfoVehiculo'=>'Registro exitoso','estado'=>'success']);
        }else{
            return back()->with(['mensajeInfoVehiculo'=>'No se pudo realizar el registro','estado'=>'danger']);
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
        //Validación de los datos que vienen en el request para verificar que no se utilicen caracteres especiales
        $validar=array(
          'id'=>decrypt($id)
      );

      if(tieneCaracterEspecialRequest($validar)){
          return back()->with(['mensajeInfoVehiculo'=>'No puede ingresar caracteres especiales','estado'=>'danger']);
      };
      //eliminación de datos
      $vehiculo= RecolectorModel::find(decrypt($id));
        //información para la verificación de eliminación de datos
      try {
          $vehiculo->delete();
          return back()->with(['mensajeInfoVehiculo'=>'Registro eliminado con éxito','estado'=>'success']);
      } catch (\Throwable $th) {
          return back()->with(['mensajeInfoVehiculo'=>'No se pudo realizar eliminar el registro','estado'=>'danger']);
          
      }
    }
}
