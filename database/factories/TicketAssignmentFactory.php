<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TicketAssignment;
use Faker\Generator as Faker;

$factory->define(TicketAssignment::class, function (Faker $faker) {
    return [
        'id_ticket' => $faker->unique()->randomDigit,
        'id_buyer' => $faker->unique()->randomDigit
    ];
});
