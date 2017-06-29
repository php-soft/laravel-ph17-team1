<?php

use Illuminate\Database\Seeder;

class SupportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('supports')->insert([
            ['customer_id' => "3", 'name' => "Lê Công Viên", 'email' => "lecongvien@gmail.com", 'phonenumber' => "0123456789", 'description' => "abc"],
            ['customer_id' => "4", 'name' => "Lê Đức Thiện", 'email' => "leducthien@gmail.com", 'phonenumber' => "012345679", 'description' => "abc"],
        ]);
    }
}
