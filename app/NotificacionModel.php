<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificacionModel extends Model
{
    protected $table = 'notificacion';
    protected $primaryKey  = 'idnotificacion';
    public $timestamps = false;

      	public function puntoReferenciaRuta(){
           return $this->hasMany('App\PuntoReferenciaRutaModel', 'idpunto_de_referencia_ruta', 'idpunto_de_referencia_ruta')->with('ruta','puntoReferencia');
    	}
}
