<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OrderProductModel;
use Faker\Generator as Faker;

$p=0;
$factory->define(OrderProductModel::class, function (Faker $faker) use(&$p) {
    $p++;
    return [
        'order_code'=>'SKU23'.rand(1,9),
        'product_id'=>rand(1,10),
        'quantity'=>rand(1,10),
        'price'=>rand(10000,200000)
    ];
});
