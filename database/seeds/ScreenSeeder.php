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
            ['technology' => "Super AMOLED", 'resolution' => "2K (1440 x 2960 Pixels)", 'width' => "6.2 inch", 'touch' => "Corning Gorilla Glass 5"],
            ['technology' => "Super AMOLED", 'resolution' => "Full Hd", 'width' => "6 inch", 'touch' => "Corning Gorilla Glass 5"],
            ['technology' => "LED-backlit IPS LCD", 'resolution' => "Full HD (1080 x 1920 pixels)", 'width' => "5.5 inch", 'touch' => "Kính oleophobic (ion cường lực)"],
            ['technology' => "IPS LCD", 'resolution' => "Full Hd", 'width' => "5.2 inch", 'touch' => "Corning Gorilla Glass 4"],
            ['technology' => "IPS LCD", 'resolution' => "Full Hd", 'width' => "5 inch", 'touch' => "Corning Gorilla Glass 4"],
            ['technology' => "IPS LCD", 'resolution' => "HD", 'width' => "4.5 inch", 'touch' => "Corning Gorilla Glass 3"],
            ['technology' => null, 'resolution' => null, 'width' => "2.4 inch", 'touch' => null],
        ]);
    }
}
