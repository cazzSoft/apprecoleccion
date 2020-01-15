<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuario';
    protected $primaryKey  = 'idusuario';
    public $timestamps = false;

    public function respuesta(){
        return $this->hasMany('App\RespuestaModel', 'idusuario', 'idusuario');
    }
}
