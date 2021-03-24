<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu')->insert(
            [
                [
                    'name' => 'Home',
                    'type_link' => 'current',
                    'type_menu'=>'link',
                    'status'=>'active',
                ],
                [
                    'name' => 'Food',
                    'type_link' => 'current',
                    'type_menu'=>'category_product',
                    'status'=>'active',
                ],
                [
                    'name' => 'Blog',
                    'type_link' => 'current',
                    'type_menu'=>'link',
                    'status'=>'active',
                ],
                [
                    'name' => 'About',
                    'type_link' => 'current',
                    'type_menu'=>'link',
                    'status'=>'active',
                ],
                [
                    'name' => 'Contact Us',
                    'type_link' => 'current',
                    'type_menu'=>'link',
                    'status'=>'active',
                ],
            ]);
    }
}
