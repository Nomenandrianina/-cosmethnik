<?php

namespace App\Repositories;

use App\Models\Matiere_premiere;
use App\Repositories\BaseRepository;

/**
 * Class Matiere_premiereRepository
 * @package App\Repositories
 * @version April 5, 2023, 3:30 pm +07
*/

class Matiere_premiereRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'libelle_commerciale',
        'libelle_legale',
        'description',
        'description_conditionnement',
        'modele',
        'code_becpg',
        'code_erp',
        'ean',
        'ean_colis',
        'ean_palette',
        'dossier_id',
        'etat_produit_id',
        'filiale_id',
        'usine_id',
        'geographique_id',
        'marque_id',
        'client_id',
        'quantite_nette',
        'unite_id',
        'poids_net_egoutte',
        'freinte_produit',
        'taille_portion',
        'unite_portion',
        'texte_portion',
        'nombre_portion',
        'cahier_charge',
        'date_limite_consommation',
        'ddm_dua'
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
        return Matiere_premiere::class;
    }
}
