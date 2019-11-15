<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BandejaOPinionesModel extends Model
{
    protected $table = 'opiniones';
    protected $primaryKey = 'idopiniones';
    public $timestamps=false;

    public function usuario(){
        return $this->belongsTo('App\UsuarioModel', 'usuario_idusuario', 'idusuario');
 }

}
