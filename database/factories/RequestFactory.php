<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Request::class, function (Faker $faker) {
    $users = App\User::all();
    $books = App\Book::all();
    return [
        'book_id' => rand($books->min('id'),$books->max('id')),
        'req_start'=>$faker->dateTimeThisMonth,
        'req_end'=>$faker->dateTimeThisMonth,
        'user_id'=>rand($users->min('id'),$users->max('id')),
        'status' => $faker->randomElement(['active','expired','waiting'])
    ];
});
