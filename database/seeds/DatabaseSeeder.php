<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => md5('123456'), // password
            'fullname' => 'admin',
            'avatar' => 'abc.jpg',
            'level' => 'admin',
            'status' => 'active'
        ]);
        DB::table('category')->insert([
            'name' => 'root',
            'status' => 'active',
            'parent_id'=>0,
            '_lft'=>1,
            '_rgt'=>2
        ]);
        DB::table('setting')->insert([
                ['key_value' => 'setting-general', 'value' => '{}'],
                ['key_value' => 'setting-social', 'value' => '{}'],
                ['key_value' => 'setting-email', 'value' => '{}'],
                ['key_value' => 'setting-bcc', 'value' => '{}'],
            ]

        );
    }
}
