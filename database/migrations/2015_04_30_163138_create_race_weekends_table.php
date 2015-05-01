<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRaceWeekendsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('race_weekends', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->string('event_name');
            $table->text('body');
            $table->timestamp('start');
            $table->timestamp('finish');
		});

        /*
        Schema::create('raceseries_raceweekend', function(Blueprint $table)
        {

            $table->integer('raceweekend_id')->unsigned()->index();
            $table->foreign('raceweekend_id')->references('id')->on('raceweekend');

            $table->integer('raceseries_id')->unsigned()->index();
            $table->foreign('raceseries_id')->references('id')->on('raceseries');

            $table->timestamps();
        });
        */
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('race_weekends');
        //Schema::drop('raceseries_raceweekend');
	}

}
