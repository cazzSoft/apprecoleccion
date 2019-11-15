<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChoferModel extends Model
{
    protected $table = 'persona';
    protected $primaryKey  = 'idpersona';
    public $timestamps = false;
}
