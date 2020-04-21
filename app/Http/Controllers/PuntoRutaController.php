<?php

namespace App\Http\Controllers;
use App\PuntoReferenciaModel;
use App\PuntoReferenciaRutaModel;
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
    // public function obtenerPuntosRutas()
    // {
    //    $punto1 = [-0.6991996665183066, -80.0951412320137];
    //    $distancia=[];
    //     $puntos=PuntoRutaModel::all();
    //    foreach ($puntos as $key => $value) {
    //         $m=$this->distance($punto1[0], $punto1[1],  $value->latitud, $value->longitud);
    //        $distancia[$key]=['metro'=> $m,'ruta'=>$value->ruta_idruta,'punto'=>$value->idpunto_ruta];
    //         // array_push($distancia, $value->latitud, $value->longitud);
    //    }
    //     $menor=  min($distancia);
    //     return $distancia;
    // }

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
        $request=['ruta'=>$consulta->PuntoRuta,
                  'idruta'=>$consulta->idruta];
        return response()->json($request);
    }
    public function autoRuta($lat='',$lng='',$idp,$idr)
    {
        //[-0.6991996665183066, -80.0951412320137];
        $punto1 = [$lat,$lng];
        $distancia=[];
        $puntos=PuntoRutaModel::where('idpunto_ruta','<>',$idp)->where('ruta_idruta','<>',$idr)->get();
        foreach ($puntos as $key => $value) {
             $m=$this->distance($punto1[0], $punto1[1],  $value->latitud, $value->longitud);
             $distancia[$key]=['metro'=> $m,'ruta'=>$value->ruta_idruta,'punto'=>$value->idpunto_ruta];
        }
         $menor=  min($distancia);
         $consulta =RutaModel::with('PuntoRuta')->where('idruta',$menor['ruta'])->first();
         $request=[ 'idpunto_ruta'=>$menor['punto'],
                    'idruta'=>$consulta->idruta,
                    'ruta'=>$consulta->PuntoRuta
                    ];
           return response()->json($request);
    }
     public function obtenerRutaId($id)
    {
         $consulta =PuntoReferenciaRutaModel::with('ruta')->where('idpunto_de_referencia',$id)->get();
         $rutas=[];
         $con=0;
         foreach ($consulta as $key => $value) {
           foreach ($value->ruta as $key1 => $value2) {
             $rutas[$key]=$value2['PuntoRuta'];
            }
         }
      return response()->json($rutas);
    }
    //calcular distancia entre coordenadas
    function distance($lat1, $lon1, $lat2, $lon2) {
      $theta = $lon1 - $lon2;
      $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
      $dist = acos($dist);
      $dist = rad2deg($dist);
      $miles = $dist * 60 * 1.1515;
      $miles=($miles * 1.609344)*1000;
     return floor($miles);
    }
}
