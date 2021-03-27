<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ArticleModel;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$k=0;

$factory->define(ArticleModel::class, function (Faker $faker) use (&$k){
    $k++;
    $name='New Shop Collection Our Shop '.$k;
    return [
        'name' => $name ,
        'slug'=>Str::slug($name),
        'status' => 'active',
        'content' =>$faker->sentence, // password
        'thumb'=>'/images/article/blog-'.$k.'.jpg',
        'created'=>now(),
        'created_by'=>'admin'



    ];
});
