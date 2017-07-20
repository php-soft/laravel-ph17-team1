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
            $table->integer('resolution1')->nullable();
            $table->integer('resolution2')->nullable();
            $table->string('film', 255)->nullable();
            $table->string('flash', 255)->nullable();
            $table->string('advanced', 255)->nullable();
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
