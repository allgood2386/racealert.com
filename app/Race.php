<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
  protected $fillable = [
    'name', 'start', 'end', 'description',
  ];

  public function event() {
    return $this->belongsTo(RaceEvent::class);
  }
}
