<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra_detalle extends Model
{
    protected $table = "compras_detalle";

    protected $fillable = ['id','id_producto','id_compra','nombre_producto','precio','cantidad','descuento_porcentaje','descuento_pesos','subtotal','iva','ieps','total','created_at'];
}
