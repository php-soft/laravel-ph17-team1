<?php

use Illuminate\Database\Seeder;

class DesignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('designs')->insert([
            ['design' => "Nguyên khối", 'material' => "	Khung kim loại + mặt kính cường lực", 'size' => "Dài 159.5 mm - Ngang 73.4 mm - Dày 8.1 mm", 'weigth' => "173 g"],
            ['design' => "Nguyên khối, mặt kính cong 2.5D", 'material' => "Hợp kim Nhôm + Magie", 'size' => "Dài 158.2 mm - Ngang 77.9 mm - Dày 7.3 m", 'weigth' => "188 g"],
        ]);
    }
}
