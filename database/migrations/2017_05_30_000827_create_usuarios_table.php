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
        Schema::create('users', function (Blueprint $table) {
            $table->string('id',15);
            $table->string('email',50);
            $table->enum('tipo_usuario',['T','A','S'])->default('A');
            $table->unique(array('id','email','tipo_usuario'));
            //$table->primary(['id','email','tipo_usuario']);
            $table->string('name',30);          
            $table->string('nombre1',30)->nullable();
            $table->string('nombre2',30)->nullable();
            $table->string('apellido1',30)->nullable();
            $table->string('apellido02',30)->nullable();
            $table->string('password',150);
            $table->string('telefono',50)->nullable();
            $table->enum('tipo_telefono',['C','F'])->nullable();
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
        Schema::dropIfExists('users');
    }
}
