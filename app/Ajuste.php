<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ajuste extends Model
{
    protected $table = "ajustes";

    protected $fillable = ['id','motivo','id_producto','existencia','ajuste','id_empleado_creo','created_at'];
}
