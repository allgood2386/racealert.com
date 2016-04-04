<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRaceEventTrackPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('race_event_track', function (Blueprint $table) {
            $table->integer('race_event_id')->unsigned()->index();
            $table->foreign('race_event_id')->references('id')->on('race_events')->onDelete('cascade');
            $table->integer('track_id')->unsigned()->index();
            $table->foreign('track_id')->references('id')->on('tracks')->onDelete('cascade');
            $table->primary(['race_event_id', 'track_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('race_event_track');
    }
}
