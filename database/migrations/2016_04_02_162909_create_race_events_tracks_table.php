<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRaceEventsTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('race_events_tracks', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('race_event_id', FALSE, TRUE);
            $table->integer('track_id', FALSE, TRUE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('race_events_tracks');
    }
}
