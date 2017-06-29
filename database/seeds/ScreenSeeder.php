<?php

use Illuminate\Database\Seeder;

class ScreenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('screens')->insert([
            ['tech_screen' => "Super AMOLED", 'resolution' => "	2K (1440 x 2960 Pixels)", 'width_screen' => "6.2 inch", 'touch_screen' => "Corning Gorilla Glass 5"],
            ['tech_screen' => "LED-backlit IPS LCD", 'resolution' => "Full HD (1080 x 1920 pixels)", 'width_screen' => "5.5 inch", 'touch_screen' => "Kính oleophobic (ion cường lực)"],
        ]);
    }
}
