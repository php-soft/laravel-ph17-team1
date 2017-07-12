<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => "SmartPhone", 'slug' => "Smart-Phone", 'status' => true],
            ['name' => "ClassicPhone", 'slug' => "Classic-Phone", 'status' => true],
            ['name' => "Android", 'slug' => "Android", 'status' => true],
            ['name' => "IOS", 'slug' => "IOS", 'status' => true],
        ]);
    }
}
