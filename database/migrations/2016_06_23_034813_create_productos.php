<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->String('nombre');
            $table->String('descripcion');
            $table->double('precio',15,4);
            $table->double('iva',15,4)->nullable();
            $table->double('ieps',15,4)->nullable();
            $table->double('descuento_maximo',15,4);
            $table->String('categoria');
            $table->String('unidades');
            $table->double('costo',15,4);
            $table->integer('minimo_inventario');
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
        Schema::drop('productos');
    }
}
