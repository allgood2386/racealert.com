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
            $table->integer('race_series_id')->unsigned();
			$table->timestamps();
            $table->string('event_name');
            $table->text('body');
            $table->timestamp('start');
            $table->timestamp('finish');

            $table->foreign('race_series_id')
                ->references('id')
                ->on('race_series');
		});
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
