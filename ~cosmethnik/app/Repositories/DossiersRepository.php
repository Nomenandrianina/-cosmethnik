<?php

namespace App\Repositories;

use App\Models\Dossiers;
use App\Repositories\BaseRepository;

/**
 * Class DossiersRepository
 * @package App\Repositories
 * @version February 20, 2023, 2:35 pm +07
*/

class DossiersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'title',
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
        return Dossiers::class;
    }
}
