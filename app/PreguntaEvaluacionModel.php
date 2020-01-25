<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreguntaEvaluacionModel extends Model
{
    protected $table = 'pregunta_evaluacion';
    protected $primaryKey  = 'idpregunta_evaluacion';
    public $timestamps = false;

    public function pregunta(){
        return $this->belongsTo('App\PreguntaModel','idpregunta','idpregunta');
    }

    public function evaluacion(){
        return $this->belongsTo('App\EvaluacionModel','idevaluacion','idevaluacion');
    }

    public function respuesta(){
        return $this->hasMany('App\RespuestaModel', 'idrespuesta', 'idrespuesta');
}

}
