<?php

namespace App\Repositories;

use App\Models\Condition_conservations;
use App\Repositories\BaseRepository;

/**
 * Class Condition_conservationsRepository
 * @package App\Repositories
 * @version March 9, 2023, 3:30 pm +07
*/

class Condition_conservationsRepository extends BaseRepository
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
        return Condition_conservations::class;
    }
}
