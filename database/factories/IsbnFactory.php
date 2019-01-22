<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Isbn::class, function (Faker $faker) {
    $books = App\Book::all();
    return [
        'isbn' => $faker->isbn13,
        'book_id'=>$faker->numberBetween($books->min('id'),$books->max('id'))
    ];
});
