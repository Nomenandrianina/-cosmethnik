<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Modele_familles
 * @package App\Models
 * @version March 14, 2023, 1:36 pm +07
 *
 * @property string $model_type
 * @property integer $model_id
 * @property integer $famille_id
 */
class Modele_familles extends Model
{
    use SoftDeletes;


    public $table = 'modele_familles';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'model_type',
        'model_id',
        'famille_id'
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
        'famille_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
