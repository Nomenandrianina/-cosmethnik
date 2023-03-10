<?php

namespace App\Repositories;

use App\Models\Cas_emploies;
use App\Repositories\BaseRepository;

/**
 * Class Cas_emploiesRepository
 * @package App\Repositories
 * @version March 10, 2023, 7:43 pm +07
*/

class Cas_emploiesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'model_type',
        'model_id'
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
        return Cas_emploies::class;
    }
}
