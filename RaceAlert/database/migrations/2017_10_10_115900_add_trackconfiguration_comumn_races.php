<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTrackconfigurationComumnRaces extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('races', function(Blueprint $table) {
        $table->integer('track_configuration_id')->nullable();
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
        $table->dropColumn('track_configuration_id');
        $table->integer('track_id')->nullable(false)->change();
      });
    }
}
