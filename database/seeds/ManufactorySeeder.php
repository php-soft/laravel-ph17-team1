<?php

use Illuminate\Database\Seeder;

class ManufactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('manufactories')->insert([
            ['name' => "SamSung", 'slug' => "sam-sung", 'phonenumber' => "0123456789", 'address' => "Korrea", 'email' => "samsung@gmail.com", 'image' => "ảnh", 'description' => "SmartPhone SamSung", 'location' => "Korea Area", 'status' => true],
            ['name' => "iPhone", 'slug' => "iphone", 'phonenumber' => "0123456789", 'address' => "American", 'email' => "iphone@gmail.com", 'image' => "ảnh", 'description' => "SmartPhone Iphone", 'location' => "American Area", 'status' => true],
            ['name' => "HTC", 'slug' => "htc", 'phonenumber' => "0123456789", 'address' => "American", 'email' => "htc@gmail.com", 'image' => "ảnh", 'description' => "SmartPhone HTC", 'location' => "American Area", 'status' => true],
            ['name' => "Oppo", 'slug' => "oppo", 'phonenumber' => "0123456789", 'address' => "American", 'email' => "oppo@gmail.com", 'image' => "ảnh", 'description' => "SmartPhone Oppo", 'location' => "American Area", 'status' => true],
            ['name' => "LG", 'slug' => "lg", 'phonenumber' => "0123456789", 'address' => "American", 'email' => "lg@gmail.com", 'image' => "ảnh", 'description' => "SmartPhone LG", 'location' => "American Area", 'status' => true],
            ['name' => "Sony", 'slug' => "sony", 'phonenumber' => "0123456789", 'address' => "American", 'email' => "sony@gmail.com", 'image' => "ảnh", 'description' => "SmartPhone Sony", 'location' => "American Area", 'status' => true],
            ['name' => "Nokia", 'slug' => "nokia", 'phonenumber' => "0123456789", 'address' => "American", 'email' => "nokia@gmail.com", 'image' => "ảnh", 'description' => "SmartPhone Nokia", 'location' => "American Area", 'status' => true],
            ['name' => "Huawei", 'slug' => "huawei", 'phonenumber' => "0123456789", 'address' => "American", 'email' => "huawei@gmail.com", 'image' => "ảnh", 'description' => "SmartPhone Huawei", 'location' => "American Area", 'status' => true],
            ['name' => "Xiaomi", 'slug' => "xiaomi", 'phonenumber' => "0123456789", 'address' => "American", 'email' => "xiaomi@gmail.com", 'image' => "ảnh", 'description' => "SmartPhone Xiaomi", 'location' => "American Area", 'status' => true],
        ]);
    }
}
