<?php

namespace App\Repositories;

use App\Models\Materiaux;
use App\Repositories\BaseRepository;

/**
 * Class MateriauxRepository
 * @package App\Repositories
 * @version March 10, 2023, 7:27 pm +07
*/

class MateriauxRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom'
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
        return Materiaux::class;
    }
}
