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
     //   $this->call(TrackSeederTableSeeder::class);
        $this->call(RaceEventsTableSeeder::class);
    }
}
