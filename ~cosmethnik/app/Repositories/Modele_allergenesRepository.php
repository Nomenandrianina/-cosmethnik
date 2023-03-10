<?php

namespace App\Repositories;

use App\Models\Modele_allergenes;
use App\Repositories\BaseRepository;

/**
 * Class Modele_allergenesRepository
 * @package App\Repositories
 * @version March 10, 2023, 3:15 pm +07
*/

class Modele_allergenesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'model_type',
        'model_id',
        'quantite',
        'pres_volontaire',
        'pres_fortuite',
        'arbre_decision',
        'source_pres_volontaire',
        'source_pres_fortuite',
        'allergene_id'
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
        return Modele_allergenes::class;
    }
}
