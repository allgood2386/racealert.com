<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRacesTrackConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('races_track_configurations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('race_id');
            $table->integer('track_configuration_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('races_track_configurations');
    }
}
