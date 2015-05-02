<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Race extends Model {

    protected $fillable = [
      'name', 'body', 'start', 'finish', 'type', 'race_weekend_id',
    ];

    public function raceTypes() {
        return $this->belongsToMany('App\RaceType')->withTimestamps();
    }

    public function raceWeekend() {
        return $this->belongsTo('App\RaceWeekend');
    }
}
