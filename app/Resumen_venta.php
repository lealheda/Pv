<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resumen_venta extends Model
{
    protected $fillable = ['cantidad','descuento_porcentaje','descuento_pesos', 'subtotal', 'iva','ieps','total'];
}
