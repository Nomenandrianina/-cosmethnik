<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Compositions
 * @package App\Models
 * @version March 10, 2023, 2:17 pm +07
 *
 * @property integer $quantite
 * @property string $unite
 * @property string $poids
 * @property number $rendement
 * @property number $freinte
 * @property string $model_type
 * @property integer $model_id
 */
class Compositions extends Model
{
    use SoftDeletes;


    public $table = 'compositions';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'quantite',
        'unite',
        'poids',
        'rendement',
        'freinte',
        'model_type',
        'model_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'quantite' => 'integer',
        'unite' => 'string',
        'poids' => 'string',
        'rendement' => 'double',
        'freinte' => 'double',
        'model_type' => 'string',
        'model_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
