<?php

use Illuminate\Database\Seeder;

class BatterySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('batteries')->insert([
            ['capacity' => "4100", 'type' => "Pin chuẩn Li-Ion", 'technology' => "Sạc pin nhanh, Sạc pin không dây"],
            ['capacity' => "3500", 'type' => "Pin chuẩn Li-Ion", 'technology' => "Sạc pin nhanh, Sạc pin không dây"],
            ['capacity' => "2900", 'type' => "Lithium - Ion", 'technology' => "Tiết kiệm pin"],
            ['capacity' => "2600", 'type' => "Lithium - Ion", 'technology' => "Tiết kiệm pin"],
            ['capacity' => "1200", 'type' => "Lithium - Ion", 'technology' => null],
        ]);
    }
}
