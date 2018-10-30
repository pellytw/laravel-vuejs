<?php

use Faker\Generator as Faker;

$factory->define(App\Car::class, function (Faker $faker) {
    return [
        'brand' => $faker->name,
        'model' => $faker->buildingNumber,
        'description' => $faker->text,
        'price' => $faker->randomNumber(2)
    ];
});
