<?php

namespace App\Repositories;

use App\Models\Allegations;
use App\Repositories\BaseRepository;

/**
 * Class AllegationsRepository
 * @package App\Repositories
 * @version March 10, 2023, 7:07 pm +07
*/

class AllegationsRepository extends BaseRepository
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
        return Allegations::class;
    }
}
