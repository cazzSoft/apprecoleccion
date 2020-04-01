<?php

namespace App\Http\Controllers;

use App\PuntoRutaModel;
use App\RutaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class RutaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaRutas = RutaModel::All();
        //dd($listaRutasRetornar);
        //return response()->json($listaRutasRetornar);
        return view('apprecoleccion.funcionario.ruta.gestionRuta')->with([
            'listaRutas'=>$listaRutas
        ]);
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
            'nombre_ruta'=>$request->get('nombre_ruta'),
            'descripcion'=>$request->get('descripcion'),
        );

        if(tieneCaracterEspecialRequest($validar)){
            return back()->with(['mensajePInfoRuta'=>'No puede ingresar caracteres especiales','estadoP'=>'warning']);
        };

        $validator = Validator::make($request->all(), [
                    'nombre_ruta' => 'required|unique:ruta|max:255'
        ]);
        if ($validator->fails()) {
             return back()->with(['mensajePInfoRuta'=>'El nombre de la ruta ya existe','estadoP'=>'warning']);
        }
        //se guardan los datos
        $ruta= new RutaModel();
        $ruta->nombre_ruta=$request->get('nombre_ruta');
        $ruta->descripcion=$request->get('descripcion');
        $ruta->estado_grafica='NO';
        //información de la verificación de ingreso de datos
        if($ruta->save()){
            return back()->with(['mensajePInfoRuta'=>'Registro exitoso','estadoP'=>'success']);
        }else{
            return back()->with(['mensajePInfoRuta'=>'No se pudo realizar el registro','estadoP'=>'danger']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function obtenerRuta($ruta='')
    {
        return RutaModel::where('descripcion','ilike','%'.$ruta.'%')->first();
    }
    public function obtenerRutamapa()
    {
     return   $consulta=RutaModel::all();
    }




    public function obtenerRutaGrafica($id)
    {
        try {
            return   $consul= PuntoRutaModel::where('ruta_idruta',$id)->select('latitud as lat','longitud as lng')->get();
        } catch (\Throwable $th) {
            return "false";
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
        $ruta=RutaModel::find($id);
        return response()->json($ruta);
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
            'nombre_ruta'=>$request->get('nombre_ruta'),
            'descripcion'=>$request->get('descripcion'),
            );

            if(tieneCaracterEspecialRequest($validar)){
                return back()->with(['mensajePInfoRuta'=>'No puede ingresar caracteres especiales','estadoP'=>'danger']);
            };
            //se guardan los datos
            $ruta= RutaModel::find(decrypt($id));
            $ruta->nombre_ruta=$request->get('nombre_ruta');
            $ruta->descripcion=$request->get('descripcion');
            //información de la verificación de ingreso de datos
            if($ruta->save()){
                return back()->with(['mensajePInfoRuta'=>'Registro exitoso','estadoP'=>'success']);
            }else{
                return back()->with(['mensajePInfoRuta'=>'No se pudo realizar el registro','estadoP'=>'danger']);
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
                return back()->with(['mensajePInfoRuta'=>'No puede ingresar caracteres especiales','estadoP'=>'danger']);
            };
            //eliminación de datos
            $ruta= RutaModel::find(decrypt($id));
      //información para la verificación de eliminación de datos
            try {
                $ruta->delete();
                return back()->with(['mensajePInfoRuta'=>'Registro eliminado con éxito','estadoP'=>'success']);
            } catch (\Throwable $th) {
                return back()->with(['mensajePInfoRuta'=>'No se pudo realizar eliminar el registro','estadoP'=>'danger']);

            }
    }
}
