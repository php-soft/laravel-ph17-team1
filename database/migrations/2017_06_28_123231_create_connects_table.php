<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConnectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('connects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('network_mobile', 255);
            $table->string('sim', 255);
            $table->string('wifi', 255);
            $table->string('gps', 255);
            $table->string('bluetooth', 255);
            $table->string('connect_port', 255);
            $table->string('jack_phone', 255);
            $table->string('other_connect', 255);
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
        Schema::dropIfExists('connects');
    }
}
