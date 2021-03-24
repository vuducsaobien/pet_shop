<?php

use App\Models\ProductModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ProductModel::class, 10)->create();

        /*DB::table('product')->insert(
            [
                [
                    'name' => 'Dog Calcium Food',
                    'category_id' => 2,
                    'thumb'=>'/images/product/s1.jpeg',
                    'price'=>10000,
                    'created'=>now(),
                    'created_by'=>'admin'
                ],
            ]);*/

    }
}
