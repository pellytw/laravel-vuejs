<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
    return [
        'total_amount' => $faker->randomNumber(2),
        'paid_amount' => $faker->randomNumber(2),
        'date' => $faker->date,
        'payed' => $faker->boolean(25)
    ];
});