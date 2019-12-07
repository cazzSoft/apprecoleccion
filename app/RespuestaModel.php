<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RespuestaModel extends Model
{
    protected $table = 'respuesta';
    protected $primaryKey  = 'idrespuesta';
    public $timestamps = false;
}
