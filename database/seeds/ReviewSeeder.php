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
            ['customer_id' => "3", 'product_id' => "1", 'comment' => "Sản phẩm tuyệt vời"],
            ['customer_id' => "4", 'product_id' => "2", 'comment' => "Sản phẩm quá tốt"],
        ]);
    }
}
