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
            $table->string('network', 255)->nullable();
            $table->string('sim', 255)->nullable();
            $table->string('wifi', 255)->nullable();
            $table->string('gps', 255)->nullable();
            $table->string('bluetooth', 255)->nullable();
            $table->string('port', 255)->nullable();
            $table->string('jack', 255)->nullable();
            $table->string('other', 255)->nullable();
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
