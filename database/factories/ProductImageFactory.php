<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductImageModel;
use Faker\Generator as Faker;
$w=0;
$factory->define(ProductImageModel::class, function (Faker $faker) use (&$w) {
    $w++;
    return [
        'product_id'=>1,
        'name'=>"l".$w.'.jpg',
    ];
});
