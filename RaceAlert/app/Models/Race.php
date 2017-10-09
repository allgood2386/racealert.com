<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Race",
 *      required={"start"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="start",
 *          description="start",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="track_id",
 *          description="track_id",
 *          type="integer",
 *      ),
 * )
 */
class Race extends Model
{
    use SoftDeletes;

    public $table = 'races';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'description',
        'start',
        'track_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'start' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'start' => 'required'
    ];

    public function track() {
      return $this->belongsTo(Track::class);
    }

    
}
