<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ArticleModel;
use Faker\Generator as Faker;

$factory->define(ArticleModel::class, function (Faker $faker) {
    return [
        'name' => 'New Shop Collection Our Shop',
        'status' => 'active',
        'content' =>$faker->sentence, // password
        'thumb'=>'/images/article/blog-1.jpg',


    ];
});
