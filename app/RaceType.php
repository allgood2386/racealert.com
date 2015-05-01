<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class RaceType extends Model {

    public function race()
    {
        return $this->belongsToMany('App\Race');
    }

}
