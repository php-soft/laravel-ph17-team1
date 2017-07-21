<?php

use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colors')->insert([
            ['name' => "đen"],
            ['name' => "trắng"],
            ['name' => "đỏ"],
            ['name' => "xanh"],
            ['name' => "vàng"],
            ['name' => "tím"],
        ]);
    }
}
