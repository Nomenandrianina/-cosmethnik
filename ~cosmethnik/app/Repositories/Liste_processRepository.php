<?php

namespace App\Repositories;

use App\Models\Liste_process;
use App\Repositories\BaseRepository;

/**
 * Class Liste_processRepository
 * @package App\Repositories
 * @version March 9, 2023, 9:03 pm +07
*/

class Liste_processRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'model_type',
        'model_id',
        'ressource_id',
        'quantite',
        'cadence',
        'unite_cadence',
        'taux_horaire',
        'produit_heure'
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
        return Liste_process::class;
    }
}
