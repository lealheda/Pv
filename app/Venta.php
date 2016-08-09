<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = "ventas";

    protected $fillable = ['id','id_cliente','nombre_cliente','facturada','numero_factura','notas','referencia','total_productos','descuento_porcentaje','descuento_pesos','subtotal','iva','ieps','total','tipo_pago','activo','id_empleado_creo','created_at'];
}
