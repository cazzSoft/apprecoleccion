<?php

namespace App\Http\Controllers;
use App\Repositories\Posts;
use Illuminate\Http\Request;
use App\RecolectorModel;
use DB;
use App\UsuarioModel;

class ServiciosApiGpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $posts;


    public function __construct(Posts $posts){
        $this->posts=$posts;

    }

       public function postToken()
    {
        return $this->posts->obtenerToken();
    }

    public function postRefreshToken()
    {
        return $this->posts->ObtenerRefreshToken();
    }


    public function getDetalle()
    {
       return $this->posts->all();
        if($res){
            return $res;
        }else{
            return $this->posts->all();
        }

    }

    public function prueba(){
        return 11;
    }

    public function rutasDeUsuario($id)
    {
        $consul=DB::table('punto_de_referencia')
                            ->join('punto_de_referencia_ruta','punto_de_referencia.idpunto_de_referencia','=','punto_de_referencia_ruta.punto_de_referencia_idpunto_de_referencia')
                             ->join('ruta','punto_de_referencia_ruta.ruta_idruta','=','ruta.idruta')
                             ->join('actividad_diaria','ruta.idruta','=','actividad_diaria.ruta_idruta')
                             ->join('recolector','actividad_diaria.recolector_idrecolector','=','recolector.idrecolector')
                            ->where('usuario_idusuario','=',$id)
                            ->select('recolector.id')
                            ->get();
        if ($consul!='[]') {
            foreach ($consul as $key => $value) {
               $prefer[$key]=$this->posts->LastReport($value->id);
                if($prefer){
                  $prefer[$key]=$this->posts->LastReport($value->id);
                }
            }
            return $prefer;
        }else{return 'false';}
    }


    public function autenticateLogin($dni,$pass)
    {
        $valor="";
        $consul=UsuarioModel::where('usuario',$dni)->get();

          foreach ($consul as $key => $value) {
              if ($value->usuario==$dni && $value->clave==$pass ) {
                     $array=[
                        'nombre'=>$value->nombre,
                        'telefono'=>"009239",
                        'correo'=>'cazz@hotmail.com',
                        'id'=>$value->idusuario,
                        'estado'=>'true'
                     ];
                    return $array;
                }
          } return "false";
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
