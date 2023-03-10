<?php

namespace App\Repositories;

use App\Models\Organoleptiques;
use App\Repositories\BaseRepository;

/**
 * Class OrganoleptiquesRepository
 * @package App\Repositories
 * @version March 10, 2023, 6:35 pm +07
*/

class OrganoleptiquesRepository extends BaseRepository
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
        return Organoleptiques::class;
    }
}
