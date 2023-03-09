<?php

namespace App\Repositories;

use App\Models\Unites;
use App\Repositories\BaseRepository;

/**
 * Class UnitesRepository
 * @package App\Repositories
 * @version March 9, 2023, 3:32 pm +07
*/

class UnitesRepository extends BaseRepository
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
        return Unites::class;
    }
}
