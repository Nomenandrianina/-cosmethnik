<?php

namespace App\Repositories;

use App\Models\Modele_physico_chimique;
use App\Repositories\BaseRepository;

/**
 * Class Modele_physico_chimiqueRepository
 * @package App\Repositories
 * @version March 10, 2023, 6:59 pm +07
*/

class Modele_physico_chimiqueRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'caracteristique',
        'valeur',
        'mini',
        'maxi',
        'critere_texte',
        'model_type',
        'model_id',
        'physico_chimique_id'
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
        return Modele_physico_chimique::class;
    }
}
