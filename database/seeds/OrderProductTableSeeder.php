<?php

use App\Models\OrderProductModel;
use App\Models\PageModel;
use Illuminate\Database\Seeder;

class OrderProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(OrderProductModel::class, 2)->create();

    }
}
