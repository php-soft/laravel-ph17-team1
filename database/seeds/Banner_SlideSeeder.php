<?php

use Illuminate\Database\Seeder;

class Banner_SlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banner_slides')->insert([
        	['product_id' => "1", 'start_date' => date('2017-6-17'), 'end_date' => date('2017-7-17')],
        	['product_id' => "2", 'start_date' => date('2017-6-17'), 'end_date' => date('2017-7-17')],
        ]);
    }
}
