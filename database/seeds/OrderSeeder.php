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
            ['id' => 1, 'madh' => '1', 'customer_id' => "1", 'employee_id' => "1", 'store_id' => "1",'voucher_id' => "1", 'status_id' => 1, 'shipping_name' => "Lê Công Viên", 'shipping_address' => "Đà Nẵng", 'shipping_phone' => "0123456789", 'shipping_email' => "lecongvien@gmail.com", 'total' => "20490000", 'created_at' => date('2017-4-15')],
            ['id' => 2, 'madh' => '2', 'customer_id' => "2", 'employee_id' => "2", 'store_id' => "1", 'voucher_id' => "1", 'status_id' => 2, 'shipping_name' => "Lê Đức Thiện", 'shipping_address' => "Đà Nẵng", 'shipping_phone' => "0123456789", 'shipping_email' => "leducthien@gmail.com", 'total' => "25990000", 'created_at' => date('2017-5-15')],
            ['id' => 3, 'madh' => '3', 'customer_id' => "2", 'employee_id' => "2", 'store_id' => "1", 'voucher_id' => "1", 'status_id' => 2, 'shipping_name' => "Lê Đức Thiện", 'shipping_address' => "Đà Nẵng", 'shipping_phone' => "0123456789", 'shipping_email' => "leducthien@gmail.com", 'total' => "25990000", 'created_at' => date('2017-5-16')],
            ['id' => 4, 'madh' => '4', 'customer_id' => "2", 'employee_id' => "2", 'store_id' => "1", 'voucher_id' => "1", 'status_id' => 2, 'shipping_name' => "Lê Đức Thiện", 'shipping_address' => "Đà Nẵng", 'shipping_phone' => "0123456789", 'shipping_email' => "leducthien@gmail.com", 'total' => "25990000", 'created_at' => date('2017-6-16')],
            ['id' => 5, 'madh' => '5', 'customer_id' => "2", 'employee_id' => "2", 'store_id' => "1", 'voucher_id' => "1", 'status_id' => 2, 'shipping_name' => "Lê Đức Thiện", 'shipping_address' => "Đà Nẵng", 'shipping_phone' => "0123456789", 'shipping_email' => "leducthien@gmail.com", 'total' => "25990000", 'created_at' => date('2017-7-16')],
            ['id' => 6, 'madh' => '6', 'customer_id' => "2", 'employee_id' => "2", 'store_id' => "1", 'voucher_id' => "1", 'status_id' => 2, 'shipping_name' => "Lê Đức Thiện", 'shipping_address' => "Đà Nẵng", 'shipping_phone' => "0123456789", 'shipping_email' => "leducthien@gmail.com", 'total' => "25990000", 'created_at' => date('2017-4-17')],
            ['id' => 7, 'madh' => '7', 'customer_id' => "2", 'employee_id' => "2", 'store_id' => "1", 'voucher_id' => "1", 'status_id' => 2, 'shipping_name' => "Lê Đức Thiện", 'shipping_address' => "Đà Nẵng", 'shipping_phone' => "0123456789", 'shipping_email' => "leducthien@gmail.com", 'total' => "25990000", 'created_at' => date('2017-5-17')],
            ['id' => 8, 'madh' => '8', 'customer_id' => "2", 'employee_id' => "2", 'store_id' => "1", 'voucher_id' => "1", 'status_id' => 2, 'shipping_name' => "Lê Đức Thiện", 'shipping_address' => "Đà Nẵng", 'shipping_phone' => "0123456789", 'shipping_email' => "leducthien@gmail.com", 'total' => "25990000", 'created_at' => date('2017-6-17')],
            ['id' => 9, 'madh' => '9', 'customer_id' => "1", 'employee_id' => "1", 'store_id' => "1",'voucher_id' => "1", 'status_id' => 1, 'shipping_name' => "Lê Công Viên", 'shipping_address' => "Đà Nẵng", 'shipping_phone' => "0123456789", 'shipping_email' => "lecongvien@gmail.com", 'total' => "20490000", 'created_at' => date('2017-7-17')],
            ['id' => 10, 'madh' => '10', 'customer_id' => "2", 'employee_id' => "2", 'store_id' => "1", 'voucher_id' => "1", 'status_id' => 2, 'shipping_name' => "Lê Đức Thiện", 'shipping_address' => "Đà Nẵng", 'shipping_phone' => "0123456789", 'shipping_email' => "leducthien@gmail.com", 'total' => "25990000", 'created_at' => date('2017-7-18')],
            ['id' => 11, 'madh' => '11', 'customer_id' => "2", 'employee_id' => "2", 'store_id' => "1", 'voucher_id' => "1", 'status_id' => 2, 'shipping_name' => "Lê Đức Thiện", 'shipping_address' => "Đà Nẵng", 'shipping_phone' => "0123456789", 'shipping_email' => "leducthien@gmail.com", 'total' => "25990000", 'created_at' => date('2017-7-18')],
            ['id' => 12, 'madh' => '12', 'customer_id' => "2", 'employee_id' => "2", 'store_id' => "1", 'voucher_id' => "1", 'status_id' => 2, 'shipping_name' => "Lê Đức Thiện", 'shipping_address' => "Đà Nẵng", 'shipping_phone' => "0123456789", 'shipping_email' => "leducthien@gmail.com", 'total' => "25990000", 'created_at' => date('2017-7-18')],
            ['id' => 13, 'madh' => '13', 'customer_id' => "2", 'employee_id' => "2", 'store_id' => "1", 'voucher_id' => "1", 'status_id' => 2, 'shipping_name' => "Lê Đức Thiện", 'shipping_address' => "Đà Nẵng", 'shipping_phone' => "0123456789", 'shipping_email' => "leducthien@gmail.com", 'total' => "25990000", 'created_at' => date('2017-7-19')],
            ['id' => 14, 'madh' => '14', 'customer_id' => "2", 'employee_id' => "2", 'store_id' => "1", 'voucher_id' => "1", 'status_id' => 2, 'shipping_name' => "Lê Đức Thiện", 'shipping_address' => "Đà Nẵng", 'shipping_phone' => "0123456789", 'shipping_email' => "leducthien@gmail.com", 'total' => "25990000", 'created_at' => date('2017-7-19')],
            ['id' => 15, 'madh' => '15', 'customer_id' => "2", 'employee_id' => "2", 'store_id' => "1", 'voucher_id' => "1", 'status_id' => 2, 'shipping_name' => "Lê Đức Thiện", 'shipping_address' => "Đà Nẵng", 'shipping_phone' => "0123456789", 'shipping_email' => "leducthien@gmail.com", 'total' => "25990000", 'created_at' => date('2017-7-19')],
            ['id' => 16, 'madh' => '16', 'customer_id' => "2", 'employee_id' => "2", 'store_id' => "1", 'voucher_id' => "1", 'status_id' => 2, 'shipping_name' => "Lê Đức Thiện", 'shipping_address' => "Đà Nẵng", 'shipping_phone' => "0123456789", 'shipping_email' => "leducthien@gmail.com", 'total' => "25990000", 'created_at' => date('2017-7-20')],
        ]);
    }
}
