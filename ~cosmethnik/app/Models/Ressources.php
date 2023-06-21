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
 * @property string $code_bcpg
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
        'code_bcpg',
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
        'code_bcpg' => 'string',
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
        'code_bcepg'=>'required',
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
        ['menu' => ['props' => 'Propriété', 'link' => 'proprietes.model']],
        ['menu' => ['props' => 'Fiches techniques', 'link' => '']],
        ['menu' => ['props' => 'Documents', 'link' => '']],
        ['menu' => ['props' => 'Liste des process', 'link' => 'liste_processes.model']],
        ['menu' => ['props' => 'Paramètres ressource', 'link' => '']],
        ['menu' => ['props' => 'Allergènes', 'link' => 'allergenes.model']],
        ['menu' => ['props' => 'Coûts', 'link' => 'couts.model']],
        ['menu' => ['props' => 'Prix d\'achat', 'link' => '']],
        ['menu' => ['props' => 'Physico-chimiques', 'link' => 'physico_chimiques.model']],
        ['menu' => ['props' => 'Cas d\'emplois', 'link' => '']],
        ['menu' => ['props' => 'Activités', 'link' => '']],
    ];

}
