<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = "compras";

    protected $fillable = ['id','id_proveedor','nombre_proveedor','surtida','fecha_surtida','numero_factura','notas','referencia','total_productos','descuento_porcentaje','descuento_pesos','subtotal','iva','ieps','total','tipo_pago','activo','id_empleado_creo','created_at'];
}
