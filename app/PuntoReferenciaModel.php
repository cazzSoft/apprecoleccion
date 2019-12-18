<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PuntoReferenciaModel extends Model
{

    protected $table = 'punto_de_referencia';
    protected $primaryKey  = 'idpunto_de_referencia';
    public $timestamps = false;
}
