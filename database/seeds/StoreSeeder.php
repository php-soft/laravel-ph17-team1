<?php

use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stores')->insert([
            ['name' => "Chi nhánh Lê Duẩn", 'slug' => "Chi-nhanh-Le-Duan", 'phonenumber' => "0123456789", 'email' => "leduan@gmail.com", 'address' => "Lê Duẩn - Đà Nẵng", 'image' => "ảnh", 'location' => "DaNang Area", 'description' => "Chi nhánh Lê Duẩn", 'status' => true],
            ['name' => "Chi nhánh Nguyễn Văn Linh", 'slug' => "Chi-nhanh-Nguyen-Van-Linh", 'phonenumber' => "0123456789", 'email' => "nguyenvanlinh@gmail.com", 'address' => "Nguyễn Văn Linh - Đà Nẵng", 'image' => "ảnh", 'location' => "DaNang Area", 'description' => "Chi nhánh Nguyễn Văn Linh", 'status' => true],
        ]);
    }
}
