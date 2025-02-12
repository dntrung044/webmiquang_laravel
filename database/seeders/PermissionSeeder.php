<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'name' => 'role',
                'description' => 'Quản lý phân quyền',
                'key_code' => 'roles',
                'created_at' => null,
                'updated_at' => '2024-03-08 13:51:17',
            ],
            [
                'name' => 'user',
                'description' => 'Quản lý thông tin người dùng',
                'key_code' => 'users',
                'created_at' => null,
                'updated_at' => '2024-03-08 13:50:58',
            ],
            [
                'name' => 'information',
                'description' => 'Quản lý thông tin',
                'key_code' => 'abouts',
                'created_at' => '2024-03-05 08:53:05',
                'updated_at' => '2024-03-05 08:53:05',
            ],
            [
                'name' => 'menu',
                'description' => 'Quản lý thực đơn',
                'key_code' => 'menus',
                'created_at' => '2024-03-05 09:40:02',
                'updated_at' => '2024-03-08 13:49:25',
            ],
            [
                'name' => 'blog',
                'description' => 'Quản lý blog',
                'key_code' => 'blogs',
                'created_at' => '2024-03-08 13:53:58',
                'updated_at' => '2024-03-08 13:53:58',
            ],
            [
                'name' => 'order',
                'description' => 'Quản lý đơn hàng',
                'key_code' => 'orders',
                'created_at' => '2024-03-08 13:53:58',
                'updated_at' => '2024-03-08 13:53:58',
            ],
        ]);
    }
}
