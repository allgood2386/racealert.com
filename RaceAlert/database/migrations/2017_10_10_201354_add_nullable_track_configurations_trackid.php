<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullableTrackConfigurationsTrackid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
  {
    Schema::table('track_configurations', function(Blueprint $table) {
      $table->integer('track_id')->nullable()->change();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('races', function(Blueprint $table)
    {
      $table->integer('track_id')->nullable(false)->change();
    });
  }
}
