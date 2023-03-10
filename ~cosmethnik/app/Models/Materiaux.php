<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Materiaux
 * @package App\Models
 * @version March 10, 2023, 7:27 pm +07
 *
 * @property string $nom
 */
class Materiaux extends Model
{
    use SoftDeletes;


    public $table = 'materiaux';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
