<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUsuarioModel extends Model
{
    protected $table = 'tipo_usuario';
    protected $primaryKey = 'idtipo_usuario';
 	public $timestamps = false;

 	public function users()
    {
        return $this->hasMany('App\User', 'idtipo_usuario', 'tipo_usuario_idtipo_usuario');
    }
}
