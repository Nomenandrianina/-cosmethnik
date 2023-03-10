<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Modele_allergenes
 * @package App\Models
 * @version March 10, 2023, 3:15 pm +07
 *
 * @property string $model_type
 * @property integer $model_id
 * @property integer $quantite
 * @property boolean $pres_volontaire
 * @property boolean $pres_fortuite
 * @property string $arbre_decision
 * @property string $source_pres_volontaire
 * @property string $source_pres_fortuite
 * @property integer $allergene_id
 */
class Modele_allergenes extends Model
{
    use SoftDeletes;


    public $table = 'modele_allergenes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'model_type',
        'model_id',
        'quantite',
        'pres_volontaire',
        'pres_fortuite',
        'arbre_decision',
        'source_pres_volontaire',
        'source_pres_fortuite',
        'allergene_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'model_type' => 'string',
        'model_id' => 'integer',
        'quantite' => 'integer',
        'pres_volontaire' => 'boolean',
        'pres_fortuite' => 'boolean',
        'arbre_decision' => 'string',
        'source_pres_volontaire' => 'string',
        'source_pres_fortuite' => 'string',
        'allergene_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
