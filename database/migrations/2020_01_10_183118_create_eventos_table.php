<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->string('nome_evento');
            $table->string('banner');
            $table->string('inicio_data_evento');
            $table->string('fim_data_evento');
            $table->string('inicio_hora_evento');
            $table->string('fim_hora_evento');
            $table->string('ingresso');
            $table->string('endereco');
            $table->text('descricao_evento');
            $table->string('nome_org');
            $table->text('descricao_org');
            $table->string('categoria');
            $table->string('nomeclatura');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}
