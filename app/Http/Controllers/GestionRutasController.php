<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RutaModel;
use App\PuntoRutaModel;

class GestionRutasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                //consultas de datos
                $listaRutas = RutaModel::All();
         

                $listaRutasRetornar=array();
                $auxSectores=array();
                $rutaActual=null;

                foreach ($listaRutas as $r => $ruta) {
                    
                    if(($ruta->nombre_ruta != $rutaActual) && ($r!=0)){
                        // enviamos al arreglo de retorno
                        array_push($listaRutasRetornar,[$rutaActual=>$auxSectores]);
                        //reiniciamos el arreglo
                        $auxSectores=array();
                    }
                    array_push($auxSectores,$ruta);
                    $rutaActual=$ruta->nombre_ruta;
                    if($r==(sizeof($listaRutas)-1)){
                        // enviamos al arreglo de retorno
                        array_push($listaRutasRetornar,[$rutaActual=>$auxSectores]);
                    }
                }

                //dd($listaRutasRetornar);
                
          
                return view('apprecoleccion.funcionario.ruta.gestionRuta')->with([
                    'listaRutasCMB'=>$listaRutasRetornar,
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
        //
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
        //
    }
}
