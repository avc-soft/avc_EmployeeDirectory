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
$factory->define(App\Position::class, function (Faker\Generator $faker) {
    /*return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];*/

    return [
        [
            'name' => 'President',
        ],
        [
            'name' => 'Vice President',
        ],
        [
            'name' => 'Division Director',
        ],
        [
            'name' => 'Head of Department',
        ],
        [
            'name' => 'Team Lead',
        ],
        [
            'name' => 'Common Employee',
        ],
    ];
});

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
