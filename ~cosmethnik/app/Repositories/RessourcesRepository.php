<?php

namespace App\Repositories;

use App\Models\Ressources;
use App\Repositories\BaseRepository;

/**
 * Class RessourcesRepository
 * @package App\Repositories
 * @version March 9, 2023, 9:23 pm +07
*/

class RessourcesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'etape',
        'type_parametre',
        'parametre',
        'valeur',
        'unite'
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
        return Ressources::class;
    }
}
