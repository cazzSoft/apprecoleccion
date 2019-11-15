<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActividadDiariaModel extends Model
{
    protected $table ='actividad_diaria';
    protected $primaryKey ='idactividad_diaria';
    public $timestamps=false;

   //funcion para la relacion de tablas


    public function ruta(){
        return $this->belongsTo('App\RutaModel','ruta_idruta','idruta');
    }   
    public function recolector(){
        return $this->belongsTo('App\RecolectorModel','recolector_idrecolector','idrecolector');
    }   
    public function chofer(){
        return $this->belongsTo('App\ChoferModel','persona_idpersona','idpersona');
    }   
}
