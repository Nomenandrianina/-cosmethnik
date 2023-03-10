<?php

namespace App\Repositories;

use App\Models\Physico_chimiques;
use App\Repositories\BaseRepository;

/**
 * Class Physico_chimiquesRepository
 * @package App\Repositories
 * @version March 10, 2023, 6:45 pm +07
*/

class Physico_chimiquesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
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
        return Physico_chimiques::class;
    }
}
