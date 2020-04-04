<?php

namespace App\Http\Controllers;
use App\PuntoRutaModel;
use App\RecolectorModel;
use App\Repositories\Posts;
use App\RutaModel;
use App\UsuarioModel;
use DB;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
class ServiciosApiGpsController extends Controller
{

    private $clientGadm = null;
    protected $posts;


    public function __construct(Posts $posts){
        $this->posts=$posts;
        $this->clientGadm = new Client([
            'base_uri' => env('URL_SERVICE_GAD'),
            'verify' => false,
        ]);

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
       $consulta= $this->posts->all();
        if($consulta==0){
            $consulta= $this->posts->all();
        }
        return $consulta;
    }

    public function prueba(){
        return $this->posts->history();
    }

    public function rutasDeUsuario($id)
    {
        $consul=DB::table('punto_de_referencia')
                            ->join('punto_de_referencia_ruta','punto_de_referencia.idpunto_de_referencia','=','punto_de_referencia_ruta.idpunto_de_referencia')
                            ->join('notificacion','punto_de_referencia_ruta.idpunto_de_referencia_ruta','=','notificacion.idpunto_de_referencia_ruta')
                            ->join('ruta','punto_de_referencia_ruta.ruta_idruta','=','ruta.idruta')
                            ->join('actividad_diaria','ruta.idruta','=','actividad_diaria.ruta_idruta')
                            ->join('recolector','actividad_diaria.recolector_idrecolector','=','recolector.idrecolector')
                            ->where('usuario_idusuario','=',$id)
                            ->select('recolector.id','recolector.numero','recolector.idrecolector','punto_de_referencia_ruta.idpunto_de_referencia_ruta','notificacion.distancia_metros','notificacion.estado as notiEstado','notificacion.cantidad','punto_de_referencia.longuitud','punto_de_referencia.latitud','punto_de_referencia.estado as estadoPR')
                            ->get();
        if ($consul!='[]') {
            foreach ($consul as $key => $value) {
               $prefer[$key]=$this->posts->LastReport($value->id,$value->numero,$value->idrecolector,$value->idpunto_de_referencia_ruta,$value->distancia_metros,$value->notiEstado,$value->cantidad,$value->longuitud,$value->latitud,$value->estadoPR);
                if($prefer){
                  $prefer[$key]=$this->posts->LastReport($value->id,$value->numero,$value->idrecolector,$value->idpunto_de_referencia_ruta,$value->distancia_metros,$value->notiEstado,$value->cantidad,$value->longuitud,$value->latitud,$value->estadoPR);
                }
            }
            return response()->json($prefer);
        }else{return 'false';}
    }


    public function autenticateLogin($dni='',$pass='')
    {
       try {
            //verificamos userr en bd gadm
            $body=["cedula"=>$dni,"password"=>$pass];
            $options=[
                'headers'=>['Authorization'=>env('URL_SERVICE_GAD_APIKEY'),
                            'Acept'=>'application/json',
                            'Content-Type'=>'application/json'
                            ],
                            'body'=>json_encode($body)
                ];
             $response = $this->clientGadm->post('api/login/validate',$options);
            if ($response->getStatusCode()==200) {
                 $response=json_decode((string) $response->getBody(), true);
                 if ($response['status']=='success') {
                     $buscarUser=UsuarioModel::where('cedula',$response['cedula'])->first();
                    if ($buscarUser=='') {
                        $inserUser=new UsuarioModel();
                        $inserUser->cedula=$response['cedula'];
                        $inserUser->tipo_usuario_idtipo_usuario='1';
                        $inserUser->estado_configuracion='0';
                        $inserUser->nombre=$response['razonSocial'];
                        $inserUser->email=$response['emailUser'];
                        $inserUser->celular=$response['celular'];
                        $inserUser->save();
                         return $request=['email'=>$response['emailUser'],
                                        'id'=>$inserUser->idusuario,
                                        'estado_confi'=>$inserUser->estado_configuracion,
                                        'celular'=>$response['celular'],
                                        'nombre'=>$response['razonSocial'],
                                        'cedula'=>$response['cedula'],
                                        'email'=>$response['emailUser'],
                                        ];
                    }else{
                        return $request=['email'=>$response['emailUser'],
                                        'id'=>$buscarUser->idusuario,
                                        'estado_confi'=>$buscarUser->estado_configuracion,
                                        'celular'=>$response['celular'],
                                        'nombre'=>$response['razonSocial'],
                                        'cedula'=>$response['cedula'],
                                        'email'=>$response['emailUser'],
                                        ];
                    }
                 }
                return $response['status'];
            }
            // $buscarUser=UsuarioModel::where('cedula',$dni)->first();
            // return $request=[
            //                                        'id'=>$buscarUser->idusuario,
            //                                        'estado_confi'=>$buscarUser->estado_configuracion,
            //                                        'celular'=>'0994989123',
            //                                        'nombre'=>$buscarUser->nombre,
            //                                        'cedula'=>$buscarUser->cedula,
            //                                        'email'=>'cazz@hotmail.com',
            //                                    ];
        } catch (\Throwable $th) {
            return '404';
        }
    }

    public function calle($lat='',$lng='')
    {
      // dd($lat);
      return $consulta=PuntoRutaModel::where('longitud','like','%'.$lat.'%')->get();
       return $consulta=RutaModel::with('PuntoRuta')->whereHas('PuntoRuta',function ($query) use ($lat,$lng) {
            $query->where('longitud', 'like', '%'.$lat);
           })->get();

        // $consulta = Contribuyente::where('identificacion', 'like', '%'.$buscar.'%')->orwhere('nombres', 'ilike', '%'.$buscar.'%')->get()->take(10);
       // $verificarEva=Evaluacion_usuarioModel::with('evaluacion')->whereHas('evaluacion',function ($query) use ($fecha) {
         //    $query->where('fecha_inicio', '>=', $fecha);
         //   })->where('idusuario',$id)->get();
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
