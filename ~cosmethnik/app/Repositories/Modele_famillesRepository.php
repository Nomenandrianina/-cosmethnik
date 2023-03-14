<?php

namespace App\Repositories;

use App\Models\Modele_familles;
use App\Repositories\BaseRepository;

/**
 * Class Modele_famillesRepository
 * @package App\Repositories
 * @version March 14, 2023, 1:36 pm +07
*/

class Modele_famillesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'model_type',
        'model_id',
        'famille_id'
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
        return Modele_familles::class;
    }
}
