<?php

use App\Models\ArticleModel;
use App\Models\OrderModel;
use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(OrderModel::class, 1)->create();

    }
}
