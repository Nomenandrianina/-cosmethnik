<?php

namespace App\Repositories;

use App\Models\Ingredients;
use App\Repositories\BaseRepository;

/**
 * Class IngredientsRepository
 * @package App\Repositories
 * @version March 10, 2023, 1:52 pm +07
*/

class IngredientsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'origine_geographique',
        'pays_transformation',
        'origine_biologique'
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
        return Ingredients::class;
    }
}
