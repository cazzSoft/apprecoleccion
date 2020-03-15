<?php

namespace App\Http\Controllers;
use App\PuntoReferenciaModel;
use App\PuntoRutaModel;
use App\RutaModel;
use DB;
use Illuminate\Http\Request;


class PuntoRutaController extends Controller
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
    public function obtenerPuntosRutas()
    {
        //$ruta=RutaModel::with('PuntoRuta')->where('nombre_ruta','Ruta 1')->get();
        $ruta= DB::table('punto_ruta')
                        ->join('ruta','punto_ruta.ruta_idruta','=','ruta.idruta')
                        ->where('ruta.nombre_ruta','=','Ruta 1')
                        ->select('ruta.descripcion',
                                'punto_ruta.latitud',
                                'punto_ruta.longitud',
                                'punto_ruta.idpunto_ruta')
                        ->get();
        foreach ($ruta as $key => $value) {
            $arry[$value->descripcion]='lat:'.$value->latitud;
        }
        return $ruta;
    }


    public function store(Request $request)
    {
        try {
          foreach ($request->puntos as $key => $item) {
              $punto_ruta  = new PuntoRutaModel();
              $punto_ruta->ruta_idruta=$request->idruta;
              $punto_ruta->latitud=$item['lat'];
              $punto_ruta->longitud=$item['lng'];
              $punto_ruta->save();
          }
          $ruta=RutaModel::find($request->idruta);
            $ruta->estado_grafica="SI";
            $ruta->save();
          $data=[
                    'estado'=>'success',
                    'msm'=>'Registro ingresado con exito',
             ];
            return $data;
       } catch (\Throwable $th) {
            $data=[
                    'estado'=>'danger',
                    'msm'=>'No se pudo realizar el registro',
             ];
            return $data;
        }

        // $con1=0;
        // $con2=0;
        // foreach ($request->puntos as $key => $value) {
        //     if ($key%2==0) {
        //         $arrayLat[$con1]=$value;
        //         $con1+=1;
        //     }
        // }
        // foreach ($request->puntos as $key => $value) {
        //     if ($key%2!=0) {
        //         $arrayLng[$con2]=$value;
        //          $con2+=1;
        //     }
        // }
        // return $arrayLat;
        //$cor=['lat'=>$arrayLat,'lng'=>$arrayLng,];
        // foreach ($arrayLat as $key => $value) {
        //     $punto_ruta  = new PuntoRutaModel();
        //     $punto_ruta->ruta_idruta=$request->idruta;
        //     $punto_ruta->latitud=$value;
        //     $punto_ruta->longitud=$arrayLng[$key];
        //     $punto_ruta->save();
        // }
        // return $punto_ruta;

        //

       // if($punto_ruta->save()){
       //     $data=[
       //      'estado'=>'success',
       //      'msm'=>'Registro exitoso',
       //     ];
       //     return $data;
       // }else{
       //  $data=[
       //      'estado'=>'danger',
       //      'msm'=>'No se pudo realizar el registro',
       //     ];
       //      return $data;
       // }
       // return $request;
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
         $puntos=PuntoRutaModel::where('ruta_idruta',$id)->get();
          foreach ($puntos as $key => $value) {
            $delete=PuntoRutaModel::find($value->idpunto_ruta);
            $delete->delete();
          }
          $ruta=RutaModel::find($id);
            $ruta->estado_grafica="NO";
            $ruta->save();
         return 'success';
    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {

    }
    public function obtenerRuta($ruta='')
    {
      $consulta =RutaModel::with('PuntoRuta')->where('descripcion','like','%'.$ruta.'%')->first();
       return $request=['ruta'=>$consulta->PuntoRuta,
                  'idruta'=>$consulta->idruta];
        return response()->json($request);
    }
     public function obtenerRutaId($id)
    {
         $consulta =PuntoReferenciaModel::with('puntoReferenciaRuta')->where('usuario_idusuario',$id)->get();
         dd($consulta);
         $request=[];
         // array_push($request,['idnotificacion'=>$value->idnotificacion,'ruta'=>$value->puntoReferenciaRuta[0]['ruta'][0]['nombre_ruta'],'descripcion'=>$value->puntoReferenciaRuta[0]['ruta'][0]['descripcion'],'puntoReferencia'=>$value->puntoReferenciaRuta[0]['puntoReferencia'][0]['descripcion'],'distancia'=>$value->distancia_metros,'estado'=>$value->estado]);
        foreach ($consulta['puntoReferenciaRuta'] as $key => $value) {
          return $value;
          // array_push($request,['idruta'=>$value->ruta_idruta,'puntos'=>$value->ruta2->punto_ruta]);
        }
        return $request;
    }
}
