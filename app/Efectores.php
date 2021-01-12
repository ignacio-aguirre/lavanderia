<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Efectores extends Model
{
    //
    protected $table='efectores';
    protected $primaryKey = 'id';
    public $incrementing=true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
