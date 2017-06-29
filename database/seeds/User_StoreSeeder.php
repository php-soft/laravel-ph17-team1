<?php

use Illuminate\Database\Seeder;

class User_StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_stores')->insert([
            ['user_id' => "1", 'store_id' => "1"],
            ['user_id' => "2", 'store_id' => "1"],
            ['user_id' => "5", 'store_id' => "1"],
        ]);
    }
}
