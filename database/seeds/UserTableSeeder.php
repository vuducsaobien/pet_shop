<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => md5('1'), // password
            'fullname' => 'admin',
            'thumb' => '/images/user/1ctW8mj8vq.png',
            'level' => 'admin',
            'status' => 'active',
            'created'=>now(),
            'created_by'=>'admin',
            'modified'=>now(),
            'modified_by'=>'admin',
        ]);
    }
}
