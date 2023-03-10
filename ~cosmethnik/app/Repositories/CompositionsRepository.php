<?php

namespace App\Repositories;

use App\Models\Compositions;
use App\Repositories\BaseRepository;

/**
 * Class CompositionsRepository
 * @package App\Repositories
 * @version March 10, 2023, 2:17 pm +07
*/

class CompositionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'quantite',
        'unite',
        'poids',
        'rendement',
        'freinte',
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
        return Compositions::class;
    }
}
