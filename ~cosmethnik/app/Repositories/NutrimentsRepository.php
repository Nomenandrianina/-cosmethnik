<?php

namespace App\Repositories;

use App\Models\Nutriments;
use App\Repositories\BaseRepository;

/**
 * Class NutrimentsRepository
 * @package App\Repositories
 * @version June 12, 2023, 7:07 pm +07
*/

class NutrimentsRepository extends BaseRepository
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
        return Nutriments::class;
    }
}
