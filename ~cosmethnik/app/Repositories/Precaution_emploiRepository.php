<?php

namespace App\Repositories;

use App\Models\Precaution_emploi;
use App\Repositories\BaseRepository;

/**
 * Class Precaution_emploiRepository
 * @package App\Repositories
 * @version March 9, 2023, 3:10 pm +07
*/

class Precaution_emploiRepository extends BaseRepository
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
        return Precaution_emploi::class;
    }
}
