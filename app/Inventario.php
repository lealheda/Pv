<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = "inventarios";

    protected $fillable = ['id','id_producto','nombre','descripcion','cantidad','ajuste','categoria'];
}
