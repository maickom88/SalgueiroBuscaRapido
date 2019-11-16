<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facilites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('climatizado', ['sim', 'nao'])->default('nao');
            $table->enum('wifi', ['sim', 'nao'])->default('nao');
            $table->enum('estacionamento', ['sim', 'nao'])->default('nao');
            $table->enum('cartao', ['sim', 'nao'])->default('nao');
            $table->enum('delivery', ['sim', 'nao'])->default('nao');
            $table->enum('orcamento', ['sim', 'nao'])->default('nao');
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
        Schema::dropIfExists('facilites');
    }
}
