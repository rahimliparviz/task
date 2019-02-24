<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarMarkasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_markas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string("short_info");
            $table->string("image_path");
            $table->integer('model_id')->unsigned();
            $table->foreign('model_id')->references('id')->on('car_models');
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
        Schema::dropIfExists('car_markas');
    }
}
