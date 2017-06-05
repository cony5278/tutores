<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentoTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documento_tareas', function (Blueprint $table) {
            $table->integer('tarea_id')->unsigned()->nullable();
            $table->foreign('tarea_id')->references('id')->on('tareas');
            $table->integer('documento_id')->unsigned()->nullable();
            $table->foreign('documento_id')->references('id')->on('documentos');
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
        Schema::dropIfExists('documento_tareas');
    }
}
