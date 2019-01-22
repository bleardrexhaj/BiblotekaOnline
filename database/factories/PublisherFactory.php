<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Publisher::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'info'=>$faker->sentence(10),
        'created_by' =>1
    ];
});
