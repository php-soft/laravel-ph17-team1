<?php

use Illuminate\Database\Seeder;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vouchers')->insert([
            ['code' => "abc", 'percent' => "5", 'max' => "300000", 'quantity' => "10", 'start_date' => date('2017-6-17'), 'end_date' => date('2018-6-17')],
            ['code' => "bcd", 'percent' => "6", 'max' => "500000", 'quantity' => "10", 'start_date' => date('2017-6-17'), 'end_date' => date('2018-6-17')],
            ['code' => "cde", 'percent' => "7", 'max' => "600000", 'quantity' => "10", 'start_date' => date('2017-6-17'), 'end_date' => date('2018-6-17')],
        ]);
    }
}
