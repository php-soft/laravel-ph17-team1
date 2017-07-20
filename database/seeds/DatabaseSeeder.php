<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorySeeder::class);
        $this->call(StoreSeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(Opera_SystemSeeder::class);
        $this->call(ScreenSeeder::class);
        $this->call(Front_CameraSeeder::class);
        $this->call(Back_CameraSeeder::class);
        $this->call(BatterySeeder::class);
        $this->call(MemorySeeder::class);
        $this->call(ConnectSeeder::class);
        $this->call(UtilitySeeder::class);
        $this->call(DesignSeeder::class);
        $this->call(ManufactorySeeder::class);
        $this->call(ScreenSeeder::class);
    }
}
