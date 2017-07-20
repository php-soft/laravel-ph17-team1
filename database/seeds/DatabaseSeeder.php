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
        $this->call(UserSeeder::class);
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
        $this->call(VoucherSeeder::class);
        $this->call(PromotionSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(Banner_SlideSeeder::class);
        $this->call(List_NewSeeder::class);
        $this->call(NewsSeeder::class);
    }
}
