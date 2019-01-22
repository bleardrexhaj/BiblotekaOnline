<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Book::class, function (Faker $faker) {
    $publishers = \App\Publisher::all();
    $languages = \App\Language::all();



    return [
        'title'=>$faker->sentence,
        'pub_year'=>$faker->date('Y'),
        'description'=>$faker->sentence(20),
        'properties'=>$faker->numberBetween(100,450).' Pages,  HardCopy',
        'stock'=>$faker->numberBetween(1,20),
        'cover_path'=>$faker->image(public_path('storage\book_covers'), 277,420,null,false,true,'photo'),
        'publisher_id'=>$faker->numberBetween($publishers->min('id'),$publishers->max('id')),
        'language_id'=>$faker->numberBetween($languages->min('id'),$languages->max('id')),
        'created_by'=>1,




    ];
});
