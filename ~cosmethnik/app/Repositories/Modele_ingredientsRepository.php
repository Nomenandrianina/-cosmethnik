<?php

namespace App\Repositories;

use App\Models\Modele_ingredients;
use App\Repositories\BaseRepository;

/**
 * Class Modele_ingredientsRepository
 * @package App\Repositories
 * @version March 10, 2023, 2:01 pm +07
*/

class Modele_ingredientsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'model_type',
        'model_id',
        'quantite',
        'ogm',
        'ionisation',
        'auxilliaire_technologie',
        'support',
        'ingredient_id'
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
        return Modele_ingredients::class;
    }
}
