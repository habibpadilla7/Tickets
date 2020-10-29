<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Buyer;
use Faker\Generator as Faker;

$factory->define(Buyer::class, function (Faker $faker) {
    return [
        'names' => $faker->name,
        'surnames' => $faker->name,
        'identification' => '123456789',
        'email' => $faker->unique()->safeEmail
    ];
});
