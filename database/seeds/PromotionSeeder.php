<?php

use Illuminate\Database\Seeder;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promotions')->insert([
            ['name' => "Tặng thẻ nhớ 16gb", 'start_date' => date('2017-6-17'), 'end_date' => date('2017-10-17')],
            ['name' => "Tặng gói bảo hiểm rơi vỡ, vào nước", 'start_date' => date('2017-6-17'), 'end_date' => date('2017-10-17')],
            ['name' => "Tặng phiếu mua hàng 300 nghìn đồng", 'start_date' => date('2017-6-17'), 'end_date' => date('2017-10-17')],
            ['name' => "Tặng phiếu mua hàng 500 nghìn đồng", 'start_date' => date('2017-6-17'), 'end_date' => date('2017-10-17')],
            ['name' => "Cơ hội trúng 300 máy lạnh Samsung", 'start_date' => date('2017-6-17'), 'end_date' => date('2017-10-17')],
            ['name' => "Nhận ngay kính Gear VR3 khi là chủ sở hữu Samsung Galaxy dòng S", 'start_date' => date('2017-6-17'), 'end_date' => date('2017-10-17')],
            ['name' => "Trả góp 0%", 'start_date' => date('2017-6-17'), 'end_date' => date('2017-10-17')],
        ]);
    }
}
