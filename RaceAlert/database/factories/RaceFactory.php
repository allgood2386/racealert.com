<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Race::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'description' => $faker->paragraph(3),
        'start' => $faker->dateTime(),
    ];
});
