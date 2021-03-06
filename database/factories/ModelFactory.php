<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {

    return [
        'body' => $faker->sentence
    ];
});

$factory->define(App\Picture::class, function (Faker\Generator $faker) {

    $urls = [
        'http://i.imgur.com/N7foTyz.jpg',
        'http://i.imgur.com/WqornET.jpg',
        'http://i.imgur.com/h8W64lg.jpg',
        'http://i.imgur.com/LjbCFrs.jpg'
        
    ];

    return [
        'url' => $urls[rand(0, 3)],
        'title' => $faker->sentence
    ];
});

$factory->define(App\Tag::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->word
    ];
});


