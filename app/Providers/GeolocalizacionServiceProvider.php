<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use  GuzzleHttp\Client;

class GeolocalizacionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('GuzzleHttp\Client', function(){
            return new   Client ([        
             'base_uri'  =>  'https://optimustracking.com:444',     
            ]);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
