<?php

namespace App\Repositories;

use App\Models\Fichiers;
use App\Repositories\BaseRepository;

/**
 * Class FichiersRepository
 * @package App\Repositories
 * @version July 12, 2023, 1:49 pm +07
*/

class FichiersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'model_type',
        'model_id',
        'chemin',
        'extension'
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
        return Fichiers::class;
    }
}
