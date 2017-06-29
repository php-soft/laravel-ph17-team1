<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => "nhân viên bán hàng"],
            ['name' => "người dùng"],
            ['name' => "nhân viên kho hàng"],
        ]);
    }
}
