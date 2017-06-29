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
            ['name' => "Sam Sung", 'slug' => "SamSung", 'phonenumber' => "0123456789", 'address' => "Korrea", 'email' => "samsung@gmail.com", 'image' => "ảnh", 'description' => "SmartPhone Sam Sung", 'location' => "Korea Area", 'status' => true],
            ['name' => "Iphone", 'slug' => "I-Phone", 'phonenumber' => "0123456789", 'address' => "American", 'email' => "iphone@gmail.com", 'image' => "ảnh", 'description' => "SmartPhone Iphone", 'location' => "American Area", 'status' => true],
        ]);
    }
}
