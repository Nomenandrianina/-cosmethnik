<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Modele_materiaux
 * @package App\Models
 * @version March 10, 2023, 7:28 pm +07
 *
 * @property string $modele_type
 * @property integer $modele_id
 * @property integer $poids
 * @property integer $materiaux_id
 */
class Modele_materiaux extends Model
{
    use SoftDeletes;


    public $table = 'modele_materiaux';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'modele_type',
        'modele_id',
        'poids',
        'materiaux_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'modele_type' => 'string',
        'modele_id' => 'integer',
        'poids' => 'integer',
        'materiaux_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
