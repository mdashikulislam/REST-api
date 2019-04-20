<?php

use Faker\Generator as Faker;

/** @var TYPE_NAME $factory */
$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' =>$faker->word,
        'detail' => $faker->paragraph,
        'price' => $faker->numberBetween(500,1900),
        'stock' => $faker->randomDigit,
        'discount' => $faker->numberBetween(5,25)
    ];
});
