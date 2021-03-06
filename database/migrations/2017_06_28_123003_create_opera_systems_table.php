<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperaSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opera_systems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('opera_system', 255)->nullable();
            $table->string('chipset', 255)->nullable();
            $table->string('cpu_speed', 255)->nullable();
            $table->string('cpu', 255)->nullable();
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
        Schema::dropIfExists('opera_systems');
    }
}
