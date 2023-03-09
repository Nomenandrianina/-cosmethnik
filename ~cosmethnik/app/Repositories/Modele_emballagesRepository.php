<?php

namespace App\Repositories;

use App\Models\Modele_emballages;
use App\Repositories\BaseRepository;

/**
 * Class Modele_emballagesRepository
 * @package App\Repositories
 * @version March 9, 2023, 8:21 pm +07
*/

class Modele_emballagesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'model_type',
        'model_id',
        'emballage_id',
        'quantite',
        'unite',
        'freinte',
        'maitre',
        'variantes',
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
        return Modele_emballages::class;
    }
}
