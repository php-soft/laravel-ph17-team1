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
        	['battery_capacity' => "2900", 'battery_type' => "Lithium - Ion", 'battery_tech' => "Tiết kiệm pin"],
        	['battery_capacity' => "3500", 'battery_type' => "Pin chuẩn Li-Ion", 'battery_tech' => "Sạc pin nhanh, Sạc pin không dây"],
        ]);
    }
}
