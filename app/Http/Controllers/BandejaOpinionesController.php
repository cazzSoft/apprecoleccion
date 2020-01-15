<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BandejaOpinionesModel;
use Illuminate\Support\Carbon;

class BandejaOpinionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     //consultas de datos
     $listaOpiniones = BandejaOpinionesModel::with('usuario')->get();
        return view('apprecoleccion.administrador.bandejaOpiniones.GestionBandejaOpiniones')->with([
            'listaOpiniones'=>$listaOpiniones
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
        ///$fecha= Carbon::now()->toDateTimeString();
         $fecha =date("Y-m-d H:i");

        $validar=array(
            'detalle'=>$request->detalle,
        );
         if(tieneCaracterEspecialRequest($validar)){
            return "false";
        };
        $opinion = new BandejaOpinionesModel();
        $opinion->detalle=$request->detalle;
        $opinion->fecha=$fecha;
        $opinion->estado='E';
        $opinion->usuario_idusuario=$request->id;
         //return $opinion;
     $opinion->save();
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

        $id=decrypt($id);
        $opiniones=BandejaOpinionesModel::find($id);
        return response()->json($opiniones);
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

      //eliminación de datos
      $bandeja= BandejaOpinionesModel::find(decrypt($id));
        //información para la verificación de eliminación de datos
      try {
          $bandeja->delete();
          return back()->with(['mensajeInfoBandejaOpiniones'=>'Registro eliminado con éxito','estado'=>'success']);
      } catch (\Throwable $th) {
          return back()->with(['mensajeInfoBandejaOpiniones'=>'No se pudo realizar eliminar el registro','estado'=>'danger']);

      }
    }
}
