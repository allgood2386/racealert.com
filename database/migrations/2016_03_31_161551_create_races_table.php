<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('races', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->longText('description');
            $table->integer('race_event_id', FALSE, TRUE)->index();
            $table->integer('track_id', FALSE, TRUE)->index();
            $table->integer('track_configuration_id', FALSE, TRUE)->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('races');
    }
}
