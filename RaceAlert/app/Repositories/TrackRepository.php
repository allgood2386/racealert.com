<?php

namespace App\Repositories;

use App\Models\Track;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TrackRepository
 * @package App\Repositories
 * @version October 6, 2017, 11:29 pm UTC
 *
 * @method Track findWithoutFail($id, $columns = ['*'])
 * @method Track find($id, $columns = ['*'])
 * @method Track first($columns = ['*'])
*/
class TrackRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Track::class;
    }
}
