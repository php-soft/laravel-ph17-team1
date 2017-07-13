<?php

use Illuminate\Database\Seeder;

class Product_StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_stores')->insert([
            ['product_id' => "1", 'store_id' => "1", 'quantity' => "100"],
            ['product_id' => "2", 'store_id' => "1", 'quantity' => "100"],
        ]);
    }
}
