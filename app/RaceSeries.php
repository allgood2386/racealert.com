<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class RaceSeries extends Model {

	protected $fillable = [
        'name', 'body', 'start', 'finish',
    ];

    public function RaceWeekend()
    {
        return $this->hasMany('App\RaceWeekend');
    }
}
