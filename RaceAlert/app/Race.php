<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    public $fillable = [
      'raceName',
      'raceDescription',
      'raceStart',
      'raceEnd',
    ];
}
