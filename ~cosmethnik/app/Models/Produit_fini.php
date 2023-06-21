<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
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

    public $timestamps = false;



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
        'monnaie_id',
        'geographique_id',
        'marque_id',
        'client_id',
        'unite_id',
        'precaution_emploie_id',
        'condition_conservation_id',
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
        'monnaie_id' => 'integer',
        'geographique_id' => 'integer',
        'marque_id' => 'integer',
        'client_id' => 'integer',
        'unite_id' => 'integer',
        'precaution_emploie_id' => 'integer',
        'condition_conservation_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom'=>'required',
        'libelle_commerciale'=>'required',
        'code_bcepg'=>'required',
        'code_erp'=> 'required',
        'libelle_legale'=>'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    **/
    public function dossier()
    {
        return $this->belongsTo(Dossiers::class, 'dossier_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    **/
    public function etat_produit()
    {
        return $this->belongsTo(Etat_produits::class, 'etat_produit_id');
    }

     /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    **/
    public function filiale()
    {
        return $this->belongsTo(Filiales::class, 'filiale_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    **/
    public function usine()
    {
        return $this->belongsTo(Usines::class, 'usine_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    **/
    public function geographique()
    {
        return $this->belongsTo(Geographiques::class, 'geographique_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    **/
    public function marque()
    {
        return $this->belongsTo(Marques::class, 'marque_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    **/
    public function client()
    {
        return $this->belongsTo(Clients::class, 'client_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    **/
    public function unite()
    {
        return $this->belongsTo(Unites::class, 'unite_id');
    }

    public function monnaie(){
        return $this->belongsTo(Monnaies::class, 'monnaie_id');
    }

    public function precaution_emploie(){
        return $this->belongsTo(Precaution_emploi::class, 'precaution_emploie_id');
    }

    public function condition_conservation(){
        return $this->belongsTo(Condition_conservations::class, 'condition_conservation_id');
    }

    public function commentaires()
    {
        return $this->morphMany(Commentaires::class, 'model');
    }

    public function familles(){
        return $this->morphMany(Familles::class, 'model');
    }

    public function compositions(){
        return $this->morphMany(Compositions::class, 'model');
    }
    public function activites(){
        return $this->morphMany(Activites::class, 'model');
    }
    public function cas_emploies(){
        return $this->morphMany(Cas_emploies::class, 'model');
    }
    public function mmodele_nutriments(){
        return $this->morphMany(Modele_nutriment::class, 'model');
    }
    public function mmodele_emballages(){
        return $this->morphMany(Modele_emballages::class, 'model');
    }
    public function mmodele_ingredients(){
        return $this->morphMany(Modele_ingredients::class, 'model');
    }
    public function mmodele_materiaux(){
        return $this->morphMany(Modele_materiaux::class, 'model');
    }
    public function mmodele_allegations(){
        return $this->morphMany(Modele_allegations::class, 'model');
    }
    public function mmodele_physico_chimiques(){
        return $this->morphMany(Modele_physico_chimique::class, 'model');
    }
    public function mmodele_organoleptiques(){
        return $this->morphMany(Modele_organoleptiques::class, 'model');
    }
    public function mmodele_allergenes(){
        return $this->morphMany(Modele_allergenes::class, 'model');
    }
    public function couts(){
        return $this->morphMany(Couts::class, 'model');
    }
    public function liste_process(){
        return $this->morphMany(Liste_process::class, 'model');
    }
    public function modele_familles(){
        return $this->morphMany(Modele_familles::class, 'model');
    }
    public function icon() {
        return '<i class="fas fa-shopping-bag fa-3x" style="color: #4787f4;"></i>';
    }
    public function icon_accueil() {
        return '<i class="fas fa-shopping-bag fa-2x" style="color: #4787f4;"></i>';
    }
    public function icon_menu() {
        return '<i class="fas fa-shopping-bag" style="color: #4787f4;"></i>';
    }

    public static $fields = [
        ['menu' => ['props' => 'Propriété', 'link' => 'proprietes.model']],
        ['menu' => ['props' => 'Fiche technique', 'link' => '']],
        ['menu' => ['props' => 'Documents', 'link' => '']],
        ['menu' => ['props' => 'Composition', 'link' => 'compositions.model']],
        ['menu' => ['props' => 'Emballages', 'link' => 'emballages.model']],
        ['menu' => ['props' => 'Liste des process', 'link' => 'liste_processes.model']],
        ['menu' => ['props' => 'Étiquetage', 'link' => '']],
        ['menu' => ['props' => 'Ingrédients', 'link' => 'ingredients.model']],
        ['menu' => ['props' => 'Allergènes', 'link' => 'allergenes.model']],
        ['menu' => ['props' => 'Coûts', 'link' => 'couts.model']],
        ['menu' => ['props' => 'Nutriments', 'link' => 'nutriments.model']],
        ['menu' => ['props' => 'Organoleptique', 'link' => '']],
        ['menu' => ['props' => 'Physico-chimiques', 'link' => 'physico_chimiques.model']],
        ['menu' => ['props' => 'Allégations', 'link' => 'allegations.model']],
        ['menu' => ['props' => 'Cas d\'emplois', 'link' => '']],
        ['menu' => ['props' => 'Activités', 'link' => '']],
    ];
}
