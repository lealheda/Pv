<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->increments('id');
            $table->String('rfc');
            $table->String('nombre');
            $table->String('telefono');
            $table->String('correo_electronico');
            $table->String('calle');
            $table->String('numero');
            $table->String('colonia');
            $table->integer('codigo_postal');
            $table->String('municipio');
            $table->String('estado');
            $table->String('pais');
            $table->boolean('activo');
            $table->integer('id_empleado_creo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('proveedores');
    }
}
