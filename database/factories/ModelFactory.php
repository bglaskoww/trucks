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

$factory->define(App\Tractor::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word
    ];
});

$factory->define(App\Plot::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'crop' => $faker->word,
        'area' => $faker->numberBetween(100, 1000)
    ];
});

$factory->define(App\PlotTractor::class, function (Faker\Generator $faker) {
    return [
        'plot_id' => function () {
            return factory(\App\Plot::class)->create()->id;
        },
        'tractor_id' => function () {
            return factory(\App\Tractor::class)->create()->id;
        },
        'area' => $faker->numberBetween(10, 100),
        'plowing_date' => $faker->dateTimeBetween('-1 year', 'now')->format('m/d/Y')
    ];
});
