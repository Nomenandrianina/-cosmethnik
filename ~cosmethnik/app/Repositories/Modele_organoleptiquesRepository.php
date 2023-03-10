<?php

namespace App\Repositories;

use App\Models\Modele_organoleptiques;
use App\Repositories\BaseRepository;

/**
 * Class Modele_organoleptiquesRepository
 * @package App\Repositories
 * @version March 10, 2023, 6:43 pm +07
*/

class Modele_organoleptiquesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'caractéristique',
        'valeur',
        'model_type',
        'model_id',
        'organoleptique_id'
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
        return Modele_organoleptiques::class;
    }
}
