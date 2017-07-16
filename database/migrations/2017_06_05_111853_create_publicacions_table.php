<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicaciones', function (Blueprint $table) {
            $table->string('id',15)->primary();
            $table->string('titulo',50);
            $table->string('descripcion',250);
            $table->double('valor',15,3);
            $table->dateTime('fecha_inicial');
            $table->dateTime('fecha_final');
            $table->enum('estado',['URGENTE','MUYURGENTE'])->deafault('URGENTE');        
            $table->integer('id_usuario')->unsigned()->nullable();
            $table->foreign('id_usuario')->references('id')->on('users');
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
        Schema::dropIfExists('publicaciones');
    }
}
