<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRaceTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('race_types', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->string('type');
		});

        Schema::create('race_race_type', function(Blueprint $table){
            $table->integer('race_id')->unsigned()->index();
            $table->foreign('race_id')->references('id')->on('races');

            $table->integer('race_type_id')->unsigned()->index();
            $table->foreign('race_type_id')->references('id')->on('race_type');

            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('race_types');
        Schema::drop('race_type_race');
	}

}
