<?php

namespace App\Repositories;

use App\Models\Geographiques;
use App\Repositories\BaseRepository;

/**
 * Class GeographiquesRepository
 * @package App\Repositories
 * @version March 9, 2023, 4:02 pm +07
*/

class GeographiquesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'description'
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
        return Geographiques::class;
    }
}
