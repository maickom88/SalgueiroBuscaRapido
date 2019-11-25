<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('permission_id')->unsigned();
				$table->string('logoMarca')->nullable();
				$table->string('banner')->nullable();
            $table->string('name');
            $table->string('description', 800)->nullable();
            $table->string('tags');
            $table->string('nincho');
            $table->string('location');
				$table->string('tel');
				$table->string('whatsapp')->nullable();
				$table->string('email')->nullable();
            $table->string('facebook')->nullable();
				$table->string('instagram')->nullable();
            $table->enum('status',['ativa','desativada'])->default('ativa');
            $table->timestamps();


            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
