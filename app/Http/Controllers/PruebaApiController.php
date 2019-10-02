<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  GuzzleHttp\Client;
class PruebaApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $client =  new  Client ([ 
            
            'base_uri'  =>  'https://optimustracking.com:444', 
             
        ]);

        $body = ['grant_type' => 'password',
                 'username' => 'practica', 
                 'password' => 'practica',
                 'client_id' => 'goldTrack',
                 'client_secret' => 'MobileAppOptimus',
                 'udid' => '0',
                 'gcm_token' => '0',
                ];

        $response  =  $client->request('POST' ,'token', ['form_params'=>$body] ); 
        return json_decode((string) $response->getBody(), true);
        //return view('home');
    }
    public function index2()
    {
        
        $client =  new  Client ([ 
            
            'base_uri'  =>  'https://optimustracking.com:444', 
             
        ]);

        $body = ['grant_type' => 'refresh_token',
                 'username' => 'practica', 
                 'password' => 'practica',
                 'client_id' => 'goldTrack',
                 'client_secret' => 'MobileAppOptimus',
                 'udid' => '0',
                 'gcm_token' => '0',  
                 'refresh_token' => 'd58806bb60dc485d829b66afdcdc9b3a', 
                ];

        $response  =  $client->request('POST' ,'token', ['form_params'=>$body] ); 
        return json_decode((string) $response->getBody(), true);
        //return view('home');
    }

     public function index3()
    {
        
        $client =  new  Client ([ 
            
            'base_uri'  =>  'https://optimustracking.com:444', 
             
        ]);

        $body = ['authorization' => 'bearer mhPFN3kBBM9de_U2i8Je6eTBnbcFFz4xPtL_7alTg16M35bz9Z2IDdE-koIZAdej_nOhZeGtiC73tB-QUAFbIohV9nERS0BivdjU1QFzmao0QtuEzrFbteGn6reRicX76DGlkvM5IJnqM5VFAcUs5tx6hyq_hETqQOnl9r_2WWbtuCUIJ88l81-RWGm_nc3WSDIrQD3SPNgCPbKpFn5UXpCcA2K-76zkXhVVtpjd6cRiPVIiiYlq0tqRlNsG0w9-UI6V7IF42iJU44Lzjv7SmQ5M6_xQn88f2VfJpHeOYkACNjip_3Ao5QQLbBNNNMY0qYnvEZcAGsIhUEidyKSWtA_8rZ9GUFqcPDRi251qEke6bPMDIx3NKeNuqbL48zXPpOfRsjOM1s8rZbUOdJoKZ_0WL0bjZfinHWS5XHKn3e5yqKyTRfxor937hHqwKvzgJ9nZrFPTctWERTP-hT1jnPDgyyc8GMuaZY9Pi7jkCRCwFgJ-aie0mfbAMZnmsB-kbolB-SzKrTkcR8TOaDsrbq7p3T9hTvB9iHbcj052-RyJ8y8AmvmhHRBi3jo5E75wkVIkaGr-02bE_ZT5460_W_wQu7mUe2lCPaWnMQWEm6CoBAG2DbucDQuxNEvUP7fv4Y2V4nsGmH2C1FyzodFXTyogUvss5w3rRFY4MsXCiC6ynanqCKcwNuJOlVdDaKlh8SPNff0IBW_mOgkzUys_ku-T23u-1bEg85hjZgFAHWysYjO_D-UkaP9Q613AsTo0',
                ];

        $response  =  $client->request('GET' ,'api/Devices', ['headers'=>$body] ); 
        return json_decode((string) $response->getBody(), true);
        //return view('home');
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
