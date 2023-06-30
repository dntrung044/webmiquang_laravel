<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => 'admin',
            'description' => 'Quản trị viên',
            'user_id' => 5,
            'permission_id' => 1,
            ],

            ['name' => 'guest',
            'description' => 'Khách hàng',
            'user_id' => 6,
            'permission_id' => 2,
            ],

            ['name' => 'developer',
            'description' => 'Phát tiển hệ thống',
            'user_id' => 7,
            'permission_id' => 3,
            ],

            ['name' => 'content',
            'description' => 'Chỉnh sửa nội dung',
            'user_id' => 8,
            'permission_id' => 4,
            ]
        ]);
    }
}
