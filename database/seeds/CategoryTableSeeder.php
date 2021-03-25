<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert(
            [
                [
                    'name' => 'root',
                    'status' => 'active',
                    'parent_id'=>0,
                    '_lft'=>1,
                    '_rgt'=>20,
                    'created'=>now(),
                    'created_by'=>'admin',
                    'thumb'=>'/images/category/cate1.jpg',


                ],
                [
                    'name' => 'dogs food',
                    'status' => 'active',
                    'parent_id'=>1,
                    '_lft'=>2,
                    '_rgt'=>7,
                    'created'=>now(),
                    'created_by'=>'admin',
                    'thumb'=>'/images/category/cate1.jpg',

                ],
                [
                    'name' => 'cats food',
                    'status' => 'active',
                    'parent_id'=>1,
                    '_lft'=>8,
                    '_rgt'=>13,
                    'created'=>now(),
                    'created_by'=>'admin',
                    'thumb'=>'/images/category/cate2.jpg',

                ],
                [
                    'name' => 'Eggs',
                    'status' => 'active',
                    'parent_id'=>2,
                    '_lft'=>3,
                    '_rgt'=>4,
                    'created'=>now(),
                    'created_by'=>'admin',
                    'thumb'=>'/images/category/cate1.jpg',

                ],
                [
                    'name' => 'Carrots',
                    'status' => 'active',
                    'parent_id'=>2,
                    '_lft'=>5,
                    '_rgt'=>6,
                    'created'=>now(),
                    'created_by'=>'admin',
                    'thumb'=>'/images/category/cate1.jpg',

                ],
                [
                    'name' => 'fishs food',
                    'status' => 'active',
                    'parent_id'=>1,
                    '_lft'=>14,
                    '_rgt'=>19,
                    'created'=>now(),
                    'created_by'=>'admin',
                    'thumb'=>'/images/category/cate3.jpg',

                ],
                [
                    'name' => 'Meat',
                    'status' => 'active',
                    'parent_id'=>3,
                    '_lft'=>9,
                    '_rgt'=>10,
                    'created'=>now(),
                    'created_by'=>'admin',
                    'thumb'=>'/images/category/cate1.jpg',

                ],
                [
                    'name' => 'Cheese',
                    'status' => 'active',
                    'parent_id'=>3,
                    '_lft'=>11,
                    '_rgt'=>12,
                    'created'=>now(),
                    'created_by'=>'admin',
                    'thumb'=>'/images/category/cate1.jpg',

                ],
                [
                    'name' => 'Rice',
                    'status' => 'active',
                    'parent_id'=>6,
                    '_lft'=>15,
                    '_rgt'=>16,
                    'created'=>now(),
                    'created_by'=>'admin',
                    'thumb'=>'/images/category/cate1.jpg',

                ],
                [
                    'name' => 'Veggies',
                    'status' => 'active',
                    'parent_id'=>6,
                    '_lft'=>17,
                    '_rgt'=>18,
                    'created'=>now(),
                    'created_by'=>'admin',
                    'thumb'=>'/images/category/cate1.jpg',

                ],
            ]);
    }
}
