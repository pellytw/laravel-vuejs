<?php

use Faker\Generator as Faker;

$factory->define(App\OrderDetail::class, function (Faker $faker) {
    return [
        'order_id' => $faker->buildingNumber,
        'product_id' => $faker->buildingNumber,
        'cant' => $faker->randomNumber(2),
        'price' => $faker->randomNumber(2)
    ];
});