<?php

namespace App\Repositories;

use App\Models\Usines;
use App\Repositories\BaseRepository;

/**
 * Class UsinesRepository
 * @package App\Repositories
 * @version March 9, 2023, 4:08 pm +07
*/

class UsinesRepository extends BaseRepository
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
        return Usines::class;
    }
}
