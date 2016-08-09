<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cliente');
            $table->boolean('facturada');
            $table->String('numero_factura')->nullable();
            $table->String('notas')->nullable();
            $table->String('referencia')->nullable();
            $table->integer('total_productos');
            $table->double('descuento_porcentaje',15,4);
            $table->double('descuento_pesos',15,4);
            $table->double('subtotal',15,4);
            $table->double('iva',15,4);
            $table->double('ieps',15,4);
            $table->double('total',15,4);
            $table->String('tipo_pago');
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
        Schema::drop('ventas');
    }
}
