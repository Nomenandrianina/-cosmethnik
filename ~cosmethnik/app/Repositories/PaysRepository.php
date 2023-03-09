<?php

namespace App\Repositories;

use App\Models\Pays;
use App\Repositories\BaseRepository;

/**
 * Class PaysRepository
 * @package App\Repositories
 * @version March 9, 2023, 6:22 pm +07
*/

class PaysRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return Pays::class;
    }
}
