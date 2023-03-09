<?php

namespace App\Repositories;

use App\Models\Clients;
use App\Repositories\BaseRepository;

/**
 * Class ClientsRepository
 * @package App\Repositories
 * @version March 9, 2023, 6:30 pm +07
*/

class ClientsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'titre',
        'etat_client',
        'code_bcpg',
        'code_erp',
        'telephone',
        'mail',
        'fax',
        'adress1',
        'adress2',
        'adress3',
        'ville',
        'code_postal'
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
        return Clients::class;
    }
}
