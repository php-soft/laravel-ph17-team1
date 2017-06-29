<?php

use Illuminate\Database\Seeder;

class Opera_SystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('opera_systems')->insert([
            ['opera_system' => "Android 7.0", 'chipset' => "Exynos 8895 8 nhân 64-bit", 'cpu_speed' => "	4 nhân 2.3 GHz và 4 nhân 1.7 GHz", 'cpu' => "Mali™ G71"],
            ['opera_system' => "iOS 10", 'chipset' => "	Apple A10 Fusion 4 nhân 64-bit", 'cpu_speed' => "2.3 GHz", 'cpu' => "	Chip đồ họa 6 nhân"],
        ]);
    }
}
