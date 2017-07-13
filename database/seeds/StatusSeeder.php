<?php

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
        	['id' => 1, 'name' => "Chờ xác nhận"],
        	['id' => 2,'name' => "Đã xác nhận"],
        	['id' => 3,'name' => "Đã xử lý"],
        	['id' => 4,'name' => "Đang gửi đi"],
            ['id' => 5,'name' => "Giao thành công"],
        	['id' => 6,'name' => "Hủy"],
        ]);
    }
}
