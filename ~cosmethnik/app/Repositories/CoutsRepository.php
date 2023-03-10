<?php

namespace App\Repositories;

use App\Models\Couts;
use App\Repositories\BaseRepository;

/**
 * Class CoutsRepository
 * @package App\Repositories
 * @version March 10, 2023, 3:38 pm +07
*/

class CoutsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'valeur',
        'unite',
        'valeur1',
        'valeur2',
        'euv',
        'manuel',
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
        return Couts::class;
    }
}
