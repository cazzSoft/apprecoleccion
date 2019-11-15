<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RutaModel extends Model
{
    protected $table = 'ruta';
    protected $primaryKey  = 'idruta';
    public $timestamps = false;

    public function PuntoRuta(){
        return $this->hasMany('App\PuntoRutaModel','idruta','idruta');
    }



 
}
