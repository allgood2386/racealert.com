<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRaceSeriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('race_series', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->string('name');
            $table->text('body');
            $table->timestamp('start');
            $table->timestamp('finish');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('race_series');
	}

}
