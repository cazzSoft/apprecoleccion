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

	public function LastReport($id){

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
			}
			 $arr['latitude'].','.$arr['longitude'];
             $array=[
                'lat'=>$arr['latitude'],
                'lng'=>$arr['longitude']
             ];
			 return $array;
    	} catch (\Throwable $th) {
			$this->ObtenerRefreshToken();
            return 0;
   		 }

	}




}