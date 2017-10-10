<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Track::class, function (Faker $faker) {
  return [
    'name' => $faker->name,
    'description' => $faker->paragraph('5'),
  ];
});
