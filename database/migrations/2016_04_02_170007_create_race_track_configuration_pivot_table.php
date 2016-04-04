<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRaceTrackConfigurationPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('race_track_configuration', function (Blueprint $table) {
            $table->integer('race_id')->unsigned()->index();
            $table->foreign('race_id')->references('id')->on('races')->onDelete('cascade');
            $table->integer('track_configuration_id')->unsigned()->index();
            $table->foreign('track_configuration_id')->references('id')->on('track_configurations')->onDelete('cascade');
            $table->primary(['race_id', 'track_configuration_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('race_track_configuration');
    }
}
