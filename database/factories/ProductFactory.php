<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductModel;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

$i=1;
$factory->define(ProductModel::class, function (Faker $faker) use(&$i) {
    $array = [1, 2, 3, 4];
    $i++;

    $random = Arr::random($array);
    $name='Dog Calcium Food '.$i;

    return [

            'name' => $name,
            'slug'=>Str::slug($name),
            'description'=>$faker->paragraph(),
            'category_id' => 2,
            'thumb'=>'/images/product/s'.$random.'.jpeg',
            'price'=>100000,
            'sale'=>90000,
            'sale_percent'=>5,
            'created'=>now(),
            'created_by'=>'admin'

    ];
});
