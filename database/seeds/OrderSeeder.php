<?php

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            ['id' => 1, 'madh' => '1', 'customer_id' => "3", 'employee_id' => "1", 'store_id' => "1",'voucher_id' => "1", 'status_id' => 1, 'shipping_name' => "Lê Công Viên", 'shipping_address' => "Đà Nẵng", 'shipping_phone' => "0123456789", 'shipping_email' => "lecongvien@gmail.com", 'total' => "20490000", 'complete_at' => date('2017-6-17')],
            ['id' => 2, 'madh' => '2', 'customer_id' => "4", 'employee_id' => "2", 'store_id' => "1", 'voucher_id' => "1", 'status_id' => 2, 'shipping_name' => "Lê Đức Thiện", 'shipping_address' => "Đà Nẵng", 'shipping_phone' => "0123456789", 'shipping_email' => "leducthien@gmail.com", 'total' => "25990000", 'complete_at' => date('2017-6-17')],
        ]);
    }
}
