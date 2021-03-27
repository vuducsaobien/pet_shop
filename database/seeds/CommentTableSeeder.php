<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comment')->insert(
            [
                [
                    'product_id' => 1,
                    'message'=>'hay ghê đó!',
                    'ip'=>'127.0.0.1',
                    'name'=>'alex',
                    'email'=>'themonica@gmail.com',
                    'created'=>now(),
                    'created_by'=>'admin'

                ],
            ]);
    }
}
