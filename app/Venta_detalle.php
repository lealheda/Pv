<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta_detalle extends Model
{
    protected $table = "ventas_detalle";

    protected $fillable = ['id','id_producto','id_venta','nombre_producto','descripcion','precio','cantidad','descuento_porcentaje','descuento_pesos','subtotal','iva','ieps','total','created_at'];
}
