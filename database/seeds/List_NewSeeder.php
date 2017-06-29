<?php

use Illuminate\Database\Seeder;

class List_NewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('list_news')->insert([
            ['name'=>"Tin tức", 'slug'=>"tin-tuc"],
            ['name'=>"Mẹo hay", 'slug'=>"meo-hay"],
            ['name'=>"Game-Ứng dụng", 'slug'=>"game-app"],
            ['name'=>"Sản phẩm", 'slug'=>"san-pham"],
            ['name'=>"Đánh giá", 'slug'=>"danh-gia"],
        ]);
    }
}
