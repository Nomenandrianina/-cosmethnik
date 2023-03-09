<?php

namespace App\Repositories;

use App\Models\Famille;
use App\Repositories\BaseRepository;

/**
 * Class FamilleRepository
 * @package App\Repositories
 * @version March 9, 2023, 1:33 pm +07
*/

class FamilleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'parent_id',
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
        return Famille::class;
    }
}
