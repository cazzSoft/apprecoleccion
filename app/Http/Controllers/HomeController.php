<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  GuzzleHttp\Client;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        dd(1);
        $client  =  new  Client ([ 
            
            'base_uri'  =>  'https://optimustracking.com:444' , 
            'timeout'   =>  2.0 , 
        ]);
        $body = ['grant_type' => 'password',
                 'username' => 'practica', 
                 'password' => 'practica',
                 'client_id' => 'goldTrack',
                 'client_secret' => 'MobileAppOptimus',
                 'udid' => '0',
                 'gcm_token' => '0',
                ];
        $response  =  $client->request ( 'POST' ,  'token','$body' ); 
        return json_decode((string) $response->getBody(), true);
        //return view('home');
    }
}
