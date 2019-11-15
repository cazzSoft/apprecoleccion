<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluacionModel extends Model
{
    protected $table = 'evaluacion';
    protected $primaryKey  = 'idevaluacion';
    public $timestamps = false;

    public function PreguntaEvaluacion(){
        return $this->hasMany('App\PreguntaEvaluacionModel','idevaluacion','idevaluacion')->with('pregunta');
    }
}