<?php

namespace App\Repositories;

use App\Models\Monnaies;
use App\Repositories\BaseRepository;

/**
 * Class MonnaiesRepository
 * @package App\Repositories
 * @version March 9, 2023, 1:59 pm +07
*/

class MonnaiesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'description'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Monnaies::class;
    }
}
