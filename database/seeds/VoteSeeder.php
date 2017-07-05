<?php
use Illuminate\Database\Seeder;
class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('votes')->insert([
            ['customer_id' => "3", 'product_id' => "1", 'name' => "Nguyễn Văn A", 'phone' => "0123456789", 'emaill' => "nguyenvana@gmail.com", 'star' => "5", 'comment' => "Máy rất tốt camera đẹp đầy đủ chức năng lun có câm biến vân tay nhân viên phục vụ rất nhiệt tìnhh và buôn bán rất nhanh chóng rất thích nhân viên nhanh chóng"],
            ['customer_id' => "4", 'product_id' => "2", 'name' => "Nguyễn Văn B", 'phone' => "0123456789", 'emaill' => "nguyenvanb@gmail.com", 'star' => "5", 'comment' => "Máy đẹp, chức năng quá hay, camera đẹp"],
            ['customer_id' => "5", 'product_id' => "1", 'name' => "Nguyễn Văn C", 'phone' => "0123456789", 'emaill' => "nguyenvanc@gmail.com", 'star' => "3", 'comment' => "Máy đẹp, mỏng, không chắc chắn cho lắm"],
        ]);
    }
}