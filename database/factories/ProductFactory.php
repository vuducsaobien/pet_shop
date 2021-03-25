<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductModel;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

$i=0;
$factory->define(ProductModel::class, function (Faker $faker) use(&$i) {
//    $array = [1, 2, 3, 4];
    $i++;

//    $random = Arr::random($array);
    $name='Dog Calcium Food '.$i;

    return [

            'name' => $name,
            'slug'=>Str::slug($name),
            'description'=>"<p>This stewpot is part of the Scanpan Classic cookware range, which boasts GreenTek non-stick coating which is 100% PFOA free, meaning it's safer for your family and the environment. The heavy-duty, pressure-cast aluminum body has an extra-thick base for quick, even heating and it is compatible with all cooking surfaces (excluding induction). The extraordinarily hard exterior surface is a combination of ceramic and titanium nonstick cooking surface which is impossible to scrape away, even with metal utensils. Patented spring-lock handle stays cool during normal stove top use and the stewpot is also oven safe from up to 260°C. It's also dishwasher safe for easy cleanup. </p>
                        <p>Scanpan is designed and manufactured in Denmark and offers a lifetime warranty.</p>
                        <ul>
                            <li>Key Features:</li>
                            <li>Heavy duty, pressure cast aluminium with extra thick base for quick heat up</li>
                            <li>Ceramic titanium surface with PFOA-free GreenTek non-stick coating</li>
                            <li>Fat-free frying, metal utensils safe</li>
                            <li>Suitable for all stove tops, except induction</li>
                            <li>Guaranteed not to warp</li>
                            <li>Fast and even heat distribution</li>
                            <li>Ovenproof up to 260°C</li>
                            <li>Dishwasher safe - but not recommended</li>
                            <li>Designed and manufactured in Denmark</li>
                        </ul>",
            'category_id' => 2,
            'thumb'=>'/images/product/product-'.$i.'.jpeg',
            'price'=>100000,
            'sale'=>90000,
            'sale_percent'=>5,
            'created'=>now(),
            'created_by'=>'admin'

    ];
});
