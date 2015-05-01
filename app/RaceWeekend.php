<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class RaceWeekend extends Model {

	protected $fillable = [
      'event_name', 'body', 'start', 'finish',
    ];

    public function raceSeries() {
        $this->belongsToMany('App\RaceSeries');
    }


}
