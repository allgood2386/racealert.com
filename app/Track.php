<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $fillable = [
      'name', 'description'
    ];

    public function races() {
      return $this->belongsToMany(Race::class);
    }
  
    public function raceEvents() {
      return $this->belongsToMany(RaceEvent::class);
    }
  
    public function trackConfigurations() {
      return $this->hasMany(TrackConfiguration::class);
    }
}
