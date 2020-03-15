<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PuntoRutaModel extends Model
{
    protected $table = 'punto_ruta';
    protected $primaryKey  = 'idpunto_ruta';
    public $timestamps = false;

    public function Ruta(){
        return $this->belongsTo('App\RutaModel','idruta','ruta_idruta');
    }

}
