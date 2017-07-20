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
            ['order_id' => "1", 'product_id' => "1", 'color_memory' => "black 64gb", 'price' => "20490000", 'quantity' => "1", 'total' => "20490000"],
            ['order_id' => "2", 'product_id' => "2", 'color_memory' => "black 128gb", 'price' => "25990000", 'quantity' => "1", 'total' => "25990000"],
            ['order_id' => "3", 'product_id' => "1", 'color_memory' => "black 64gb", 'price' => "20490000", 'quantity' => "1", 'total' => "20490000"],
            ['order_id' => "4", 'product_id' => "2", 'color_memory' => "black 128gb", 'price' => "25990000", 'quantity' => "1", 'total' => "25990000"],
            ['order_id' => "5", 'product_id' => "1", 'color_memory' => "black 64gb", 'price' => "20490000", 'quantity' => "1", 'total' => "20490000"],
            ['order_id' => "6", 'product_id' => "2", 'color_memory' => "black 128gb", 'price' => "25990000", 'quantity' => "1", 'total' => "25990000"],
            ['order_id' => "7", 'product_id' => "1", 'color_memory' => "black 64gb", 'price' => "20490000", 'quantity' => "1", 'total' => "20490000"],
            ['order_id' => "8", 'product_id' => "2", 'color_memory' => "black 128gb", 'price' => "25990000", 'quantity' => "1", 'total' => "25990000"],
            ['order_id' => "9", 'product_id' => "1", 'color_memory' => "black 64gb", 'price' => "20490000", 'quantity' => "1", 'total' => "20490000"],
            ['order_id' => "10", 'product_id' => "2", 'color_memory' => "black 128gb", 'price' => "25990000", 'quantity' => "1", 'total' => "25990000"],
            ['order_id' => "11", 'product_id' => "1", 'color_memory' => "black 64gb", 'price' => "20490000", 'quantity' => "1", 'total' => "20490000"],
            ['order_id' => "12", 'product_id' => "2", 'color_memory' => "black 128gb", 'price' => "25990000", 'quantity' => "1", 'total' => "25990000"],
            ['order_id' => "13", 'product_id' => "1", 'color_memory' => "black 64gb", 'price' => "20490000", 'quantity' => "1", 'total' => "20490000"],
            ['order_id' => "14", 'product_id' => "1", 'color_memory' => "black 128gb", 'price' => "25990000", 'quantity' => "1", 'total' => "25990000"],
            ['order_id' => "14", 'product_id' => "2", 'color_memory' => "black 64gb", 'price' => "20490000", 'quantity' => "1", 'total' => "20490000"],
            ['order_id' => "15", 'product_id' => "2", 'color_memory' => "black 128gb", 'price' => "25990000", 'quantity' => "1", 'total' => "25990000"],
            ['order_id' => "15", 'product_id' => "1", 'color_memory' => "black 64gb", 'price' => "20490000", 'quantity' => "1", 'total' => "20490000"],
            ['order_id' => "16", 'product_id' => "3", 'color_memory' => "black 128gb", 'price' => "25990000", 'quantity' => "1", 'total' => "25990000"],
            ['order_id' => "16", 'product_id' => "1", 'color_memory' => "black 64gb", 'price' => "20490000", 'quantity' => "1", 'total' => "20490000"],
            ['order_id' => "16", 'product_id' => "2", 'color_memory' => "black 128gb", 'price' => "25990000", 'quantity' => "1", 'total' => "25990000"],
        ]);
    }
}
