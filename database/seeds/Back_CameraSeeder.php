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
            
            ['resolution1' => "12", 'resolution2' => "12", 'film' => "Quay phim 4K 2160p@30fps", 'flash' => "4 đèn LED (2 tông màu)", 'advanced' => "Chụp ảnh xóa phông, Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, HDR, Panorama, Chống rung quang học (OIS)"],
            ['resolution1' => "21", 'resolution2' => null, 'film' => "Quay phim 4K 2160p@30fps", 'flash' => "4 đèn LED (2 tông màu)", 'advanced' => "Chụp ảnh xóa phông, Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, HDR, Panorama, Chống rung quang học (OIS)"],
            ['resolution1' => "13", 'resolution2' => null, 'film' => "Quay phim full HD", 'flash' => "4 đèn LED (2 tông màu)", 'advanced' => "Chụp ảnh xóa phông, Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, HDR, Panorama, Chống rung quang học (OIS)"],
            ['resolution1' => "12", 'resolution2' => null, 'film' => "Quay phim 2K 2160p@60fps", 'flash' => "Đèn LED 2 tông màu", 'advanced' => "Chụp phơi sáng, Chụp ảnh xóa phông, Chụp trước lấy nét sau, Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, HDR, Panorama, Chống rung quang học (OIS), Chế độ chụp chuyên nghiệp"],
            ['resolution1' => "8", 'resolution2' => null, 'film' => "Quay phim HD", 'flash' => "4 đèn LED (2 tông màu)", 'advanced' => "Chụp ảnh xóa phông, Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, HDR, Panorama, Chống rung quang học (OIS)"],
            ['resolution1' => "3", 'resolution2' => null, 'film' => "360p", 'flash' => null, 'advanced' => null],
        ]);
    }
}
