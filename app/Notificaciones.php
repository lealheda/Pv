<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notificaciones extends Model
{
     protected $fillable = ['id_producto','nombre_producto','minimo_inventario','existencia'];
}
