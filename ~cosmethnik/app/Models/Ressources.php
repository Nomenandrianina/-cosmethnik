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
 * @property string $etape
 * @property string $type_parametre
 * @property string $parametre
 * @property integer $valeur
 * @property string $unite
 */
class Ressources extends Model
{
    use SoftDeletes;


    public $table = 'ressources';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
        'etape',
        'type_parametre',
        'parametre',
        'valeur',
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
        'etape' => 'string',
        'type_parametre' => 'string',
        'parametre' => 'string',
        'valeur' => 'integer',
        'unite' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
