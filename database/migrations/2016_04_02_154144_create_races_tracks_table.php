<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRacesTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('races_tracks', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('track_id', FALSE, TRUE);
            $table->integer('race_id', FALSE, TRUE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('races_tracks');
    }
}
