<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PuntoReferenciaRutaModel extends Model
{
    protected $table = 'punto_de_referencia_ruta';
    protected $primaryKey  = 'idpunto_de_referencia_ruta';
    public $timestamps = false;
    public function ruta(){
        return $this->hasMany('App\RutaModel','idruta','ruta_idruta')->with('PuntoRuta');
    }

}
