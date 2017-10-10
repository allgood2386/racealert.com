<?php

namespace App\Repositories;

use App\Models\TrackConfiguration;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TrackConfigurationRepository
 * @package App\Repositories
 * @version October 10, 2017, 11:21 am UTC
 *
 * @method TrackConfiguration findWithoutFail($id, $columns = ['*'])
 * @method TrackConfiguration find($id, $columns = ['*'])
 * @method TrackConfiguration first($columns = ['*'])
*/
class TrackConfigurationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'length'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TrackConfiguration::class;
    }
}
