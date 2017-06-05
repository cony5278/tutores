<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticiaPublicadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticia_publicadas', function (Blueprint $table) {
            $table->integer('publicacion_id')->unsigned()->nullable();
            $table->foreign('publicacion_id')->references('id')->on('publicaciones');
            $table->integer('usuario_tutor_id')->unsigned()->nullable();
            $table->foreign('usuario_tutor_id')->references('id')->on('users');
            $table->double('valor',15,3);            
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
        Schema::dropIfExists('noticia_publicadas');
    }
}
