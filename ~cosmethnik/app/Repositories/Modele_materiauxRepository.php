<?php

namespace App\Repositories;

use App\Models\Modele_materiaux;
use App\Repositories\BaseRepository;

/**
 * Class Modele_materiauxRepository
 * @package App\Repositories
 * @version March 10, 2023, 7:28 pm +07
*/

class Modele_materiauxRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'modele_type',
        'modele_id',
        'poids',
        'materiaux_id'
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
        return Modele_materiaux::class;
    }
}
