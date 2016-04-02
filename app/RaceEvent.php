<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RaceEvent extends Model
{
  protected $fillable = [
    'name', 'start', 'end', 'description',
  ];

  public function races() {
    return $this->hasMany(Race::class);
  }
}
