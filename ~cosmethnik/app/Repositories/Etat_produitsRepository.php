<?php

namespace App\Repositories;

use App\Models\Etat_produits;
use App\Repositories\BaseRepository;

/**
 * Class Etat_produitsRepository
 * @package App\Repositories
 * @version March 9, 2023, 4:27 pm +07
*/

class Etat_produitsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'designation'
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
        return Etat_produits::class;
    }
}
