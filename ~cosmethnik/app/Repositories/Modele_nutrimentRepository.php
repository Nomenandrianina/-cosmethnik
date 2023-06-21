<?php

namespace App\Repositories;

use App\Models\Modele_nutriment;
use App\Repositories\BaseRepository;

/**
 * Class Modele_nutrimentRepository
 * @package App\Repositories
 * @version June 13, 2023, 2:06 pm +07
*/

class Modele_nutrimentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nutriment_id',
        'valeur',
        'unite',
        'mini',
        'maxi',
        'portion',
        'unite_portion',
        'ajr_portion',
        'perte',
        'methode'
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
        return Modele_nutriment::class;
    }
}
