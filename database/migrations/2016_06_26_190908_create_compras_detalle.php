<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasDetalle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras_detalle', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_compra');
            $table->integer('id_producto');
            $table->double('precio',15,4);
            $table->integer('cantidad');
            $table->double('descuento_porcentaje',15,4);
            $table->double('descuento_pesos',15,4);
            $table->double('subtotal',15,4);
            $table->double('iva',15,4);
            $table->double('ieps',15,4);
            $table->double('total',15,4);
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
        Schema::drop('compras_detalle');
    }
}
