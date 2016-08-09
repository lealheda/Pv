<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "clientes";

    protected $fillable = ['id','rfc','nombre','telefono','correo_electronico','calle','numero','colonia','codigo_postal','municipio','estado','pais','activo','limite_credito','id_empleado_creo'];
}
