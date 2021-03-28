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
        [[
                'name'      => 'Home',
                'type_link' => 'current',
                'type_menu' => 'link',
                'status'    => 'active',
                'link'      => 'http://proj_news.xyz/news69'
            ],[
                'name'      => 'Food',
                'type_link' => 'current',
                'type_menu' => 'category_product',
                'status'    => 'active',
                'link'      => '#'
            ],[
                'name'      => 'Blog',
                'type_link' => 'current',
                'type_menu' => 'link',
                'status'    => 'active',
                'link'      => 'http://proj_news.xyz/news69/bai-viet/list-blog.html'

            ],[
                'name'      => 'About',
                'type_link' => 'current',
                'type_menu' => 'link',
                'status'    => 'active',
                'link'      => 'http://proj_news.xyz/news69/about-us.html'
            ],[
                'name'      => 'Contact Us',
                'type_link' => 'current',
                'type_menu' => 'link',
                'link'      => 'http://proj_news.xyz/news69/lien-he',
                'status'    => 'active'
        ],]);
    }
}
