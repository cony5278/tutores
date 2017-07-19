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
            $table->string('publicacion_id',15)->nullable();
            $table->foreign('publicacion_id')->references('id')->on('publicaciones');
            //$table->integer('usuario_tutor_id')->unsigned()->nullable();
            //$table->foreign('usuario_tutor_id')->references('id')->on('users');
            $table->string('id_usuario',15);
            $table->string('email',50);
            $table->enum('tipo_usuario',['T','A','S'])->default('A');
            $table->foreign(array('id_usuario','email', 'tipo_usuario'))
                ->references(array('id','email', 'tipo_usuario'))
                ->on('users');
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
