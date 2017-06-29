<?php

use Illuminate\Database\Seeder;

class Back_CameraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('back_cameras')->insert([
        	['resolution' => "12MP", 'film' => "Quay phim 4K 2160p@60fps", 'flash' => "Đèn LED 2 tông màu", 'advanced_photography' => "Chụp phơi sáng, Chụp ảnh xóa phông, Chụp trước lấy nét sau, Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, HDR, Panorama, Chống rung quang học (OIS), Chế độ chụp chuyên nghiệp"],
        	['resolution' => "Hai camera 12 MP", 'film' => "Quay phim 4K 2160p@30fps", 'flash' => "4 đèn LED (2 tông màu)", 'advanced_photography' => "Chụp ảnh xóa phông, Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, HDR, Panorama, Chống rung quang học (OIS)"],
        ]);
    }
}
