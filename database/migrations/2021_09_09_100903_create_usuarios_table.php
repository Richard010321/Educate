<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('idusuario');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('tipoidentificacion');
            $table->bigInteger('identificacion');
            $table->bigInteger('celular');
            $table->string('correo');
            $table->string('contrasena');
            $table->bigInteger('tipo');
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
        Schema::dropIfExists('usuarios');
    }
}
