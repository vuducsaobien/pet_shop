<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OrderProductModel;
use Faker\Generator as Faker;

$p=0;
$factory->define(OrderProductModel::class, function (Faker $faker) use(&$p) {
    $p++;
    return [
        'order_code'=>'SKU231',
        'product_id'=>$p,
        'quantity'=>2,
        'price'=>10000
    ];
});
