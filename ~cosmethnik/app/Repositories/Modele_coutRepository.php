<?php

namespace App\Repositories;

use App\Models\Modele_cout;
use App\Repositories\BaseRepository;

/**
 * Class Modele_coutRepository
 * @package App\Repositories
 * @version June 7, 2023, 2:11 pm +07
*/

class Modele_coutRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'model_type',
        'model_id',
        'valeur',
        'unite',
        'valeur1',
        'valeur2',
        'euv',
        'manuel'
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
        return Modele_cout::class;
    }
}
