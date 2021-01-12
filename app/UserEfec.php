<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserEfec extends Model
{
    //
    //
    protected $table='user_efecs';
    protected $primaryKey = 'id';
    public $incrementing=true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $fillable = ['usuario_id','estructura_id'];
}
