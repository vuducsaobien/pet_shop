<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UserModel;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(UserModel::class, function (Faker $faker) {
    return [
        'username' => $faker->name,
        'email' => 'admin@gmail.com',
        'password' => md5('123456'), // password
        'avatar'=>'abc.jpg',
        'level'=>'admin',
        'status'=>'active'

    ];
});
