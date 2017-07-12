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
            ['id' => 1, 'name' => "red", 'image' => 'ảnh'],
            ['id' => 2, 'name' => "black", 'image' => 'ảnh'],
        ]);
    }
}
