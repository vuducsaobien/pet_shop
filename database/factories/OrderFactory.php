<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Helpers\Template;
use App\Models\OrderModel;
use Faker\Generator as Faker;

$ww=0;
$factory->define(OrderModel::class, function (Faker $faker) use (&$ww) {
    $ww++;
    return [
        'customer_id'=>rand(1,10),
        'payment_id'=>rand(1,2),
        'note'=>$faker->paragraph,
        'quantity'=>rand(1,10),
        'amount'=>rand(10000,200000),
        'order_code'=>'SKU23'.$ww,
        'created'=>Template::randomDateForSeeding(),
        'created_by'=>'admin'
    ];
});
