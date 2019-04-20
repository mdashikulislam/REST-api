<?php

use Faker\Generator as Faker;
/** @var TYPE_NAME $factory */
$factory->define(App\Review::class, function (Faker $faker) {
    return [
        'product_id'=> \App\Product::all()->random(),
        'customer' => $faker->name,
        'review' => $faker->paragraph,
        'star'=> $faker->numberBetween(0,5)

    ];
});
