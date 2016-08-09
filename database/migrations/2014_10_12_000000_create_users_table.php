<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('password_alternativo')->nullable();
            $table->enum('type',['administrador','vendedor','supervisor','miembro'])->default('miembro');
            $table->integer('id_empleado');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert(
        array(
            'name' => 'Leal',
            'email' => 'lealheda@gmail.com',
            'password' => bcrypt('leal'),
            'password_alternativo' => 'leal',
            'id_empleado' => '1'
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
        Schema::drop('users');
    }
}
