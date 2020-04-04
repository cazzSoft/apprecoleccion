<?php
namespace App\Repositories;
use  GuzzleHttp\Client;
use DB;

class Posts{

    protected $client;

    public function __construct(Client $client){
    	$this->client=  $client;
    }

    public function obtenerToken(){

    	try {
    	    $table=DB::table('service_api')->get();
    	    $table=$table->last();
    	    $id=$table->idservice_api;

    	    $body = [ 'grant_type' => 'password',
    	   	          'username' => $table->username,
    	   	          'password' => $table->password,
    	   	          'client_id' => 'goldTrack',
    	   	          'client_secret' => 'MobileAppOptimus',
    	   	          'udid' => '0',
    	   	          'gcm_token' => '0',
    	   	      ];

    	    $token= $this->client->request('POST' ,'token', ['form_params'=>$body] );
    	    $token=json_decode((string) $token->getBody(), true);

    	    foreach ($token as $key => $value) {
                $arr[$key]=$value;
            }

    	    $update=DB::table('service_api')
    	                     ->where('idservice_api',$id)
                             ->update(array(
                                            'access_token'=>$arr['access_token'],
                                            'refresh_token'=>$arr['refresh_token'],
                              ));
    		return $token;

    	} catch (\Throwable $th) {
       		return 0;
   		 }

	}

	public function ObtenerRefreshToken(){

    	try {
    	    $table=DB::table('service_api')->get();
    	    $table=$table->last();
    	    $id=$table->idservice_api;

    	    $body = [
						'grant_type' => 'refresh_token',
						'username' => $table->username,
						'password' => $table->password,
						'client_id' => 'goldTrack',
						'client_secret' => 'MobileAppOptimus',
						'udid' => '0',
						'content-type'=>'application/x-www-form-urlencoded',
						'gcm_token' => '0',
						'refresh_token'=>$table->refresh_token,
    	   	      ];

    	    $token= $this->client->request('POST' ,'token', ['form_params'=>$body] );
    	    $token=json_decode((string) $token->getBody(), true);

    	    foreach ($token as $key => $value) {
                $arr[$key]=$value;
            }

    	    $update=DB::table('service_api')
    	                     ->where('idservice_api',$id)
                             ->update(array(
                                            'access_token'=>$arr['access_token'],
                                            'refresh_token'=>$arr['refresh_token'],
                              ));
    		return $token;

    	} catch (\Throwable $th) {
			$this->obtenerToken();
            return 0;
   		 }

	}


    public function all(){

    	try {
    	    $table=DB::table('service_api')->get();
    	    $table=$table->last();
    	     		 $body = [
				 		'authorization' => 'bearer '.$table->access_token,
					];

			$response  =  $this->client->request('GET' ,'api/Devices', ['headers'=>$body] );
			return json_decode((string) $response->getBody(), true);

    	} catch (\Throwable $th) {
			$this->ObtenerRefreshToken();
       		return 0;
   		}

	}

	public function LastReport($id,$ve='',$idr,$idPRR,$distancia_metros,$notiEstado,$cantidad,$longuitud,$latitud,$estadoPR){

    	try {
    	    $table=DB::table('service_api')->get();
    	    $table=$table->last();
			 $body = [
				 		'authorization' => 'bearer '.$table->access_token,
					];
			$response  =  $this->client->request('GET' ,'api/Devices/LastReport/'.$id, ['headers'=>$body] );
			$response = json_decode((string) $response->getBody(), true);
			foreach ($response as $key => $value) {
                $arr[$key]=$value;
			}//$distancia_metros,$notiEstado,$cantidad,$longuitud,$latitud,$estadoPR
			 $arr['latitude'].','.$arr['longitude'];
             $array=[
                'lat'=>$arr['latitude'],
                'lng'=>$arr['longitude'],
                'des'=>$ve,
                'idr'=>$idr,
                'idPRR'=>$idPRR,
                'distancia_metros'=>$distancia_metros,
                'notiEstado'=>$notiEstado,
                'cantidad'=>$cantidad,
                'longuitud'=>$longuitud,
                'latitud'=>$latitud,
                'estadoPR'=>$estadoPR
             ];
			 return $array;
    	} catch (\Throwable $th) {
			$this->ObtenerRefreshToken();
            return 0;
   		 }

	}

    public function history(){
        //862045030931291
       // return 'nada';
        try {
            $table=DB::table('service_api')->get();
            $table=$table->last();
             $body = [
                        'authorization' => 'bearer '.$table->access_token,
                    ];///Devices/History  api/Devices/History/id?startdatetime=27/11/2015 11:36:33&offset=0  Hora: 05:42:37 PM  Hora: 08:42:20 PM
            $response  =  $this->client->request('GET' ,'api/Devices/History/862045030931291?startdatetime=21/12/2019 21:13:50&offset=0', ['headers'=>$body] );
            $response = json_decode((string) $response->getBody(), true);
            // foreach ($response as $key => $value) {
            //     $arr[$key]=$value;
            // }
             // $arr['latitude'].','.$arr['longitude'];
             // $array=[
             //    'lat'=>$arr['latitude'],
             //    'lng'=>$arr['longitude']
             // ];
             return $response;
        } catch (\Throwable $th) {
            $this->ObtenerRefreshToken();
            return 0;
         }
    }


}