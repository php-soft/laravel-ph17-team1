<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            ['name' => "SamSung S8+", 'manufactory_id' => "1", 'slug' => "Sam-Sung-S8-Plus", 'price' => "20490000", 'sale_price' => "20000000", 'description' => "SamSung S8+", 'image' => "ảnh", 'accessory' =>"Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim", 'tophot' => "0", 'warranty_moth' => "12", 'status' => true, 'back_camera_id' => "1", 'front_camera_id' => "1", 'battery_id' => "1", 'connect_id' => "1", 'design_id' => "1", 'opera_system_id' => "1", 'screen_id' => "1", 'utility_id' => "1", 'color_id' => "1", 'memory_id' => "1"],
            ['name' => "Iphone 7+", 'manufactory_id' => "2", 'slug' => "Iphone-7-Plus", 'price' => "2599000", 'sale_price' => "25500000", 'description' => "Iphone 7+", 'image' => "ảnh", 'accessory' =>"Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim", 'tophot' => "0", 'warranty_moth' => "12", 'status' => true, 'back_camera_id' => "2", 'front_camera_id' => "2", 'battery_id' => "2", 'connect_id' => "2", 'design_id' => "2", 'opera_system_id' => "2", 'screen_id' => "2", 'utility_id' => "2", 'color_id' => "2", 'memory_id' => "2"],
        ]);
    }
}
