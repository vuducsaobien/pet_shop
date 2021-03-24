<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductModel;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

$i=1;
$factory->define(ProductModel::class, function (Faker $faker) use(&$i) {
    $array = [1, 2, 3, 4];
    $i++;

    $random = Arr::random($array);
    return [

            'name' => 'Dog Calcium Food '.$i,
            'category_id' => 2,
            'thumb'=>'/images/product/s'.$random.'.jpeg',
            'price'=>10000,
            'created'=>now(),
            'created_by'=>'admin'

    ];
});
