<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrackConfiguration extends Model
{
    protected $fillable = [
      'name', 'description'
    ];
  
    public function track() {
      return $this->belongsTo(Track::class);
    }
  
    public function races() {
      return $this->belongsToMany(Race::class);
    }
}
