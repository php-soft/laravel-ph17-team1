<?php

use Illuminate\Database\Seeder;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('votes')->insert([
            ['star' => "1"],
            ['star' => "2"],
            ['star' => "3"],
            ['star' => "4"],
            ['star' => "5"],
        ]);
    }
}
