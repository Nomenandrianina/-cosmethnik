<?php

namespace App\Repositories;

use App\Models\Filiales;
use App\Repositories\BaseRepository;

/**
 * Class FilialesRepository
 * @package App\Repositories
 * @version March 9, 2023, 4:12 pm +07
*/

class FilialesRepository extends BaseRepository
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
        return Filiales::class;
    }
}
