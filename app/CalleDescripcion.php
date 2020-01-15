<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalleDescripcion extends Model
{
    protected $table = 'calle_descripcion';
    protected $primaryKey  = 'id';
    public $timestamps = false;
}
