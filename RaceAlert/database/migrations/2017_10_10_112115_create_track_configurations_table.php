<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTrackConfigurationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('track_configurations', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->longtext('description');
            $table->decimal('length');
            $table->integer('track_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('track_configurations');
    }
}
