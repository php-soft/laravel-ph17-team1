<?php

use Illuminate\Database\Seeder;

class Front_CameraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('front_cameras')->insert([
            ['resolution' => "8 MP", 'videocall' => true, 'other_info' => "	Camera góc rộng, Chế độ làm đẹp, Nhận diện khuôn mặt, Selfie bằng cử chỉ, Flash màn hình"],
            ['resolution' => "8 MP", 'videocall' => true, 'other_info' => "Camera góc rộng, Chế độ làm đẹp, Nhận diện khuôn mặt, Selfie bằng cử chỉ, Flash màn hình"],
        ]);
    }
}
