<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PuntoReferenciaModel extends Model
{

    protected $table = 'punto_de_referencia';
    protected $primaryKey  = 'idpunto_de_referencia';
    public $timestamps = false;

    public function puntoReferenciaRuta(){
        return $this->hasMany('App\PuntoReferenciaRutaModel','idpunto_de_referencia','idpunto_de_referencia')->with('ruta2');
    }
}
