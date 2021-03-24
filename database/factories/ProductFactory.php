<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductModel;
use Faker\Generator as Faker;

$factory->define(ProductModel::class, function (Faker $faker) {
    return [

            'name' => 'Dog Calcium Food',
            'category_id' => 2,
            'thumb'=>'/images/product/s1.jpeg',
            'price'=>10000,
            'created'=>now(),
            'created_by'=>'admin'

    ];
});
