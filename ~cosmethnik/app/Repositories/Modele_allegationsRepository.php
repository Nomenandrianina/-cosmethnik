<?php

namespace App\Repositories;

use App\Models\Modele_allegations;
use App\Repositories\BaseRepository;

/**
 * Class Modele_allegationsRepository
 * @package App\Repositories
 * @version March 10, 2023, 7:11 pm +07
*/

class Modele_allegationsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'allegation',
        'revendique',
        'information',
        'date_certification',
        'model_type',
        'model_id',
        'allegation_id'
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
        return Modele_allegations::class;
    }
}
