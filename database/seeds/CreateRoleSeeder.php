<?php

use Illuminate\Database\Seeder;

class CreateRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->insert([
            ['name' =>'admin', 'auth_name'=>'Quản trị hệ thống'],
            ['name' =>'guest', 'auth_name'=>'Khách hàng'],
            ['name' =>'developer', 'auth_name'=>'Phát triển hệ thống'],
            ['name' =>'content', 'auth_name'=>'Chỉnh sửa nội dung'],

        ]);
    }
}
