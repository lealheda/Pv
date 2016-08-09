<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = "empleados";

    protected $fillable = ['id','nombre','apellido_paterno','apellido_materno','fecha_nacimiento','curp','telefono','correo_electronico','calle','numero','colonia','codigo_postal','municipio','estado','pais','activo','id_empleado_creo'];
    
}
