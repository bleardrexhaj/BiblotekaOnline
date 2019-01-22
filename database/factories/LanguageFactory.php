<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Language::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['Shqip','Anglisht', 'Gjermanisht']),

        'created_by' =>1
    ];
});
