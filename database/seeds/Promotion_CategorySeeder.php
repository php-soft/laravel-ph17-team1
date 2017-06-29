<?php

use Illuminate\Database\Seeder;

class Promotion_CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promotion_categories')->insert([
            ['promotion_id' => "1", 'category_id' => "1"],
            ['promotion_id' => "2", 'category_id' => "1"],
        ]);
    }
}
