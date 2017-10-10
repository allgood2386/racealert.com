<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $trackConfigurations = factory(\App\Models\TrackConfiguration::class, 9)->create();
      $tracks = factory(\App\Models\Track::class, 3)->create();
      $races = factory(\App\Models\Race::class, 3)->create();
    }
}
