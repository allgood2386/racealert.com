<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRacesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('races', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->text('name');
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
		Schema::drop('races');
	}

}
