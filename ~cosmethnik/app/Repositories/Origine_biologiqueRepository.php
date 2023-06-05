<?php

namespace App\Repositories;

use App\Models\Origine_biologique;
use App\Repositories\BaseRepository;

/**
 * Class Origine_biologiqueRepository
 * @package App\Repositories
 * @version June 5, 2023, 1:28 pm +07
*/

class Origine_biologiqueRepository extends BaseRepository
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
        return Origine_biologique::class;
    }
}
