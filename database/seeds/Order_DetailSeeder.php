<?php

use Illuminate\Database\Seeder;

class Order_DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_details')->insert([
            ['order_id' => "1", 'product_id' => "1", 'color_memory' => "black 64gb", 'price' => "20490000", 'sale_price' => "20490000", 'quantity' => "1", 'total' => "20490000", 'start_date' => date('2017-6-17'), 'complete_date' => date('2017-6-17'), 'status' => true],
            ['order_id' => "2", 'product_id' => "2", 'color_memory' => "black 128gb", 'price' => "25990000", 'sale_price' => "20490000", 'quantity' => "1", 'total' => "25990000", 'start_date' => date('2017-6-17'), 'complete_date' => date('2017-6-17'), 'status' => true],
        ]);
    }
}
