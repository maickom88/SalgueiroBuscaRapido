<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosFeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos_feeds', function (Blueprint $table) {
			  $table->bigIncrements('id');
				$table->integer('novidade_empresa_id')->unsigned();
				$table->string('album');
            $table->timestamps();

				$table->foreign('novidade_empresa_id')->references('id')->on('novidade_empresas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos_feeds');
    }
}
