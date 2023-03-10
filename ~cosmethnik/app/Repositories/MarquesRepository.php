<?php

namespace App\Repositories;

use App\Models\Marques;
use App\Repositories\BaseRepository;

/**
 * Class MarquesRepository
 * @package App\Repositories
 * @version March 10, 2023, 7:21 pm +07
*/

class MarquesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom'
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
        return Marques::class;
    }
}
