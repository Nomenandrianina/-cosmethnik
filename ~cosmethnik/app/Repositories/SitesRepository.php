<?php

namespace App\Repositories;

use App\Models\Sites;
use App\Repositories\BaseRepository;

/**
 * Class SitesRepository
 * @package App\Repositories
 * @version February 14, 2023, 2:09 pm +07
*/

class SitesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'type',
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
        return Sites::class;
    }
}
