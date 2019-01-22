<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description'=>$faker->sentence(10),
        'created_by'=>1,
        'udc_code'=>$faker->numberBetween(0,9),

    ];
});
