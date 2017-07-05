<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('slug', 255);
            $table->decimal('price', 10, 0);
            $table->decimal('sale_price', 10, 0)->nullable();
            $table->string('description', 255)->nullable();
            $table->string('image', 255);
            $table->string('accessory', 255);
            $table->integer('tophot')->nullable();
            $table->integer('warranty_moth');
            $table->string('status', 255);
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->integer('factory_id')->unsigned()->nullable();
            $table->foreign('factory_id')->references('id')->on('manufactories');
            $table->integer('back_camera_id')->unsigned()->nullable();
            $table->foreign('back_camera_id')->references('id')->on('back_cameras');
            $table->integer('front_camera_id')->unsigned()->nullable();
            $table->foreign('front_camera_id')->references('id')->on('front_cameras');
            $table->integer('battery_id')->unsigned()->nullable();
            $table->foreign('battery_id')->references('id')->on('batteries');
            $table->integer('connect_id')->unsigned()->nullable();
            $table->foreign('connect_id')->references('id')->on('connects');
            $table->integer('design_id')->unsigned()->nullable();
            $table->foreign('design_id')->references('id')->on('designs');
            $table->integer('opera_system_id')->unsigned()->nullable();
            $table->foreign('opera_system_id')->references('id')->on('opera_systems');
            $table->integer('screen_id')->unsigned()->nullable();
            $table->foreign('screen_id')->references('id')->on('screens');
            $table->integer('utility_id')->unsigned()->nullable();
            $table->foreign('utility_id')->references('id')->on('utilities');
            $table->integer('color_id')->unsigned()->nullable();
            $table->foreign('color_id')->references('id')->on('colors');
            $table->integer('memory_id')->unsigned()->nullable();
            $table->foreign('memory_id')->references('id')->on('memories');
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
        Schema::dropIfExists('products');
    }
}
