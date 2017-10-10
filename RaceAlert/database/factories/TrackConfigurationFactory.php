<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\TrackConfiguration::class, function (Faker $faker) {
  return [
    'name' => $faker->name,
    'description' => $faker->paragraph('5'),
    'length' => $faker->randomFloat(2, 1, 10),
  ];
});
