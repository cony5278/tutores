<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo_tarea',25);  
            $table->enum('estado_entrega',['ACEPTADO','RECHAZADO','ENTREGADO','NOENTREGADO']);
            $table->integer('area_id')->unsigned();
            $table->foreign('area_id')->references('id')->on('areas');  
            $table->string('publicacion_id',15)->unique();
            $table->foreign('publicacion_id')->references('id')->on('publicaciones');    
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
        Schema::dropIfExists('tareas');
    }
}
