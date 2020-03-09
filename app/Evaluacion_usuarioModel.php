<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluacion_usuarioModel extends Model
{

    protected $table = 'evaluacion_usuario';
    protected $primaryKey  = 'id';
    public $timestamps = false;

    public function evaluacion(){
        return $this->hasMany('App\EvaluacionModel','idevaluacion','idevaluacion');
    }
}
