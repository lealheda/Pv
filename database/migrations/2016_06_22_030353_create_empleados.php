<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('id');
            $table->String('nombre');
            $table->String('apellido_paterno');
            $table->String('apellido_materno');
            $table->String('fecha_nacimiento');
            $table->String('curp');
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
        DB::table('empleados')->insert(
        array(
            'nombre' => 'Daniel',
            'apellido_paterno' => 'Leal',
            'apellido_materno' => 'Hernández',
            'fecha_nacimiento' => '170192',
            'curp' => '123',
            'telefono' => '123456789',
            'correo_electronico' => 'lealheda@gmail.com',
            'calle' => '123',
            'numero' => '123',
            'colonia' => '123',
            'codigo_postal' => '123',
            'municipio' => '123',
            'estado' => '123',
            'pais' => '123',
            'activo' => '1',
            'id_empleado_creo' => '1'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('empleados');
    }
}
