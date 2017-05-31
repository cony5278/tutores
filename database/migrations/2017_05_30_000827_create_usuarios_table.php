<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('pseudonimo',30);          
            $table->string('nombre1',30)->nullable();
            $table->string('nombre2',30)->nullable();
            $table->string('apellido1',30)->nullable();
            $table->string('apellido02',30)->nullable();
            $table->string('correo',50)->unique();
            $table->string('contrasena',150);
            $table->char('tipo_usuario',1,['T'=>'tutor','A'=>'aprendiz'])->default('A');
            $table->string('telefono',50)->nullable();
            $table->char('tipo_telefono',1,['C'=>'celular','F'=>'fijo'])->nullable();
            $table->integer('usuario_id')->unsigned()->nullable();
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->rememberToken();
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
