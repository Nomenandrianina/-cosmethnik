<?php

namespace App\Repositories;

use App\Models\Activites;
use App\Repositories\BaseRepository;

/**
 * Class ActivitésRepository
 * @package App\Repositories
 * @version March 10, 2023, 7:36 pm +07
*/

class ActivitesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'model_type',
        'model_id',
        'action',
        'user_id'
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
        return Activites::class;
    }
}
