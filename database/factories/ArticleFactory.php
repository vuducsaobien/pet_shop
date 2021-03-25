<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ArticleModel;
use Faker\Generator as Faker;
$k=1;

$factory->define(ArticleModel::class, function (Faker $faker) use (&$k){
    $k++;
    return [
        'name' => 'New Shop Collection Our Shop '.$k,
        'status' => 'active',
        'content' =>$faker->sentence, // password
        'thumb'=>'/images/article/blog-'.$k.'.jpg',
        'created'=>now(),
        'created_by'=>'admin'



    ];
});
