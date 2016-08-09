<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = "proveedores";

    protected $fillable = ['id','rfc','nombre','telefono','correo_electronico','calle','numero','colonia','codigo_postal','municipio','estado','pais','activo','id_empleado_creo'];
}
