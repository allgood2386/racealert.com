<?php

use Illuminate\Database\Seeder;

class RaceEventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Track::class, 10)->create()->each(function($u) {
            $u->trackConfigurations()->saveMany(factory(App\TrackConfiguration::class, 2)->create());
        });
        factory(App\RaceEvent::class, 30)->create()->each(function($u) {
            $u->races()->saveMany(factory(App\Race::class, 3)->create());
        });

        $trackIdMax = App\Track::all()->count();

        foreach(App\Race::all() as $race) {
            $track = App\Track::find(rand(0, $trackIdMax));
            $trackConfigurationIds = $track->trackConfigurations()->id;
            $race->save([
              'track_id' => $track->id,
              'track_configuration_id' =
            ]);
        }
    }
}
