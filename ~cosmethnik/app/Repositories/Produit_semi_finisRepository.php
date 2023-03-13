<?php

namespace App\Repositories;

use App\Models\Produit_semi_finis;
use App\Repositories\BaseRepository;

/**
 * Class Produit_semi_finisRepository
 * @package App\Repositories
 * @version March 13, 2023, 8:51 pm +07
*/

class Produit_semi_finisRepository extends BaseRepository
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
        'code_bcepg',
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
        'unite_id',
        'quantite_nette',
        'poids_nette_egoutte',
        'freinte_produit',
        'taille_portion',
        'unite_portion',
        'texte_portion',
        'nombre_portion',
        'cahier_de_charge',
        'date_limite_consommation',
        'ddm_dua',
        'pao',
        'duree_vie_minimum',
        'condition_conservation_id',
        'precaution_emploi_id',
        'conseil_preparation_utilisation',
        'prix_vente_uv',
        'monnaie_id',
        'quantite_imprevisionnelle'
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
        return Produit_semi_finis::class;
    }
}
