<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProvEfects extends Model
{
    //
    protected $table='prov_efects';
    protected $primaryKey = 'id';
    public $incrementing=true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $fillable = ['efector_id','proveedor_id'];
}
