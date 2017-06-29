<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => "Lê Công Viên", 'password' => "123456", 'phonenumber' => "0123456789", 'address' => "Đà Nẵng", 'email' => "lecongvien@gmail.com", 'image' => "ảnh", 'status' => true, 'remember_token' => "abc123"],
            ['name' => "Lê Đức Thiện", 'password' => "123456", 'phonenumber' => "0123456789", 'address' => "Đà Nẵng", 'email' => "leducthien@gmail.com", 'image' => "ảnh", 'status' => true, 'remember_token' => "abc12434"],
            ['name' => "Nguyễn Văn A", 'password' => "123456", 'phonenumber' => "0123456789", 'address' => "Đà Nẵng", 'email' => "ANguyenVan@gmail.com", 'image' => "ảnh", 'status' => true, 'remember_token' => "1234abcd"],
            ['name' => "Nguyễn Văn B", 'password' => "123456", 'phonenumber' => "0123456789", 'address' => "Đà Nẵng", 'email' => "B@gmail.com", 'image' => "ảnh", 'status' => true, 'remember_token' => "13434abvac"],
            ['name' => "Nguyễn Văn Kho", 'password' => "123456", 'phonenumber' => "0123456789", 'address' => "Đà Nẵng", 'email' => "Kho@gmail.com", 'image' => "ảnh", 'status' => true, 'remember_token' => "afvasfaq421e4"],
        ]);
    }
}
