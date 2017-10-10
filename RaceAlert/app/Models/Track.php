<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Track",
 *      required={"name", "description"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
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
 *      )
 * )
 */
class Track extends Model
{
    use SoftDeletes;

    public $table = 'tracks';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'description'
    ];

  /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string'
    ];

  /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'description' => 'required'
    ];

  /**
   * Relationship.
   *
   * @return mixed
   */
    public function races() {
      return $this->hasMany(Race::class);
    }

  /**
   * Relationship.
   *
   * @return mixed
   */
    public function configurations() {
      return $this->hasMany(TrackConfiguration::class);
    }

}
