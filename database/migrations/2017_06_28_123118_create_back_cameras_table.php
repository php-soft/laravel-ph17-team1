<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBackCamerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('back_cameras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('resolution', 255);
            $table->string('film', 255);
            $table->string('flash', 255);
            $table->string('advanced_photography', 255);
            $table->timestamps();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('back_cameras');
    }
}
