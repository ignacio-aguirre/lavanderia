<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimientos extends Model
{
    //
    protected $table='movimientos';
    protected $primaryKey = 'id';
    public $incrementing=true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
