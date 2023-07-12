<?php

namespace App\Repositories;

use App\Models\fichiers;
use App\Repositories\BaseRepository;

/**
 * Class fichiersRepository
 * @package App\Repositories
 * @version July 12, 2023, 1:54 pm +07
*/

class fichiersRepository extends BaseRepository
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
        return fichiers::class;
    }
}
