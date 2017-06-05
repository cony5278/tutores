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
            $table->increments('id');
            $table->string('titulo',50);
            $table->string('descripcion',250);
            $table->dobule('valor');
            $table->date('fechass_inicial');
            $table->date('fecha_final');
            $table->enum('estado',['URGENTE','MUYURGENTE'])->deafault('');
            $table->integer('area_id')->unsigned()->nullable();
            $table->foreign('area_id')->references('id')->on('areas');
            $table->integer('tarea_id')->unsigned()->nullable();
            $table->foreign('tarea_id')->references('id')->on('tareas');
            $table->integer('usuario_aceptado_id')->unsigned()->nullable();
            $table->foreign('usuario_aceptado_id')->references('id')->on('users');
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
