<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRaceTrackPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('race_track', function (Blueprint $table) {
            $table->integer('race_id')->unsigned()->index();
            $table->foreign('race_id')->references('id')->on('races')->onDelete('cascade');
            $table->integer('track_id')->unsigned()->index();
            $table->foreign('track_id')->references('id')->on('tracks')->onDelete('cascade');
            $table->primary(['race_id', 'track_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('race_track');
    }
}
