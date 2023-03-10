<?php

namespace App\Repositories;

use App\Models\Allergenes;
use App\Repositories\BaseRepository;

/**
 * Class AllergenesRepository
 * @package App\Repositories
 * @version March 10, 2023, 3:02 pm +07
*/

class AllergenesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'description',
        'libelle_legale',
        'type',
        'code_allergene',
        'seuil_reglementaire',
        'allergene_enfant'
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
        return Allergenes::class;
    }
}
