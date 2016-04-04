<?php

use Illuminate\Database\Seeder;

class TrackSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Track::class, 30)->create()->each(function($u) {
            $u->trackConfigurations()->saveMany(factory(App\TrackConfiguration::class, 3)->create());
        });
    }
}
