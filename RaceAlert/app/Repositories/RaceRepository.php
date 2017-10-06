<?php

namespace App\Repositories;

use App\Models\Race;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RaceRepository
 * @package App\Repositories
 * @version October 6, 2017, 11:16 pm UTC
 *
 * @method Race findWithoutFail($id, $columns = ['*'])
 * @method Race find($id, $columns = ['*'])
 * @method Race first($columns = ['*'])
*/
class RaceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'start'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Race::class;
    }
}
