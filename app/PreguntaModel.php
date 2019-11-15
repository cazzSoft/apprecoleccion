<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreguntaModel extends Model
{
    protected $table = 'pregunta';
    protected $primaryKey  = 'idpregunta';
    public $timestamps = false;

    public function PreguntaEvaluacion(){
        return $this->hasMany('App\PreguntaEvaluacionModel','idpregunta','idpregunta')->with('evaluacion');
    }
}
