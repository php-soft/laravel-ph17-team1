<?php

use Illuminate\Database\Seeder;

class MemorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('memories')->insert([
            ['ram' => "6", 'rom' => "64", 'available_memory' => "50", 'external_memory_card' => "Hỗ trợ thẻ nhớ mở rộng lên đến 256gb"],
            ['ram' => "4", 'rom' => "32", 'available_memory' => "30", 'external_memory_card' => "Hỗ trợ thẻ nhớ mở rộng lên đến 256gb"],
            ['ram' => "3", 'rom' => "128", 'available_memory' => "115", 'external_memory_card' => "Hỗ trợ thẻ nhớ mở rộng lên đến 256gb"],
            ['ram' => null, 'rom' => null, 'available_memory' => null, 'external_memory_card' => "Hỗ trợ thẻ nhớ mở rộng lên đến 64gb"],
        ]);
    }
}
