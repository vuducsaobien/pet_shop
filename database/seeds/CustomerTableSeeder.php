<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customer')->insert(
            [
                [
                    'name' => 'john',
                    'status' => 'active',
                    'email'=>'abc@gmail.com',
                    'phone'=>'0234234324',
                    'address'=>'hochiminh city',
                    'ip'=>'192.168.1.1',
                    'created'=>now(),
                    'created_by'=>'admin',

                ],
            ]);
    }
}
