<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OrderModel;
use Faker\Generator as Faker;

$factory->define(OrderModel::class, function (Faker $faker) {
    return [
        'customer_id'=>1,
        'payment_id'=>1,
        'note'=>1,
        'quantity'=>1,
        'amount'=>1,
        'order_code'=>1,
        'created'=>now(),
        'created_by'=>'admin'
    ];
});
