<?php

namespace App\Repositories;

use App\Models\Emballages;
use App\Repositories\BaseRepository;

/**
 * Class EmballagesRepository
 * @package App\Repositories
 * @version March 9, 2023, 7:57 pm +07
*/

class EmballagesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'titre',
        'description',
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
        return Emballages::class;
    }
}
