<?php

namespace App\Repositories;

use App\Models\Produit_fini;
use App\Repositories\BaseRepository;

/**
 * Class Produit_finiRepository
 * @package App\Repositories
 * @version March 10, 2023, 8:01 pm +07
*/

class Produit_finiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'libelle_commerciale',
        'libelle_legale',
        'description',
        'modele',
        'code_bcpg',
        'code_erp',
        'ean',
        'ean_colis',
        'ean_palette',
        'quantite_nette',
        'poids_net_egoutte',
        'freinte_produit',
        'taille_portion',
        'unite_portion',
        'texte_portion',
        'nombre_portion',
        'cdc',
        'date_limite_consommation',
        'ddm_dua',
        'dossier_id',
        'etat_produit_id',
        'filiale_id',
        'usine_id',
        'geographique_id',
        'marque_id',
        'client_id',
        'unite_id'
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
        return Produit_fini::class;
    }
}
