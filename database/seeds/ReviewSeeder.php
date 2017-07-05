<?php

use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            ['product_id' => "1", 'name' => "Anh A", 'email' => "anha@gmail.com", 'phone' => "0123456789", 'comment' => "Sản phẩm tuyệt vời"],
            ['product_id' => "2", 'name' => "Anh B", 'email' => "anhb@gmail.com", 'phone' => "0123456789", 'comment' => "Sản phẩm quá tốt"],
        ]);
    }
}
