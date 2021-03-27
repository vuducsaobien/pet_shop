<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OrderModel;
use Faker\Generator as Faker;

$w=0;
$factory->define(OrderModel::class, function (Faker $faker) use (&$w) {
    $w++;
    return [
        'customer_id'=>1,
        'payment_id'=>1,
        'note'=>1,
        'quantity'=>1,
        'amount'=>100000,
        'order_code'=>'SKU231',
        'created'=>now(),
        'created_by'=>'admin'
    ];
});
