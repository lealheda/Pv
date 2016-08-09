<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resumen_compra extends Model
{
        protected $fillable = ['cantidad','descuento_porcentaje','descuento_pesos', 'subtotal', 'iva','ieps','total'];
}
