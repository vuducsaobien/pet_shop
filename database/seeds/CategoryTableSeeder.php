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
                    '_rgt'=>10,
                    'created'=>now(),
                    'created_by'=>'admin'
                ],
                [
                    'name' => 'DOGS FOOD',
                    'status' => 'active',
                    'parent_id'=>1,
                    '_lft'=>2,
                    '_rgt'=>7,
                    'created'=>now(),
                    'created_by'=>'admin'
                ],
                [
                    'name' => 'CATS FOOD',
                    'status' => 'active',
                    'parent_id'=>1,
                    '_lft'=>8,
                    '_rgt'=>9,
                    'created'=>now(),
                    'created_by'=>'admin'
                ],
                [
                    'name' => 'Eggs',
                    'status' => 'active',
                    'parent_id'=>2,
                    '_lft'=>3,
                    '_rgt'=>4,
                    'created'=>now(),
                    'created_by'=>'admin'
                ],
                [
                    'name' => 'Carrots',
                    'status' => 'active',
                    'parent_id'=>2,
                    '_lft'=>5,
                    '_rgt'=>6,
                    'created'=>now(),
                    'created_by'=>'admin'



                ],
            ]);
    }
}
