<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChoferModel;

class ChoferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //consultas de datos
        $listaChoferes = ChoferModel::All();

        return view('apprecoleccion.funcionario.choferes.gestionChoferes')->with([
            'listaChoferes'=>$listaChoferes
        ]);
        //return view('apprecoleccion.funcionario.choferes.gestionChoferes');
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
        //Validación de los datos que vienen en el request para verificar que no se ingresen caracteres especiales
        $validar=array(
            'nombres'=>$request->get('nombres'),
            'dni'=>$request->get('dni'),
 
        );

        if(tieneCaracterEspecialRequest($validar)){
            return back()->with(['mensajeInfoChofer'=>'No puede ingresar caracteres especiales','estado'=>'danger']);
        };
        //para el almacenamiento de los datos 
        $chofer= new ChoferModel();
        $chofer->nombres=$request->get('nombres');
        $chofer->dni=$request->get('dni');
  
        //información de la verificación de los datos ingresados 
        if($chofer->save()){
            return back()->with(['mensajeInfoChofer'=>'Registro exitoso','estado'=>'success']);
        }else{
            return back()->with(['mensajeInfoChofer'=>'No se pudo realizar el registro','estado'=>'danger']);
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
        $chofer=ChoferModel::find($id);
        return response()->json($chofer);
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
        'nombres'=>$request->get('nombres'),
        'dni'=>$request->get('dni'),
      
        );

        if(tieneCaracterEspecialRequest($validar)){
            return back()->with(['mensajeInfoChofer'=>'No puede ingresar caracteres especiales','estado'=>'danger']);
        };
        //almacenamiento de los datos
        $chofer= ChoferModel::find(decrypt($id));
        $chofer->nombres=$request->get('nombres');
        $chofer->dni=$request->get('dni');
  
        //información de la verificación de los datos quefueron ingresados
        if($chofer->save()){
            return back()->with(['mensajeInfoChofer'=>'Registro exitoso','estado'=>'success']);
        }else{
            return back()->with(['mensajeInfoChofer'=>'No se pudo realizar el registro','estado'=>'danger']);
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
                return back()->with(['mensajeInfoChofer'=>'No puede ingresar caracteres especiales','estado'=>'danger']);
            };
           //eliminando los datos
            $chofer= ChoferModel::find(decrypt($id));
              //información para la verificación de la eliminación de datos
            try {
                $chofer->delete();
                return back()->with(['mensajeInfoChofer'=>'Registro eliminado con éxito','estado'=>'success']);
            } catch (\Throwable $th) {
                return back()->with(['mensajeInfoChofer'=>'No se pudo realizar eliminar el registro','estado'=>'danger']);
                
            }
    }
}
