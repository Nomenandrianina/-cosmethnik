<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Produit_fini
 * @package App\Models
 * @version March 10, 2023, 8:01 pm +07
 *
 * @property string $nom
 * @property string $libelle_commerciale
 * @property string $libelle_legale
 * @property string $description
 * @property string $modele
 * @property string $code_bcpg
 * @property string $code_erp
 * @property string $ean
 * @property string $ean_colis
 * @property string $ean_palette
 * @property integer $quantite_nette
 * @property integer $poids_net_egoutte
 * @property number $freinte_produit
 * @property number $taille_portion
 * @property string $unite_portion
 * @property string $texte_portion
 * @property integer $nombre_portion
 * @property string $cdc
 * @property string $date_limite_consommation
 * @property string $ddm_dua
 * @property integer $dossier_id
 * @property integer $etat_produit_id
 * @property integer $filiale_id
 * @property integer $usine_id
 * @property integer $geographique_id
 * @property integer $marque_id
 * @property integer $client_id
 * @property integer $unite_id
 */
class Produit_fini extends Model
{
    use SoftDeletes;


    public $table = 'produit_fini';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'libelle_commerciale' => 'string',
        'libelle_legale' => 'string',
        'description' => 'string',
        'modele' => 'string',
        'code_bcpg' => 'string',
        'code_erp' => 'string',
        'ean' => 'string',
        'ean_colis' => 'string',
        'ean_palette' => 'string',
        'quantite_nette' => 'integer',
        'poids_net_egoutte' => 'integer',
        'freinte_produit' => 'decimal:2',
        'taille_portion' => 'decimal:2',
        'unite_portion' => 'string',
        'texte_portion' => 'string',
        'nombre_portion' => 'integer',
        'cdc' => 'string',
        'dossier_id' => 'integer',
        'etat_produit_id' => 'integer',
        'filiale_id' => 'integer',
        'usine_id' => 'integer',
        'geographique_id' => 'integer',
        'marque_id' => 'integer',
        'client_id' => 'integer',
        'unite_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
