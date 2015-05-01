<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Race extends Model {

    protected $fillable = [
      'name', 'body', 'start', 'finish', 'type'
    ];

    public function raceTypes() {
        return $this->belongsToMany('App\RaceType')->withTimestamps();
    }

}
