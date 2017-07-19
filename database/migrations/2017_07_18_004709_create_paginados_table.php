<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaginadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paginados', function (Blueprint $table) {
            $table->string('id',15)->primary();
            $table->integer('inicial')->default(0);
            $table->integer('final')->default(9);
           // $table->integer('id_usuario')->unsigned()->unique();
            //$table->foreign('id_usuario')->references('id')->on('users');
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
        Schema::dropIfExists('paginados');
    }
}
