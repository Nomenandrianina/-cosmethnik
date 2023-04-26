<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Emballages
 * @package App\Models
 * @version March 9, 2023, 7:57 pm +07
 *
 * @property string $nom
 * @property string $titre
 * @property string $description
 * @property integer $unite
 * @property integer $dossier_id
 */
class Emballages extends Model
{
    use SoftDeletes;


    public $table = 'emballages';


    protected $dates = ['deleted_at'];

    public $timestamps = false;



    public $fillable = [
        'nom',
        'titre',
        'dossier_id',
        'description',
        'unite'
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
        'dossier_id' => 'integer',
        'description' => 'string',
        'unite' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    **/
    public function dossier()
    {
        return $this->belongsTo(Dossiers::class, 'dossier_id');
    }

    public function modele_emballages()
    {
        return $this->hasMany(Modele_emballages::class);
    }

    public function icon() {
        return '<i class="fas fa-inbox fa-3x" style="color: #095a1a;"></i>';
    }
    public function icon_menu() {
        return '<i class="fas fa-inbox" style="color: #095a1a;"></i>';
    }

    public static $fields = [
        ['menu' => ['props' => 'Propriété', 'link' => 'proprietes.model']],
        ['menu' => ['props' => 'Fiche technique', 'link' => '']],
        ['menu' => ['props' => 'Documents', 'link' => '']],
        ['menu' => ['props' => 'Coûts', 'link' => '']],
        ['menu' => ['props' => 'Physico-chimiques', 'link' => '']],
        ['menu' => ['props' => 'Allégations', 'link' => '']],
        ['menu' => ['props' => 'Cas d\'emplois', 'link' => '']],
    ];


}
