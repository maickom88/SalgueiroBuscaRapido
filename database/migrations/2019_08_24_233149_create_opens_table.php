<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('segunda');
            $table->string('terca');
            $table->string('quarta');
            $table->string('quinta');
            $table->string('sexta');
            $table->string('sabado');
            $table->string('domingo');
            $table->integer('empresa_id')->unsigned();
            $table->timestamps();

            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opens');
    }
}
