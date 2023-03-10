<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Allergenes
 * @package App\Models
 * @version March 10, 2023, 3:02 pm +07
 *
 * @property string $nom
 * @property string $description
 * @property string $libelle_legale
 * @property string $type
 * @property string $code_allergene
 * @property string $seuil_reglementaire
 * @property integer $allergene_enfant
 */
class Allergenes extends Model
{
    use SoftDeletes;


    public $table = 'allergenes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
        'description',
        'libelle_legale',
        'type',
        'code_allergene',
        'seuil_reglementaire',
        'allergene_enfant'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'description' => 'string',
        'libelle_legale' => 'string',
        'type' => 'string',
        'code_allergene' => 'string',
        'seuil_reglementaire' => 'string',
        'allergene_enfant' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
