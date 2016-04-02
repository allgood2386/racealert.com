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
        factory(App\RaceEvent::class, 50)->create()->each(function($u) {
            $u->races()->saveMany(factory(App\Race::class, 3)->create());
        }); 
    }
}
