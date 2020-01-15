<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RespuestaModel extends Model
{
    protected $table = 'respuesta';
    protected $primaryKey  = 'idrespuesta';
    public $timestamps = false;


//relacion entre tablas
    public function pregunta_evaluacion(){
        return $this->belongsTo('App\PreguntaEvaluacionModel', 'idpregunta_evaluacion', 'idpregunta_evaluacion')->with('pregunta','evaluacion');
    }
 
    public function usuario(){
     return $this->belongsTo('App\UsuarioModel','idusuario','idusuario');
 }
 

}
