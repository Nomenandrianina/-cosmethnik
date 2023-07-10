<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Ressources
 * @package App\Models
 * @version March 9, 2023, 9:23 pm +07
 *
 * @property string $nom
 * @property string $titre
 * @property string $libelle_legale
 * @property string $description
 * @property string $commentaires
 * @property int $etat_produit_id
 * @property int $unite_id
 * @property string $code_becpg
 * @property string $code_erp
 * @property string $ean
 * @property string $modele
 * @property int $dossier_id
 */
class Ressources extends Model
{
    use SoftDeletes;

    public $timestamps = false;

    public $table = 'ressources';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nom',
        'titre',
        'libelle_legale',
        'description',
        'commentaires',
        'etat_produit_id',
        'unite_id',
        'code_becpg',
        'code_erp',
        'ean',
        'modele',
        'dossier_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'titre' => 'string',
        'libelle_legale' => 'string',
        'description' => 'string',
        'commentaires' => 'string',
        'etat_produit_id' => 'integer',
        'unite_id' => 'integer',
        'code_becpg' => 'string',
        'code_erp' => 'string',
        'ean' => 'string',
        'modele' => 'string',
        'dossier_id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom'=>'required',
        'libelle_legale'=>'required',
        'code_becpg'=>'required',
        'code_erp'=> 'required',
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
    public function unite()
    {
        return $this->belongsTo(Unites::class, 'unite_id');
    }

    public function modele_familles(){
        return $this->morphMany(Modele_familles::class, 'model');
    }

    public function liste_process(){
        return $this->morphMany(Liste_process::class, 'model');
    }

    public function liste_processes()
    {
        return $this->hasMany(Liste_process::class);
    }

    public function icon() {
        return '<i class="fas fa-user-alt fa-3x"></i>';
    }
    public function icon_accueil() {
        return '<i class="fas fa-user-alt fa-2x"></i>';
    }
    public function icon_menu() {
        return '<i class="fas fa-user-alt"></i>';
    }


    public static $fields = [
        ['menu' => ['props' => 'Propriété', 'link' => 'proprietes.model', 'scripts' => 'propriete']],
        ['menu' => ['props' => 'Fiches techniques', 'link' => 'proprietes.model', 'scripts' => 'fiche']],
        ['menu' => ['props' => 'Documents', 'link' => 'proprietes.model', 'scripts' => 'document']],
        ['menu' => ['props' => 'Liste des process', 'link' => 'liste_processes.model', 'scripts' => 'process']],
        ['menu' => ['props' => 'Paramètres ressource', 'link' => 'proprietes.model', 'scripts' => 'ressource']],
        ['menu' => ['props' => 'Allergènes', 'link' => 'allergenes.model', 'scripts' => 'allergene']],
        ['menu' => ['props' => 'Coûts', 'link' => 'couts.model', 'scripts' => 'cout']],
        ['menu' => ['props' => 'Prix d\'achat', 'link' => 'proprietes.model', 'scripts' => 'achat']],
        ['menu' => ['props' => 'Physico-chimiques', 'link' => 'physico_chimiques.model', 'scripts' => 'chimique']],
        ['menu' => ['props' => 'Cas d\'emplois', 'link' => 'proprietes.model', 'scripts' => 'emploi']],
        ['menu' => ['props' => 'Activités', 'link' => 'proprietes.model', 'scripts' => 'activite']],
    ];

}
